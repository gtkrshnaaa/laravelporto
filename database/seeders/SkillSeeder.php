<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Frontend (12 skills)
            ['name' => 'HTML5 & CSS3', 'category' => 'Frontend', 'level' => 95, 'display_order' => 1],
            ['name' => 'JavaScript (ES6+)', 'category' => 'Frontend', 'level' => 92, 'display_order' => 2],
            ['name' => 'TypeScript', 'category' => 'Frontend', 'level' => 85, 'display_order' => 3],
            ['name' => 'React.js', 'category' => 'Frontend', 'level' => 90, 'display_order' => 4],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'level' => 88, 'display_order' => 5],
            ['name' => 'Next.js', 'category' => 'Frontend', 'level' => 82, 'display_order' => 6],
            ['name' => 'TailwindCSS', 'category' => 'Frontend', 'level' => 95, 'display_order' => 7],
            ['name' => 'Alpine.js', 'category' => 'Frontend', 'level' => 87, 'display_order' => 8],
            ['name' => 'SASS/SCSS', 'category' => 'Frontend', 'level' => 90, 'display_order' => 9],
            ['name' => 'Webpack & Vite', 'category' => 'Frontend', 'level' => 78, 'display_order' => 10],
            ['name' => 'Responsive Design', 'category' => 'Frontend', 'level' => 93, 'display_order' => 11],
            ['name' => 'Web Accessibility (A11y)', 'category' => 'Frontend', 'level' => 80, 'display_order' => 12],

            // Backend (11 skills)
            ['name' => 'PHP', 'category' => 'Backend', 'level' => 95, 'display_order' => 1],
            ['name' => 'Laravel', 'category' => 'Backend', 'level' => 98, 'display_order' => 2],
            ['name' => 'Node.js', 'category' => 'Backend', 'level' => 85, 'display_order' => 3],
            ['name' => 'Express.js', 'category' => 'Backend', 'level' => 82, 'display_order' => 4],
            ['name' => 'RESTful API Design', 'category' => 'Backend', 'level' => 92, 'display_order' => 5],
            ['name' => 'GraphQL', 'category' => 'Backend', 'level' => 75, 'display_order' => 6],
            ['name' => 'MySQL', 'category' => 'Backend', 'level' => 90, 'display_order' => 7],
            ['name' => 'PostgreSQL', 'category' => 'Backend', 'level' => 85, 'display_order' => 8],
            ['name' => 'MongoDB', 'category' => 'Backend', 'level' => 78, 'display_order' => 9],
            ['name' => 'Redis', 'category' => 'Backend', 'level' => 80, 'display_order' => 10],
            ['name' => 'WebSockets & Real-time', 'category' => 'Backend', 'level' => 77, 'display_order' => 11],

            // DevOps & Tools (8 skills)
            ['name' => 'Git & GitHub', 'category' => 'DevOps & Tools', 'level' => 93, 'display_order' => 1],
            ['name' => 'Docker', 'category' => 'DevOps & Tools', 'level' => 82, 'display_order' => 2],
            ['name' => 'CI/CD Pipelines', 'category' => 'DevOps & Tools', 'level' => 75, 'display_order' => 3],
            ['name' => 'AWS Services', 'category' => 'DevOps & Tools', 'level' => 70, 'display_order' => 4],
            ['name' => 'Linux/Unix', 'category' => 'DevOps & Tools', 'level' => 85, 'display_order' => 5],
            ['name' => 'Nginx & Apache', 'category' => 'DevOps & Tools', 'level' => 80, 'display_order' => 6],
            ['name' => 'Postman & API Testing', 'category' => 'DevOps & Tools', 'level' => 88, 'display_order' => 7],
            ['name' => 'VS Code & PHPStorm', 'category' => 'DevOps & Tools', 'level' => 95, 'display_order' => 8],

            // Design & UI/UX (4 skills)
            ['name' => 'Figma', 'category' => 'Design & UI/UX', 'level' => 87, 'display_order' => 1],
            ['name' => 'Adobe XD', 'category' => 'Design & UI/UX', 'level' => 75, 'display_order' => 2],
            ['name' => 'UI/UX Principles', 'category' => 'Design & UI/UX', 'level' => 85, 'display_order' => 3],
            ['name' => 'Prototyping & Wireframing', 'category' => 'Design & UI/UX', 'level' => 82, 'display_order' => 4],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
