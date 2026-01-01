@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-primary mb-2">Dashboard</h2>
        <p class="text-secondary">Overview of your portfolio platform.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Widget 1 - Projects -->
        <div class="bg-surface border border-border p-6 rounded-xl relative overflow-hidden group hover:border-primary/20 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-colors"></div>
            <h3 class="text-secondary text-xs uppercase tracking-widest font-bold mb-2">Total Projects</h3>
            <div class="flex items-end gap-2">
                <p class="text-4xl font-bold text-primary font-mono">{{ $stats['projects'] }}</p>
                <span class="text-xs text-blue-400 mb-1">Items</span>
            </div>
        </div>

        <!-- Widget 2 - Skills -->
        <div class="bg-surface border border-border p-6 rounded-xl relative overflow-hidden group hover:border-primary/20 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-colors"></div>
            <h3 class="text-secondary text-xs uppercase tracking-widest font-bold mb-2">Skills</h3>
            <div class="flex items-end gap-2">
                <p class="text-4xl font-bold text-primary font-mono">{{ $stats['skills'] }}</p>
                <span class="text-xs text-purple-400 mb-1">Tags</span>
            </div>
        </div>

        <!-- Widget 3 - Services -->
        <div class="bg-surface border border-border p-6 rounded-xl relative overflow-hidden group hover:border-primary/20 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-green-500/10 rounded-full blur-2xl group-hover:bg-green-500/20 transition-colors"></div>
            <h3 class="text-secondary text-xs uppercase tracking-widest font-bold mb-2">Services</h3>
            <div class="flex items-end gap-2">
                <p class="text-4xl font-bold text-primary font-mono">{{ $stats['services'] }}</p>
                <span class="text-xs text-green-400 mb-1">Offerings</span>
            </div>
        </div>

        <!-- Widget 4 - Testimonials -->
        <div class="bg-surface border border-border p-6 rounded-xl relative overflow-hidden group hover:border-primary/20 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-red-500/10 rounded-full blur-2xl group-hover:bg-red-500/20 transition-colors"></div>
            <h3 class="text-secondary text-xs uppercase tracking-widest font-bold mb-2">Testimonials</h3>
            <div class="flex items-end gap-2">
                <p class="text-4xl font-bold text-primary font-mono">{{ $stats['testimonials'] }}</p>
                <span class="text-xs text-red-400 mb-1">Reviews</span>
            </div>
        </div>
    </div>

    <!-- Charts & Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Main Chart -->
        <div class="lg:col-span-2 bg-surface border border-border rounded-xl p-6 shadow-sm">
            <h3 class="text-primary font-bold mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                </svg>
                Traffic Monitor (Last 7 Days)
            </h3>
            <div class="h-64">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>

        <!-- Top Projects -->
        <div class="bg-surface border border-border rounded-xl p-6 shadow-sm">
            <h3 class="text-primary font-bold mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                Top Viewed Projects
            </h3>
            <div class="space-y-4">
                @forelse($topProjects as $project)
                <div class="flex items-center gap-4 group">
                    <div class="w-10 h-10 bg-secondary/10 rounded-lg flex items-center justify-center text-xs font-bold text-secondary border border-border">
                        {{ $loop->iteration }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-primary truncate group-hover:text-blue-400 transition-colors">{{ $project->title }}</p>
                        <p class="text-xs text-secondary">{{ number_format($project->view_count) }} views</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-secondary text-sm">
                    No projects yet. Create your first project!
                </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="lg:col-span-3 bg-surface border border-border rounded-xl p-6 shadow-sm">
            <h3 class="text-primary font-bold mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Quick Actions
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-3 p-4 border border-border rounded-lg hover:border-primary/30 hover:bg-primary/5 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-blue-500/10 flex items-center justify-center group-hover:bg-blue-500/20 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-primary">New Project</p>
                        <p class="text-xs text-secondary">Add to portfolio</p>
                    </div>
                </a>

                <a href="{{ route('admin.skills.create') }}" class="flex items-center gap-3 p-4 border border-border rounded-lg hover:border-primary/30 hover:bg-primary/5 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-purple-500/10 flex items-center justify-center group-hover:bg-purple-500/20 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-purple-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-primary">New Skill</p>
                        <p class="text-xs text-secondary">Add expertise</p>
                    </div>
                </a>

                <a href="{{ route('admin.services.create') }}" class="flex items-center gap-3 p-4 border border-border rounded-lg hover:border-primary/30 hover:bg-primary/5 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-green-500/10 flex items-center justify-center group-hover:bg-green-500/20 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-primary">New Service</p>
                        <p class="text-xs text-secondary">Add offering</p>
                    </div>
                </a>

                <a href="{{ route('admin.testimonials.create') }}" class="flex items-center gap-3 p-4 border border-border rounded-lg hover:border-primary/30 hover:bg-primary/5 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-red-500/10 flex items-center justify-center group-hover:bg-red-500/20 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-primary">New Testimonial</p>
                        <p class="text-xs text-secondary">Add review</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('trafficChart').getContext('2d');
        const labels = {!! json_encode($trafficData->pluck('date')) !!};
        const data = {!! json_encode($trafficData->pluck('count')) !!};

        // Detect theme
        const isDark = document.documentElement.classList.contains('dark');
        const gridColor = isDark ? 'rgba(38, 38, 38, 1)' : 'rgba(228, 228, 231, 1)';
        const textColor = isDark ? 'rgba(161, 161, 170, 1)' : 'rgba(113, 113, 122, 1)';

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Visitors',
                    data: data,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: isDark ? '#171717' : '#ffffff',
                    pointBorderColor: '#3b82f6',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: isDark ? 'rgba(23, 23, 23, 0.9)' : 'rgba(255, 255, 255, 0.9)',
                        titleColor: isDark ? '#ededed' : '#18181b',
                        bodyColor: isDark ? '#a1a1aa' : '#71717a',
                        borderColor: gridColor,
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: gridColor },
                        ticks: { color: textColor }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: textColor }
                    }
                }
            }
        });
    </script>
@endsection
