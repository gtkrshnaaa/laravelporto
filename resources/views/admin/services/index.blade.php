@extends('layouts.admin')

@section('title', 'Services')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-primary mb-2">Services</h2>
            <p class="text-secondary">Manage your service offerings.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="bg-primary text-background font-bold py-2 px-4 rounded-lg hover:opacity-90 transition-opacity text-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add Service
        </a>
    </div>

    @if($services->isEmpty())
        <div class="bg-surface border border-border rounded-xl p-12 text-center">
            <h3 class="text-xl font-bold text-primary mb-2">No services yet</h3>
            <p class="text-secondary mb-6">Add your first service offering.</p>
            <a href="{{ route('admin.services.create') }}" class="inline-block bg-primary text-background font-bold py-2 px-6 rounded-lg hover:opacity-90 transition-opacity">Add Service Now</a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
                <div class="bg-surface border border-border rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-primary">{{ $service->title }}</h3>
                        @if($service->is_popular)
                            <span class="px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">Popular</span>
                        @endif
                    </div>
                    
                    <p class="text-secondary text-sm mb-4">{{ Str::limit($service->description, 100) }}</p>
                    
                    <div class="mb-4">
                        <p class="text-xs text-secondary mb-2">Starting from</p>
                        <p class="text-2xl font-bold text-primary">${{ number_format($service->price_start) }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-xs text-secondary mb-2">Features ({{ count($service->features ?? []) }})</p>
                        <ul class="text-sm text-secondary space-y-1">
                            @foreach(array_slice($service->features ?? [], 0, 3) as $feature)
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>{{ Str::limit($feature, 40) }}</span>
                                </li>
                            @endforeach
                            @if(count($service->features ?? []) > 3)
                                <li class="text-xs text-secondary/70">+{{ count($service->features) - 3 }} more</li>
                            @endif
                        </ul>
                    </div>
                    
                    <div class="flex items-center gap-2 pt-4 border-t border-border opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('admin.services.edit', $service) }}" class="flex-1 text-center bg-primary/10 text-primary px-4 py-2 rounded-lg hover:bg-primary/20 transition-colors text-sm font-medium">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Delete this service?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400 px-4 py-2 text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
