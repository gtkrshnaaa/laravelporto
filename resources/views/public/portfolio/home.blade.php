@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <div x-data="{
        stats: {{ Js::from($statistics) }},
        animatedStats: {},
        init() {
            // Initialize stats at 0
            this.stats.forEach((stat, index) => {
                this.animatedStats[index] = 0;
            });
            
            // Animate stats when visible
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.animateStats();
                        statsObserver.disconnect();
                    }
                });
            });
            const statsSection = document.getElementById('stats-section');
            if (statsSection) statsObserver.observe(statsSection);
        },
        animateStats() {
            this.stats.forEach((stat, index) => {
                let current = 0;
                const target = stat.value;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        this.animatedStats[index] = target;
                        clearInterval(timer);
                    } else {
                        this.animatedStats[index] = Math.floor(current);
                    }
                }, 30);
            });
        }
    }">    
    <!-- Hero Section Enhanced -->
    <section class="relative pt-24 pb-16 md:pt-32 md:pb-24 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-zinc-800/20 via-background to-background opacity-40"></div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-8xl lg:text-9xl font-bold tracking-tighter text-primary mb-6 leading-tight animate-fadeIn">
                {{ $portfolio_name }}
            </h1>
            <p class="text-lg md:text-2xl text-secondary max-w-4xl mx-auto mb-4 animate-fadeIn" style="animation-delay: 0.2s;">
                {{ $portfolio_profession }}
            </p>
            <p class="text-base md:text-xl text-secondary/80 max-w-2xl mx-auto italic mb-12 animate-fadeIn" style="animation-delay: 0.4s;">
                {{ $portfolio_tagline }}
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16 animate-fadeIn" style="animation-delay: 0.6s;">
                <a href="#projects" class="group inline-flex items-center gap-2 bg-primary text-background font-bold px-8 py-4 rounded-full hover:opacity-90 transition-all hover:scale-105 shadow-lg shadow-primary/20">
                    <span>View Projects</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                <a href="#contact" class="inline-flex items-center gap-2 border-2 border-primary text-primary font-bold px-8 py-4 rounded-full hover:bg-primary hover:text-background transition-all hover:scale-105">
                    <span>Get In Touch</span>
                </a>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="flex justify-center animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-secondary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                </svg>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="stats-section" class="py-12 bg-background">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($statistics as $index => $stat)
                    <div class="bg-gradient-to-br {{ $loop->first ? 'from-blue-500/10 to-purple-500/10' : ($loop->iteration == 2 ? 'from-green-500/10 to-teal-500/10' : ($loop->iteration == 3 ? 'from-orange-500/10 to-red-500/10' : 'from-pink-500/10 to-purple-500/10')) }} border border-border rounded-2xl p-6 text-center hover:scale-105 transition-transform duration-300">
                        <div class="text-4xl md:text-5xl font-bold text-primary mb-2" x-text="animatedStats[{{ $index }}] || 0"></div>
                        <div class="text-sm md:text-base text-secondary font-medium">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section with Expanded Bento Grid -->
    <section id="projects" class="py-20 bg-background">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-primary mb-4 tracking-tight">
                    Featured <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">Projects</span>
                </h2>
                <p class="text-secondary text-lg max-w-xl mx-auto">
                    Check out my latest work and see what I've been building
                </p>
            </div>

            <!-- Bento Grid - Fixed Layout Pattern -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-6">
                @php
                    $displayProjects = $featured_projects->take(6);
                @endphp
                
                @foreach($displayProjects as $index => $project)
                    @if($index === 0)
                        {{-- First project: Large (8 cols, 2 rows) --}}
                        <div class="md:col-span-8 md:row-span-2 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative min-h-[400px] md:min-h-0">
                    @elseif($index === 1)
                        {{-- Second project: Tall (4 cols, 2 rows) --}}
                        <div class="md:col-span-4 md:row-span-2 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative min-h-[400px] md:min-h-0">
                    @elseif($index === 2)
                        {{-- Third project: Wide (6 cols, 1 row) --}}
                        <div class="md:col-span-6 md:row-span-1 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative min-h-[280px] md:min-h-0">
                    @elseif($index === 3)
                        {{-- Fourth project: Medium (3 cols, 1 row) --}}
                        <div class="md:col-span-3 md:row-span-1 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative min-h-[280px] md:min-h-0">
                    @elseif($index === 4)
                        {{-- Fifth project: Medium (3 cols, 1 row) --}}
                        <div class="md:col-span-3 md:row-span-1 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative min-h-[280px] md:min-h-0">
                    @else
                        {{-- Sixth project: Wide (6 cols, 1 row) --}}
                        <div class="md:col-span-6 md:row-span-1 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative min-h-[280px] md:min-h-0">
                    @endif
                    
                        {{-- Project Content --}}
                        <div class="relative w-full h-full flex flex-col justify-between p-6 overflow-hidden">
                            {{-- Corner Gradient Accent --}}
                            <div class="absolute top-0 right-0 w-32 h-32 opacity-30 pointer-events-none">
                                <div class="w-full h-full bg-gradient-to-br 
                                    {{ $loop->first ? 'from-blue-500 via-purple-500 to-pink-500' : '' }}
                                    {{ $loop->iteration == 2 ? 'from-green-500 via-teal-500 to-blue-500' : '' }}
                                    {{ $loop->iteration == 3 ? 'from-orange-500 via-red-500 to-pink-500' : '' }}
                                    {{ $loop->iteration == 4 ? 'from-purple-500 via-pink-500 to-red-500' : '' }}
                                    {{ $loop->iteration == 5 ? 'from-yellow-500 via-orange-500 to-red-500' : '' }}
                                    {{ $loop->iteration == 6 ? 'from-cyan-500 via-blue-500 to-purple-500' : '' }}
                                    rounded-full blur-3xl"></div>
                            </div>
                            {{-- Header with category and view count --}}
                            <div class="relative z-10">
                            <div class="flex items-start justify-between">
                                <span class="px-3 py-1 text-xs font-bold bg-primary/10 text-primary border border-primary/20 rounded-full">
                                    {{ $project->category }}
                                </span>
                                <div class="flex items-center gap-1 text-xs text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ number_format($project->view_count) }}
                                </div>
                            </div>
                            </div>

                            {{-- Project Info --}}
                            <div class="relative z-10">
                            <div>
                                <h3 class="text-xl md:text-2xl font-bold text-primary mb-2 group-hover:text-blue-500 transition-colors">
                                    {{ $project->title }}
                                </h3>
                                <p class="text-secondary text-sm mb-4 line-clamp-2">
                                    {{ $project->description }}
                                </p>
                                
                                {{-- Tech Stack --}}
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    @foreach(array_slice($project->tech_stack, 0, 3) as $tech)
                                        <span class="px-2 py-1 rounded text-xs font-bold bg-primary/5 text-primary border border-primary/10">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                    @if(count($project->tech_stack) > 3)
                                        <span class="px-2 py-1 rounded text-xs font-bold text-secondary">
                                            +{{ count($project->tech_stack) - 3 }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Links --}}
                                <div class="flex gap-3">
                                    @if($project->repository_url)
                                        <a href="{{ $project->repository_url }}" target="_blank" class="text-sm font-medium text-primary hover:text-accent transition-colors flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.070 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.020.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.840 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.430.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                            </svg>
                                            Code
                                        </a>
                                    @endif
                                    @if($project->live_url)
                                        <a href="{{ $project->live_url }}" target="_blank" class="text-sm font-medium text-primary hover:text-accent transition-colors flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                            Live
                                        </a>
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Skills Showcase Section with Bento Grid -->
    <section id="skills" class="py-20 bg-background">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-primary mb-4 tracking-tight">
                    Skills & <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-600">Expertise</span>
                </h2>
                <p class="text-secondary text-lg max-w-xl mx-auto">
                    Technologies and tools I work with
                </p>
            </div>

            <!-- Bento Grid Layout for Skills -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-6">
                @php
                    $categoryIndex = 0;
                @endphp
                @foreach($skills as $category => $skillList)
                    @if($categoryIndex === 0)
                        {{-- First category: Large (7 cols) --}}
                        <div class="md:col-span-7 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($categoryIndex === 1)
                        {{-- Second category: Medium (5 cols) --}}
                        <div class="md:col-span-5 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-green-500 via-teal-500 to-blue-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($categoryIndex === 2)
                        {{-- Third category: Medium (5 cols) --}}
                        <div class="md:col-span-5 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-orange-500 via-red-500 to-pink-500 rounded-full blur-3xl opacity-20"></div>
                    @else
                        {{-- Fourth+ category: Large (7 cols) --}}
                        <div class="md:col-span-7 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 rounded-full blur-3xl opacity-20"></div>
                    @endif
                        <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                                </svg>
                            </div>
                            <h3 class="text-xl md:text-2xl font-bold text-primary">{{ $category }}</h3>
                        </div>
                        <div class="grid grid-cols-1 {{ count($skillList) > 6 ? 'md:grid-cols-2' : '' }} gap-4">
                            @foreach($skillList as $skill)
                                <div class="group">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-semibold text-primary group-hover:text-blue-500 transition-colors">{{ $skill['name'] }}</span>
                                        <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-primary/10 text-primary">{{ $skill['level'] }}%</span>
                                    </div>
                                    <div class="w-full bg-background/50 border border-border/50 rounded-full h-2 overflow-hidden">
                                        <div class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 h-full rounded-full transition-all duration-1000 ease-out group-hover:scale-105" style="width: {{ $skill['level'] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @php
                        $categoryIndex++;
                    @endphp
                @endforeach
            </div>
        </div>
    </section>

    <!-- Enhanced Services Section with Bento Grid -->
    <section id="services" class="py-20 bg-background">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-primary mb-4 tracking-tight">
                    What I <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-red-500 to-pink-600">Offer</span>
                </h2>
                <p class="text-secondary text-lg max-w-xl mx-auto">
                    Professional services tailored to your needs
                </p>
            </div>

            <!-- Bento Grid Layout for Services -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-6">
                @php
                    $displayServices = $services->take(6);
                @endphp
                @foreach($displayServices as $index => $service)
                    @if($index === 0)
                        {{-- First service: Large (8 cols) --}}
                        <div class="md:col-span-8 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($index === 1)
                        {{-- Second service: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-green-500 via-teal-500 to-blue-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($index === 2)
                        {{-- Third service: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-orange-500 via-red-500 to-pink-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($index === 3)
                        {{-- Fourth service: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($index === 4)
                        {{-- Fifth service: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-yellow-500 via-orange-500 to-red-500 rounded-full blur-3xl opacity-20"></div>
                    @else
                        {{-- Sixth service: Large (8 cols) --}}
                        <div class="md:col-span-8 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-cyan-500 via-blue-500 to-purple-500 rounded-full blur-3xl opacity-20"></div>
                    @endif
                        <!-- Popular Badge -->
                        @if($service->is_popular)
                            <div class="absolute -top-3 -right-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg z-10">
                                ⭐ POPULAR
                            </div>
                        @endif

                        <div class="relative z-10 flex flex-col h-full">
                            <!-- Header -->
                            <div class="mb-4">
                                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-primary">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl md:text-2xl font-bold text-primary mb-2 group-hover:text-blue-500 transition-colors">
                                    {{ $service->title }}
                                </h3>
                                <p class="text-sm text-secondary line-clamp-2">
                                    {{ $service->description }}
                                </p>
                            </div>

                            <!-- Features (show first 3-4) -->
                            <div class="flex-1 mb-4">
                                <ul class="space-y-1.5">
                                    @foreach(array_slice($service->features, 0, $index === 0 || $index === 5 ? 4 : 3) as $feature)
                                        <li class="flex items-start gap-2 text-xs text-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                            <span class="line-clamp-1">{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                    @if(count($service->features) > ($index === 0 || $index === 5 ? 4 : 3))
                                        <li class="text-xs text-secondary/60 pl-6">+{{ count($service->features) - ($index === 0 || $index === 5 ? 4 : 3) }} more...</li>
                                    @endif
                                </ul>
                            </div>
                            
                            <!-- Price & CTA -->
                            <div class="flex items-center justify-between pt-4 border-t border-border/50">
                                <div>
                                    <span class="text-xs text-secondary block">From</span>
                                    <span class="text-xl md:text-2xl font-bold text-primary">${{ number_format($service->price_start) }}</span>
                                </div>
                                <button class="bg-primary text-background px-4 py-2 rounded-full font-bold text-xs md:text-sm hover:opacity-90 transition-all hover:scale-105 flex items-center gap-1.5">
                                    <span>Start</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Bento Grid Section -->
    <section id="testimonials" class="py-20 bg-background">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-primary mb-4 tracking-tight">
                    Client <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600">Testimonials</span>
                </h2>
                <p class="text-secondary text-lg max-w-xl mx-auto">
                    What people say about working with me
                </p>
            </div>

            <!-- Bento Grid Layout for Testimonials -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-6">
                @php
                    $displayTestimonials = $testimonials->take(6);
                @endphp
                @foreach($displayTestimonials as $index => $testimonial)
                    @if($index === 0)
                        {{-- First: Large (8 cols) --}}
                        <div class="md:col-span-8 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-yellow-400 via-orange-500 to-red-600 rounded-full blur-3xl opacity-20"></div>
                    @elseif($index === 1)
                        {{-- Second: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($index === 2)
                        {{-- Third: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-green-500 via-teal-500 to-blue-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($index === 3)
                        {{-- Fourth: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 rounded-full blur-3xl opacity-20"></div>
                    @elseif($index === 4)
                        {{-- Fifth: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-orange-500 via-red-500 to-pink-500 rounded-full blur-3xl opacity-20"></div>
                    @else
                        {{-- Sixth: Medium (4 cols) --}}
                        <div class="md:col-span-4 relative bg-surface border border-border rounded-2xl p-6 md:p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group min-h-[300px] overflow-hidden">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-cyan-500 via-blue-500 to-purple-500 rounded-full blur-3xl opacity-20"></div>
                    @endif
                        <div class="relative z-10 flex flex-col h-full">
                        <!-- Quote Icon -->
                        <div class="text-4xl text-primary/10 mb-3">"</div>
                        
                        <!-- Testimonial Content -->
                        <p class="text-sm text-primary mb-4 leading-relaxed flex-1 {{ $index === 0 ? 'line-clamp-6' : 'line-clamp-4' }}">
                            {{ $testimonial->content }}
                        </p>
                        
                        <!-- Rating -->
                        <div class="flex gap-0.5 mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $i <= $testimonial->rating ? 'currentColor' : 'none' }}" stroke="currentColor" class="w-4 h-4 text-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            @endfor
                        </div>

                        <!-- Client Info -->
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-sm font-bold text-primary">{{ substr($testimonial->client_name, 0, 1) }}</span>
                            </div>
                            <div class="min-w-0">
                                <div class="font-bold text-primary text-sm truncate">{{ $testimonial->client_name }}</div>
                                <div class="text-xs text-secondary truncate">
                                    {{ $testimonial->client_position }} • {{ $testimonial->client_company }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section with Bento Grid -->
    <section class="py-20 bg-background">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-primary mb-4 tracking-tight">
                    About <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600">Me</span>
                </h2>
                <p class="text-secondary text-lg max-w-xl mx-auto">
                    Get to know more about who I am and what drives me
                </p>
            </div>

            <!-- Bento Grid Layout for About -->
            <div class="grid grid-cols-12 gap-4 auto-rows-[200px]">
                <!-- Main About Card (Large) -->
                <div class="col-span-12 md:col-span-8 row-span-2 bg-gradient-to-br from-blue-500/10 via-purple-500/10 to-pink-500/10 border border-border rounded-2xl p-8 md:p-10">
                    <h3 class="text-2xl md:text-3xl font-bold text-primary mb-4">Who I Am</h3>
                    <p class="text-secondary text-base md:text-lg leading-relaxed mb-4">
                        I'm a passionate developer who loves creating beautiful, functional web experiences. 
                        With expertise in modern web technologies, I bring ideas to life through clean code 
                        and thoughtful design.
                    </p>
                    <p class="text-secondary text-base md:text-lg leading-relaxed">
                        When I'm not coding, you'll find me exploring new technologies, contributing to 
                        open-source projects, or sharing knowledge with the developer community. Let's build 
                        something amazing together!
                    </p>
                </div>

                <!-- Experience Card -->
                <div class="col-span-12 md:col-span-4 row-span-1 bg-gradient-to-br from-green-500/10 to-teal-500/10 border border-border rounded-2xl p-6 flex flex-col justify-between">
                    <div>
                        <div class="text-4xl md:text-5xl font-bold text-primary mb-2">5+</div>
                        <h3 class="text-lg font-bold text-primary mb-2">Years Experience</h3>
                        <p class="text-sm text-secondary">Building scalable web applications</p>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="col-span-12 md:col-span-4 row-span-1 bg-gradient-to-br from-orange-500/10 to-red-500/10 border border-border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-primary mb-3">My Mission</h3>
                    <p class="text-sm text-secondary leading-relaxed">
                        To create digital experiences that not only look great but solve real problems and make a positive impact.
                    </p>
                </div>

                <!-- Current Focus Card -->
                <div class="col-span-12 md:col-span-6 row-span-1 bg-gradient-to-br from-purple-500/10 to-pink-500/10 border border-border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-primary mb-3">Currently Exploring</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-primary/10 text-primary border border-primary/20">AI/ML Integration</span>
                        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-primary/10 text-primary border border-primary/20">Web3</span>
                        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-primary/10 text-primary border border-primary/20">Cloud Architecture</span>
                    </div>
                </div>

                <!-- Fun Fact Card -->
                <div class="col-span-12 md:col-span-6 row-span-1 bg-gradient-to-br from-yellow-500/10 to-orange-500/10 border border-border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-primary mb-3">When Not Coding</h3>
                    <p class="text-sm text-secondary leading-relaxed">
                        You'll find me reading tech blogs, attending meetups, or experimenting with new frameworks in my home lab.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Contact Section -->
    <section id="contact" class="py-20 mb-12"
             x-data="{
                 formData: { name: '', email: '', message: '' },
                 errors: {},
                 isSubmitting: false,
                 submitted: false,
                 validateField(field) {
                     this.errors[field] = '';
                     if (field === 'email' && this.formData.email && !this.formData.email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                         this.errors.email = 'Invalid email format';
                     }
                     if (!this.formData[field]) {
                         this.errors[field] = 'This field is required';
                     }
                 },
                 async submitForm() {
                     this.errors = {};
                     ['name', 'email', 'message'].forEach(field => this.validateField(field));
                     if (Object.keys(this.errors).some(key => this.errors[key])) return;
                     
                     this.isSubmitting = true;
                     await new Promise(resolve => setTimeout(resolve, 2000));
                     this.isSubmitting = false;
                     this.submitted = true;
                     this.formData = { name: '', email: '', message: '' };
                     setTimeout(() => this.submitted = false, 5000);
                 }
             }">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="relative overflow-hidden rounded-3xl bg-primary px-8 py-12 md:px-12 md:py-16 shadow-2xl shadow-primary/20">
                    <!-- Background Gradients -->
                    <div class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-br from-blue-500/30 to-purple-500/30 blur-3xl rounded-full pointer-events-none"></div>
                    <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-tl from-red-500/30 to-yellow-500/30 blur-3xl rounded-full pointer-events-none"></div>

                    <div class="relative z-10">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold tracking-tight text-background sm:text-4xl leading-tight mb-4">
                                Let's Work <br>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">Together</span>
                            </h2>
                            <p class="text-lg text-background/90">
                                Have a project in mind? Let's discuss how we can bring your ideas to life.
                            </p>
                        </div>

                        <!-- Success Message -->
                        <div x-show="submitted" 
                             x-transition
                             class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-lg text-background text-center font-medium">
                            Message sent successfully! I'll get back to you soon.
                        </div>
                        
                        <!-- Contact Form -->
                        <form @submit.prevent="submitForm" class="space-y-6 text-left">
                            <div>
                                <label for="name" class="block text-sm font-medium text-background mb-2">Name *</label>
                                <input type="text" id="name" x-model="formData.name" @blur="validateField('name')" 
                                       class="w-full px-4 py-3 rounded-lg bg-background/10 border text-background placeholder-background/50 focus:outline-none focus:ring-2 focus:ring-background/30 backdrop-blur-sm transition-all"
                                       :class="errors.name ? 'border-red-400' : 'border-background/20'"
                                       placeholder="John Doe">
                                <p x-show="errors.name" x-text="errors.name" class="text-xs text-red-300 mt-1"></p>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-background mb-2">Email *</label>
                                <input type="email" id="email" x-model="formData.email" @blur="validateField('email')"
                                       class="w-full px-4 py-3 rounded-lg bg-background/10 border text-background placeholder-background/50 focus:outline-none focus:ring-2 focus:ring-background/30 backdrop-blur-sm transition-all"
                                       :class="errors.email ? 'border-red-400' : 'border-background/20'"
                                       placeholder="john@example.com">
                                <p x-show="errors.email" x-text="errors.email" class="text-xs text-red-300 mt-1"></p>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <label for="message" class="block text-sm font-medium text-background">Message *</label>
                                    <span class="text-xs text-background/70" x-text="`${formData.message.length}/500`"></span>
                                </div>
                                <textarea id="message" x-model="formData.message" @blur="validateField('message')" maxlength="500" rows="4"
                                          class="w-full px-4 py-3 rounded-lg bg-background/10 border text-background placeholder-background/50 focus:outline-none focus:ring-2 focus:ring-background/30 backdrop-blur-sm resize-none transition-all"
                                          :class="errors.message ? 'border-red-400' : 'border-background/20'"
                                          placeholder="Tell me about your project..."></textarea>
                                <p x-show="errors.message" x-text="errors.message" class="text-xs text-red-300 mt-1"></p>
                            </div>
                            <button type="submit" 
                                    :disabled="isSubmitting"
                                    :class="isSubmitting ? 'opacity-70 cursor-not-allowed' : 'hover:opacity-90 hover:scale-105'"
                                    class="w-full md:w-auto rounded-full bg-background px-8 py-3.5 text-sm font-bold text-primary shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition-all transform flex items-center justify-center gap-2">
                                <span x-show="!isSubmitting">Send Message</span>
                                <span x-show="isSubmitting">Sending...</span>
                                <svg x-show="isSubmitting" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Back to Top Button -->
    <div x-data="{ showButton: false }"
         @scroll.window="showButton = window.pageYOffset > 300"
         x-show="showButton"
         x-transition
         class="fixed bottom-8 right-8 z-50">
        <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                class="bg-primary text-background p-4 rounded-full shadow-lg hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
        </button>
    </div>

    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection
