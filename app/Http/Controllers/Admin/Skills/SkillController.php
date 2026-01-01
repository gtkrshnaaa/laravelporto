<?php

namespace App\Http\Controllers\Admin\Skills;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('category', 'asc')
            ->orderBy('display_order', 'asc')
            ->get()
            ->groupBy('category');

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        $categories = Skill::select('category')
            ->distinct()
            ->pluck('category');

        return view('admin.skills.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
        ]);

        // Set display_order to last in category
        $maxOrder = Skill::where('category', $validated['category'])->max('display_order') ?? 0;
        $validated['display_order'] = $maxOrder + 1;

        Skill::create($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill added successfully!');
    }

    public function edit(Skill $skill)
    {
        $categories = Skill::select('category')
            ->distinct()
            ->pluck('category');

        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully!');
    }
}
