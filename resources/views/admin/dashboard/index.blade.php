@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-primary mb-2">Dashboard</h2>
        <p class="text-secondary">Overview of your portfolio content</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Projects Widget -->
        <div class="bg-surface border border-border p-6 rounded-xl relative overflow-hidden group hover:border-primary/20 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-colors"></div>
            <h3 class="text-secondary text-xs uppercase tracking-widest font-bold mb-2">Total Projects</h3>
            <div class="flex items-end gap-2">
                <p class="text-4xl font-bold text-primary font-mono">{{ $stats['projects'] }}</p>
                <span class="text-xs text-blue-400 mb-1">Items</span>
            </div>
        </div>

        <!-- Skills Widget -->
        <div class="bg-surface border border-border p-6 rounded-xl relative overflow-hidden group hover:border-primary/20 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-colors"></div>
            <h3 class="text-secondary text-xs uppercase tracking-widest font-bold mb-2">Total Skills</h3>
            <div class="flex items-end gap-2">
                <p class="text-4xl font-bold text-primary font-mono">{{ $stats['skills'] }}</p>
                <span class="text-xs text-purple-400 mb-1">Skills</span>
            </div>
        </div>

        <!-- Services Widget -->
        <div class="bg-surface border border-border p-6 rounded-xl relative overflow-hidden group hover:border-primary/20 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-green-500/10 rounded-full blur-2xl group-hover:bg-green-500/20 transition-colors"></div>
            <h3 class="text-secondary text-xs uppercase tracking-widest font-bold mb-2">Total Services</h3>
            <div class="flex items-end gap-2">
                <p class="text-4xl font-bold text-primary font-mono">{{ $stats['services'] }}</p>
                <span class="text-xs text-green-400 mb-1">Offerings</span>
            </div>
        </div>

        <!-- Testimonials Widget -->
        <div class="bg-surface border border-border p-6 rounded-xl relative overflow-hidden group hover:border-primary/20 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-yellow-500/10 rounded-full blur-2xl group-hover:bg-yellow-500/20 transition-colors"></div>
            <h3 class="text-secondary text-xs uppercase tracking-widest font-bold mb-2">Testimonials</h3>
            <div class="flex items-end gap-2">
                <p class="text-4xl font-bold text-primary font-mono">{{ $stats['testimonials'] }}</p>
                <span class="text-xs text-yellow-400 mb-1">Reviews</span>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-surface border border-border rounded-xl p-6 shadow-sm">
        <h3 class="text-primary font-bold mb-6">Quick Actions</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-500/10 hover:bg-blue-500/20 border border-blue-500/20 hover:border-blue-500/30 rounded-lg transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="text-sm font-medium text-primary group-hover:text-blue-400 transition-colors">Add Project</span>
            </a>

            <a href="{{ route('admin.skills.create') }}" class="flex items-center gap-3 px-4 py-3 bg-purple-500/10 hover:bg-purple-500/20 border border-purple-500/20 hover:border-purple-500/30 rounded-lg transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-purple-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="text-sm font-medium text-primary group-hover:text-purple-400 transition-colors">Add Skill</span>
            </a>

            <a href="{{ route('admin.services.create') }}" class="flex items-center gap-3 px-4 py-3 bg-green-500/10 hover:bg-green-500/20 border border-green-500/20 hover:border-green-500/30 rounded-lg transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="text-sm font-medium text-primary group-hover:text-green-400 transition-colors">Add Service</span>
            </a>

            <a href="{{ route('admin.testimonials.create') }}" class="flex items-center gap-3 px-4 py-3 bg-yellow-500/10 hover:bg-yellow-500/20 border border-yellow-500/20 hover:border-yellow-500/30 rounded-lg transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="text-sm font-medium text-primary group-hover:text-yellow-400 transition-colors">Add Testimonial</span>
            </a>
        </div>
    </div>
@endsection
