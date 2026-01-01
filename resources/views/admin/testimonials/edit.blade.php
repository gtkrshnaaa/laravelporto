@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="max-w-2xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-primary mb-2">Edit Testimonial</h2>
            <p class="text-secondary">Update testimonial information.</p>
        </div>

        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" class="space-y-6" x-data="{ rating: {{ old('rating', $testimonial->rating) }} }">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label for="client_name" class="block text-sm font-medium text-secondary mb-2">Client Name *</label>
                    <input id="client_name" type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required autofocus
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none">
                    @error('client_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="client_position" class="block text-sm font-medium text-secondary mb-2">Position *</label>
                        <input id="client_position" type="text" name="client_position" value="{{ old('client_position', $testimonial->client_position) }}" required
                            class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none">
                        @error('client_position')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="client_company" class="block text-sm font-medium text-secondary mb-2">Company *</label>
                        <input id="client_company" type="text" name="client_company" value="{{ old('client_company', $testimonial->client_company) }}" required
                            class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none">
                        @error('client_company')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-secondary mb-2">Rating *</label>
                    <div class="flex gap-2 mb-2">
                        <template x-for="star in 5" :key="star">
                            <button type="button" @click="rating = star" class="focus:outline-none">
                                <svg class="w-8 h-8 transition-colors" :class="star <= rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600'" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </button>
                        </template>
                    </div>
                    <input type="hidden" name="rating" :value="rating">
                    <p class="text-xs text-secondary">Click stars to rate</p>
                    @error('rating')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-secondary mb-2">Testimonial Content *</label>
                    <textarea id="content" name="content" rows="5" required
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none"
                        placeholder="What did the client say about your work?">{{ old('content', $testimonial->content) }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="bg-primary text-background font-bold py-3 px-6 rounded-lg hover:opacity-90 transition-opacity">Update Testimonial</button>
                <a href="{{ route('admin.testimonials.index') }}" class="text-secondary hover:text-primary transition-colors">Cancel</a>
                
                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="ml-auto" onsubmit="return confirm('Delete this testimonial?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-400 text-sm font-medium">Delete Testimonial</button>
                </form>
            </div>
        </form>
    </div>
@endsection
