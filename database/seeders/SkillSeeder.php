<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Frontend
            ['name' => 'React', 'category' => 'Frontend', 'level' => 90],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'level' => 85],
            ['name' => 'TailwindCSS', 'category' => 'Frontend', 'level' => 95],
            ['name' => 'TypeScript', 'category' => 'Frontend', 'level' => 80],
            ['name' => 'Next.js', 'category' => 'Frontend', 'level' => 85],
            
            // Backend
            ['name' => 'Laravel', 'category' => 'Backend', 'level' => 95],
            ['name' => 'Node.js', 'category' => 'Backend', 'level' => 85],
            ['name' => 'PostgreSQL', 'category' => 'Backend', 'level' => 80],
            ['name' => 'MongoDB', 'category' => 'Backend', 'level' => 75],
            ['name' => 'Redis', 'category' => 'Backend', 'level' => 70],
            
            // Tools
            ['name' => 'Git', 'category' => 'Tools', 'level' => 90],
            ['name' => 'Docker', 'category' => 'Tools', 'level' => 75],
            ['name' => 'Figma', 'category' => 'Tools', 'level' => 85],
            ['name' => 'VS Code', 'category' => 'Tools', 'level' => 95],
            ['name' => 'Postman', 'category' => 'Tools', 'level' => 80],
        ];

        foreach ($skills as $index => $skill) {
            Skill::create(array_merge($skill, ['display_order' => $index + 1]));
        }
    }
}
