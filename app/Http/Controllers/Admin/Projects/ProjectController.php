<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        // Search by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by size
        if ($request->filled('size')) {
            $query->where('size', $request->size);
        }

        // Filter by featured status
        if ($request->filled('is_featured')) {
            $query->where('is_featured', $request->is_featured);
        }

        $projects = $query->orderBy('display_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Get unique categories for filter dropdown
        $categories = Project::select('category')
            ->distinct()
            ->pluck('category');

        return view('admin.projects.index', compact('projects', 'categories'));
    }

    public function create()
    {
        $categories = Project::select('category')
            ->distinct()
            ->pluck('category');

        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'tech_stack' => 'required|array',
            'tech_stack.*' => 'string',
            'repository_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'size' => 'required|in:large,medium,small',
            'is_featured' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Auto-generate slug from title
        $validated['slug'] = Str::slug($validated['title']);
        
        // Ensure unique slug
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Project::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('uploads/projects', $filename, 'public');
            $validated['featured_image'] = $path;
        }

        // Set default values
        $validated['is_featured'] = $request->has('is_featured');
        $validated['view_count'] = 0;
        
        // Set display_order to last
        $maxOrder = Project::max('display_order') ?? 0;
        $validated['display_order'] = $maxOrder + 1;

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        $categories = Project::select('category')
            ->distinct()
            ->pluck('category');

        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'tech_stack' => 'required|array',
            'tech_stack.*' => 'string',
            'repository_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'size' => 'required|in:large,medium,small',
            'is_featured' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Update slug only if title changed
        if ($validated['title'] !== $project->title) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Ensure unique slug (excluding current project)
            $originalSlug = $validated['slug'];
            $counter = 1;
            while (Project::where('slug', $validated['slug'])->where('id', '!=', $project->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($project->featured_image && \Storage::disk('public')->exists($project->featured_image)) {
                \Storage::disk('public')->delete($project->featured_image);
            }

            $image = $request->file('featured_image');
            $filename = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('uploads/projects', $filename, 'public');
            $validated['featured_image'] = $path;
        }

        $validated['is_featured'] = $request->has('is_featured');

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->featured_image && \Storage::disk('public')->exists($project->featured_image)) {
            \Storage::disk('public')->delete($project->featured_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}
