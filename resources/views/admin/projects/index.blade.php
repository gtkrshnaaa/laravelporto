@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-primary mb-2">Projects</h2>
            <p class="text-secondary">Manage your portfolio projects.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="bg-primary text-background font-bold py-2 px-4 rounded-lg hover:opacity-90 transition-opacity text-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add Project
        </a>
    </div>

    <!-- Search & Filters -->
    <div class="mb-6 bg-surface border border-border rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300">
        <form action="{{ route('admin.projects.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title..." class="w-full bg-background border border-border rounded-lg px-4 py-2 text-primary focus:outline-none focus:border-primary transition-colors">
            </div>
            <div class="w-full md:w-48">
                <select name="category" class="w-full bg-background border border-border rounded-lg px-4 py-2 text-primary focus:outline-none focus:border-primary transition-colors">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-32">
                <select name="size" class="w-full bg-background border border-border rounded-lg px-4 py-2 text-primary focus:outline-none focus:border-primary transition-colors">
                    <option value="">All Sizes</option>
                    <option value="large" {{ request('size') === 'large' ? 'selected' : '' }}>Large</option>
                    <option value="medium" {{ request('size') === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="small" {{ request('size') === 'small' ? 'selected' : '' }}>Small</option>
                </select>
            </div>
            <div class="w-full md:w-32">
                <select name="is_featured" class="w-full bg-background border border-border rounded-lg px-4 py-2 text-primary focus:outline-none focus:border-primary transition-colors">
                    <option value="">All Status</option>
                    <option value="1" {{ request('is_featured') === '1' ? 'selected' : '' }}>Featured</option>
                    <option value="0" {{ request('is_featured') === '0' ? 'selected' : '' }}>Regular</option>
                </select>
            </div>
            <button type="submit" class="bg-primary/10 text-primary px-6 py-2 rounded-lg hover:bg-primary/20 transition-colors font-medium">
                Filter
            </button>
        </form>
    </div>

    <div class="bg-surface border border-border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-border bg-secondary/5">
                    <th class="px-6 py-4 text-xs font-medium text-secondary uppercase tracking-wider">Project</th>
                    <th class="px-6 py-4 text-xs font-medium text-secondary uppercase tracking-wider">Category</th>
                    <th class="px-6 py-4 text-xs font-medium text-secondary uppercase tracking-wider">Tech Stack</th>
                    <th class="px-6 py-4 text-xs font-medium text-secondary uppercase tracking-wider">Size</th>
                    <th class="px-6 py-4 text-xs font-medium text-secondary uppercase tracking-wider">Views</th>
                    <th class="px-6 py-4 text-xs font-medium text-secondary uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($projects as $project)
                <tr class="hover:bg-primary/5 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            @if($project->featured_image)
                                <img src="{{ asset('storage/' . $project->featured_image) }}" alt="" class="w-12 h-12 rounded bg-current/5 object-cover">
                            @else
                                <div class="w-12 h-12 rounded bg-current/5 border border-border flex items-center justify-center text-secondary text-xs">No Img</div>
                            @endif
                            <div>
                                <p class="text-primary font-medium">{{ $project->title }}</p>
                                <p class="text-secondary text-xs">{{ $project->slug }}</p>
                                @if($project->is_featured)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 mt-1">
                                        ⭐ Featured
                                    </span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-secondary text-sm">{{ $project->category }}</td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1">
                            @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-secondary/10 text-secondary border border-secondary/20">
                                    {{ $tech }}
                                </span>
                            @endforeach
                            @if(count($project->tech_stack ?? []) > 3)
                                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-secondary/10 text-secondary border border-secondary/20">
                                    +{{ count($project->tech_stack) - 3 }}
                                </span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium 
                            {{ $project->size === 'large' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' : '' }}
                            {{ $project->size === 'medium' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : '' }}
                            {{ $project->size === 'small' ? 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400' : '' }}">
                            {{ ucfirst($project->size) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-secondary text-sm font-mono">{{ number_format($project->view_count) }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-primary hover:underline text-sm">Edit</a>
                        
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400 text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-secondary">
                        No projects yet. Create your first project!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $projects->links() }}
    </div>
@endsection
