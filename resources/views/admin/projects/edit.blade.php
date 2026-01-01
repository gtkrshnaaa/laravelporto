@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-primary mb-2">Edit Project</h2>
            <p class="text-secondary">Update project information.</p>
        </div>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="{
            techStack: {{ json_encode($project->tech_stack ?? []) }},
            newTech: '',
            addTech() {
                if (this.newTech.trim()) {
                    this.techStack.push(this.newTech.trim());
                    this.newTech = '';
                }
            },
            removeTech(index) {
                this.techStack.splice(index, 1);
            }
        }">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-secondary mb-2">Project Title *</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $project->title) }}" required autofocus
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none placeholder-secondary">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-secondary mt-1">Current slug: <span class="font-mono">{{ $project->slug }}</span></p>
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-secondary mb-2">Category *</label>
                    <input id="category" type="text" name="category" value="{{ old('category', $project->category) }}" required list="category-list"
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none placeholder-secondary"
                        placeholder="e.g., Web Application">
                    <datalist id="category-list">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">
                        @endforeach
                    </datalist>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Size -->
                <div>
                    <label for="size" class="block text-sm font-medium text-secondary mb-2">Size *</label>
                    <select id="size" name="size" required
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none cursor-pointer">
                        <option value="small" {{ old('size', $project->size) == 'small' ? 'selected' : '' }}>Small</option>
                        <option value="medium" {{ old('size', $project->size) == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="large" {{ old('size', $project->size) == 'large' ? 'selected' : '' }}>Large</option>
                    </select>
                    @error('size')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-secondary mt-1">For Bento Grid layout</p>
                </div>

                <!-- Repository URL -->
                <div>
                    <label for="repository_url" class="block text-sm font-medium text-secondary mb-2">Repository URL</label>
                    <input id="repository_url" type="url" name="repository_url" value="{{ old('repository_url', $project->repository_url) }}" placeholder="https://github.com/..."
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none placeholder-secondary font-mono text-sm">
                    @error('repository_url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Live URL -->
                <div>
                    <label for="live_url" class="block text-sm font-medium text-secondary mb-2">Live URL</label>
                    <input id="live_url" type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}" placeholder="https://..."
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none placeholder-secondary font-mono text-sm">
                    @error('live_url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tech Stack -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-secondary mb-2">Tech Stack *</label>
                    <div class="flex gap-2 mb-2">
                        <input type="text" x-model="newTech" @keydown.enter.prevent="addTech()"
                            class="flex-1 bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none placeholder-secondary"
                            placeholder="Add technology (press Enter)">
                        <button type="button" @click="addTech()"
                            class="bg-primary/10 text-primary px-6 py-3 rounded-lg hover:bg-primary/20 transition-colors font-medium">
                            Add
                        </button>
                    </div>
                    <div class="flex flex-wrap gap-2 min-h-[40px] p-3 bg-background border border-border rounded-lg">
                        <template x-for="(tech, index) in techStack" :key="index">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-surface border border-border">
                                <span class="text-sm text-primary" x-text="tech"></span>
                                <input type="hidden" name="tech_stack[]" :value="tech">
                                <button type="button" @click="removeTech(index)" class="text-red-500 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                        <span x-show="techStack.length === 0" class="text-secondary text-sm">No technologies added yet</span>
                    </div>
                    @error('tech_stack')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div class="md:col-span-2">
                    <label for="featured_image" class="block text-sm font-medium text-secondary mb-2">Featured Image</label>
                    
                    @if($project->featured_image)
                        <div class="mb-3">
                            <p class="text-xs text-secondary mb-2">Current image:</p>
                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-48 h-32 object-cover rounded-lg border border-border">
                        </div>
                    @endif
                    
                    <input id="featured_image" type="file" name="featured_image" accept="image/*"
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-surface file:text-primary hover:file:bg-surface/80">
                    <p class="text-xs text-secondary mt-1">Leave empty to keep current image. Recommended: 1200x800px, max 2MB</p>
                    @error('featured_image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-secondary mb-2">Description *</label>
                    <textarea id="description" name="description" rows="5" required
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none placeholder-secondary"
                        placeholder="Describe your project...">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Featured -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="w-4 h-4 rounded border-border bg-background text-primary focus:ring-0">
                        <label for="is_featured" class="text-sm font-medium text-primary cursor-pointer">Mark as Featured Project</label>
                    </div>
                    <p class="text-xs text-secondary mt-1 ml-6">Featured projects will be highlighted on the homepage</p>
                </div>

            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="bg-primary text-background font-bold py-3 px-6 rounded-lg hover:opacity-90 transition-opacity">
                    Update Project
                </button>
                <a href="{{ route('admin.projects.index') }}" class="text-secondary hover:text-primary transition-colors">Cancel</a>
                
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="ml-auto" onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-400 text-sm font-medium">Delete Project</button>
                </form>
            </div>
        </form>
    </div>
@endsection
