@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-primary mb-2">Edit Service</h2>
            <p class="text-secondary">Update service information.</p>
        </div>

        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-6" x-data="{
            features: {{ json_encode($service->features ?? []) }},
            newFeature: '',
            addFeature() {
                if (this.newFeature.trim()) {
                    this.features.push(this.newFeature.trim());
                    this.newFeature = '';
                }
            },
            removeFeature(index) {
                this.features.splice(index, 1);
            }
        }">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-secondary mb-2">Service Title *</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $service->title) }}" required autofocus
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price_start" class="block text-sm font-medium text-secondary mb-2">Starting Price ($) *</label>
                    <input id="price_start" type="number" name="price_start" value="{{ old('price_start', $service->price_start) }}" required min="0"
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none">
                    @error('price_start')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon_class" class="block text-sm font-medium text-secondary mb-2">Icon Class</label>
                    <input id="icon_class" type="text" name="icon_class" value="{{ old('icon_class', $service->icon_class) }}" placeholder="code, palette, chat"
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none">
                    @error('icon_class')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-secondary mb-2">Description *</label>
                    <textarea id="description" name="description" rows="3" required
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-secondary mb-2">Features *</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" x-model="newFeature" @keydown.enter.prevent="addFeature()"
                            class="flex-1 bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none"
                            placeholder="Add feature (press Enter)">
                        <button type="button" @click="addFeature()"
                            class="bg-primary/10 text-primary px-6 py-3 rounded-lg hover:bg-primary/20 transition-colors font-medium">Add</button>
                    </div>
                    <div class="space-y-2">
                        <template x-for="(feature, index) in features" :key="index">
                            <div class="flex items-center gap-2 p-3 bg-surface border border-border rounded-lg">
                                <span class="flex-1 text-primary" x-text="feature"></span>
                                <input type="hidden" name="features[]" :value="feature">
                                <button type="button" @click="removeFeature(index)" class="text-red-500 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                        <span x-show="features.length === 0" class="text-secondary text-sm">No features added yet</span>
                    </div>
                    @error('features')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular', $service->is_popular) ? 'checked' : '' }} class="w-4 h-4 rounded border-border bg-background text-primary focus:ring-0">
                        <label for="is_popular" class="text-sm font-medium text-primary cursor-pointer">Mark as Popular Service</label>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="bg-primary text-background font-bold py-3 px-6 rounded-lg hover:opacity-90 transition-opacity">Update Service</button>
                <a href="{{ route('admin.services.index') }}" class="text-secondary hover:text-primary transition-colors">Cancel</a>
                
                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="ml-auto" onsubmit="return confirm('Delete this service?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-400 text-sm font-medium">Delete Service</button>
                </form>
            </div>
        </form>
    </div>
@endsection
