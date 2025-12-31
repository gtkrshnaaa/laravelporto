@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-24 pb-0 md:pt-32 md:pb-0 overflow-hidden mb-0">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-zinc-800/20 via-background to-background opacity-40"></div>
        
        <div class="container mx-auto px-4 relative z-10 text-center min-h-[400px] flex flex-col justify-center items-center">
            <h1 class="text-4xl md:text-8xl lg:text-9xl font-bold tracking-tighter text-primary mb-8 leading-tight pb-2">
                {{ $portfolio_name }}
            </h1>
            <p class="text-lg md:text-2xl text-secondary max-w-4xl mx-auto mb-4">
                {{ $portfolio_profession }}
            </p>
            <p class="text-base md:text-xl text-secondary/80 max-w-2xl mx-auto italic">
                {{ $portfolio_tagline }}
            </p>
        </div>
    </section>

    <!-- Projects Section with Bento Grid -->
    <section id="projects" class="py-20 bg-background">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="mb-12">
                <h2 class="text-3xl md:text-5xl font-bold text-primary mb-4 tracking-tight">
                    Featured <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">Projects</span>
                </h2>
                <p class="text-secondary text-lg max-w-xl">
                    Check out my latest work and see what I've been building
                </p>
            </div>

            <!-- Bento Grid -->
            <div class="grid grid-cols-12 gap-4 auto-rows-[300px]">
                @foreach($featured_projects as $index => $project)
                    @if($index === 0)
                        <!-- Large Featured Item (First Project) -->
                        <div class="col-span-12 md:col-span-8 row-span-2 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative">
                            @if($project['featured_image'])
                                <img src="{{ $project['featured_image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-500/10 via-purple-500/10 to-pink-500/10 flex items-center justify-center">
                                    <div class="text-center p-8">
                                        <h3 class="text-3xl font-bold text-primary mb-4">{{ $project['title'] }}</h3>
                                        <p class="text-secondary text-lg mb-6">{{ $project['description'] }}</p>
                                        <div class="flex flex-wrap gap-2 justify-center">
                                            @foreach($project['tech_stack'] as $tech)
                                                <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-primary/10 text-primary border border-primary/20">
                                                    {{ $tech }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @elseif($index === 1)
                        <!-- Medium Width Item (Second Project) -->
                        <div class="col-span-12 md:col-span-4 row-span-1 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative">
                            @if($project['featured_image'])
                                <img src="{{ $project['featured_image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-green-500/10 via-teal-500/10 to-blue-500/10 flex items-center justify-center">
                                    <div class="text-center p-6">
                                        <h3 class="text-xl font-bold text-primary mb-2">{{ $project['title'] }}</h3>
                                        <p class="text-secondary text-sm mb-4">{{ $project['description'] }}</p>
                                        <div class="flex flex-wrap gap-1.5 justify-center">
                                            @foreach($project['tech_stack'] as $tech)
                                                <span class="px-2 py-1 rounded text-xs font-bold bg-primary/10 text-primary border border-primary/20">
                                                    {{ $tech }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @elseif($index === 2)
                        <!-- Medium Width Item (Third Project) -->
                        <div class="col-span-12 md:col-span-4 row-span-1 group bg-surface border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 relative">
                            @if($project['featured_image'])
                                <img src="{{ $project['featured_image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-orange-500/10 via-red-500/10 to-pink-500/10 flex items-center justify-center">
                                    <div class="text-center p-6">
                                        <h3 class="text-xl font-bold text-primary mb-2">{{ $project['title'] }}</h3>
                                        <p class="text-secondary text-sm mb-4">{{ $project['description'] }}</p>
                                        <div class="flex flex-wrap gap-1.5 justify-center">
                                            @foreach($project['tech_stack'] as $tech)
                                                <span class="px-2 py-1 rounded text-xs font-bold bg-primary/10 text-primary border border-primary/20">
                                                    {{ $tech }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-background">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="mb-12">
                <h2 class="text-3xl md:text-5xl font-bold text-primary mb-4 tracking-tight">
                    What I <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-600">Offer</span>
                </h2>
                <p class="text-secondary text-lg max-w-xl">
                    Professional services tailored to your needs
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-surface border border-border rounded-2xl p-8 hover:shadow-xl hover:shadow-primary/5 hover:border-primary/30 transition-all duration-300 group">
                        <!-- Icon (placeholder using simple shapes) -->
                        <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <div class="w-6 h-6 bg-primary/30 rounded-full"></div>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-primary mb-3 group-hover:text-blue-500 transition-colors">
                            {{ $service['title'] }}
                        </h3>
                        
                        <p class="text-secondary mb-6">
                            {{ $service['description'] }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-mono text-secondary">
                                From <span class="text-primary font-bold">${{ $service['price_start'] }}</span>
                            </span>
                            <button class="text-primary hover:text-accent transition-colors font-medium text-sm">
                                Learn More →
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-background">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-surface border border-border rounded-2xl p-8 md:p-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-primary mb-6">
                        About Me
                    </h2>
                    <p class="text-secondary text-lg leading-relaxed mb-6">
                        I'm a passionate developer who loves creating beautiful, functional web experiences. 
                        With expertise in modern web technologies, I bring ideas to life through clean code 
                        and thoughtful design.
                    </p>
                    <p class="text-secondary text-lg leading-relaxed">
                        When I'm not coding, you'll find me exploring new technologies, contributing to 
                        open-source projects, or sharing knowledge with the developer community.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 mb-12">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="relative overflow-hidden rounded-3xl bg-primary px-8 py-12 md:px-12 md:py-16 shadow-2xl shadow-primary/20">
                    <!-- Background Gradients -->
                    <div class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-br from-blue-500/30 to-purple-500/30 blur-3xl rounded-full pointer-events-none"></div>
                    <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-tl from-red-500/30 to-yellow-500/30 blur-3xl rounded-full pointer-events-none"></div>

                    <div class="relative z-10 text-center">
                        <h2 class="text-3xl font-bold tracking-tight text-background sm:text-4xl leading-tight mb-4">
                            Let's Work <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">Together</span>
                        </h2>
                        <p class="mt-4 max-w-xl text-lg text-background mx-auto mb-8">
                            Have a project in mind? Let's discuss how we can bring your ideas to life.
                        </p>
                        
                        <!-- Contact Form -->
                        <form class="space-y-6 text-left">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-background mb-2">Name</label>
                                    <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg bg-background/10 border border-background/20 text-background placeholder-background/50 focus:outline-none focus:ring-2 focus:ring-background/30 backdrop-blur-sm" placeholder="John Doe">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-background mb-2">Email</label>
                                    <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg bg-background/10 border border-background/20 text-background placeholder-background/50 focus:outline-none focus:ring-2 focus:ring-background/30 backdrop-blur-sm" placeholder="john@example.com">
                                </div>
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-background mb-2">Message</label>
                                <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg bg-background/10 border border-background/20 text-background placeholder-background/50 focus:outline-none focus:ring-2 focus:ring-background/30 backdrop-blur-sm resize-none" placeholder="Tell me about your project..."></textarea>
                            </div>
                            <button type="submit" class="w-full md:w-auto rounded-full bg-background px-8 py-3.5 text-sm font-bold text-primary shadow-sm hover:opacity-90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition-all transform hover:scale-105">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
