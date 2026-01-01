@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-primary mb-2">Testimonials</h2>
            <p class="text-secondary">Manage client testimonials and reviews.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="bg-primary text-background font-bold py-2 px-4 rounded-lg hover:opacity-90 transition-opacity text-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add Testimonial
        </a>
    </div>

    @if($testimonials->isEmpty())
        <div class="bg-surface border border-border rounded-xl p-12 text-center">
            <h3 class="text-xl font-bold text-primary mb-2">No testimonials yet</h3>
            <p class="text-secondary mb-6">Add your first client testimonial.</p>
            <a href="{{ route('admin.testimonials.create') }}" class="inline-block bg-primary text-background font-bold py-2 px-6 rounded-lg hover:opacity-90 transition-opacity">Add Testimonial Now</a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($testimonials as $testimonial)
                <div class="bg-surface border border-border rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-primary">{{ $testimonial->client_name }}</h3>
                            <p class="text-sm text-secondary">{{ $testimonial->client_position }} at {{ $testimonial->client_company }}</p>
                        </div>
                        <div class="flex gap-0.5">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                    </div>
                    
                    <p class="text-secondary text-sm italic">"{{ $testimonial->content }}"</p>
                    
                    <div class="flex items-center gap-2 pt-4 mt-4 border-t border-border opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="flex-1 text-center bg-primary/10 text-primary px-4 py-2 rounded-lg hover:bg-primary/20 transition-colors text-sm font-medium">Edit</a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400 px-4 py-2 text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-6">
            {{ $testimonials->links() }}
        </div>
    @endif
@endsection
