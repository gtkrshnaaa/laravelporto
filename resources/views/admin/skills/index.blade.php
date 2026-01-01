@extends('layouts.admin')

@section('title', 'Skills')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-primary mb-2">Skills</h2>
            <p class="text-secondary">Manage your technical skills and expertise.</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="bg-primary text-background font-bold py-2 px-4 rounded-lg hover:opacity-90 transition-opacity text-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add Skill
        </a>
    </div>

    @if($skills->isEmpty())
        <div class="bg-surface border border-border rounded-xl p-12 text-center">
            <div class="w-16 h-16 bg-surface border border-border rounded-full flex items-center justify-center mx-auto mb-4 text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-primary mb-2">No skills yet</h3>
            <p class="text-secondary mb-6">Add your first skill to showcase your expertise.</p>
            <a href="{{ route('admin.skills.create') }}" class="inline-block bg-primary text-background font-bold py-2 px-6 rounded-lg hover:opacity-90 transition-opacity">
                Add Skill Now
            </a>
        </div>
    @else
        <div class="space-y-6">
            @foreach($skills as $category => $categorySkills)
                <div class="bg-surface border border-border rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300">
                    <h3 class="text-xl font-bold text-primary mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                        </svg>
                        {{ $category }}
                        <span class="text-sm text-secondary font-normal ml-2">({{ $categorySkills->count() }} skills)</span>
                    </h3>
                    
                    <div class="space-y-3">
                        @foreach($categorySkills as $skill)
                            <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-background transition-colors group">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-primary font-medium">{{ $skill->name }}</span>
                                        <span class="text-sm text-secondary font-mono">{{ $skill->level }}%</span>
                                    </div>
                                    <div class="w-full bg-background rounded-full h-2 overflow-hidden">
                                        <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full transition-all duration-300" style="width: {{ $skill->level }}%"></div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.skills.edit', $skill) }}" class="text-primary hover:text-blue-400 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
