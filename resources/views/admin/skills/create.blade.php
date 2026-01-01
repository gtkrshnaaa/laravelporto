@extends('layouts.admin')

@section('title', 'Add Skill')

@section('content')
    <div class="max-w-2xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-primary mb-2">Add New Skill</h2>
            <p class="text-secondary">Add a new skill to your expertise.</p>
        </div>

        <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-6" x-data="{ level: {{ old('level', 50) }} }">
            @csrf

            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-secondary mb-2">Skill Name *</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none placeholder-secondary"
                        placeholder="e.g., Laravel, React, Docker">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-secondary mb-2">Category *</label>
                    <input id="category" type="text" name="category" value="{{ old('category') }}" required list="category-list"
                        class="w-full bg-background border border-border rounded-lg px-4 py-3 text-primary focus:ring-1 focus:ring-primary focus:border-primary transition-colors outline-none placeholder-secondary"
                        placeholder="e.g., Frontend, Backend, Tools">
                    <datalist id="category-list">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">
                        @endforeach
                        <option value="Frontend">
                        <option value="Backend">
                        <option value="Tools">
                        <option value="Design">
                    </datalist>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Level Slider -->
                <div>
                    <label for="level" class="block text-sm font-medium text-secondary mb-2">
                        Proficiency Level * 
                        <span class="text-primary font-mono ml-2" x-text="level + '%'"></span>
                    </label>
                    <input id="level" type="range" name="level" min="0" max="100" step="5" x-model="level" required
                        class="w-full h-2 bg-background rounded-lg appearance-none cursor-pointer accent-primary">
                    <div class="flex justify-between text-xs text-secondary mt-1">
                        <span>Beginner</span>
                        <span>Intermediate</span>
                        <span>Expert</span>
                    </div>
                    @error('level')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Preview -->
                <div class="bg-surface border border-border rounded-lg p-4">
                    <p class="text-xs text-secondary mb-2">Preview:</p>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-primary font-medium" x-text="document.getElementById('name').value || 'Skill Name'"></span>
                        <span class="text-sm text-secondary font-mono" x-text="level + '%'"></span>
                    </div>
                    <div class="w-full bg-background rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full transition-all duration-300" :style="'width: ' + level + '%'"></div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="bg-primary text-background font-bold py-3 px-6 rounded-lg hover:opacity-90 transition-opacity">
                    Add Skill
                </button>
                <a href="{{ route('admin.skills.index') }}" class="text-secondary hover:text-primary transition-colors">Cancel</a>
            </div>
        </form>
    </div>
@endsection
