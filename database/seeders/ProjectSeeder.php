<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'A full-featured e-commerce platform with payment integration, inventory management, and admin dashboard.',
                'category' => 'Web Application',
                'tech_stack' => ['Laravel', 'Vue.js', 'TailwindCSS', 'Stripe', 'PostgreSQL'],
                'repository_url' => 'https://github.com/example/ecommerce',
                'live_url' => 'https://demo-ecommerce.com',
                'view_count' => 245,
                'is_featured' => true,
                'size' => 'large',
            ],
            [
                'title' => 'Task Management App',
                'slug' => 'task-management-app',
                'description' => 'Collaborative task management tool with real-time updates and team collaboration features.',
                'category' => 'Web Application',
                'tech_stack' => ['React', 'Node.js', 'MongoDB', 'Socket.io', 'TailwindCSS'],
                'repository_url' => 'https://github.com/example/taskapp',
                'live_url' => 'https://demo-tasks.com',
                'view_count' => 189,
                'is_featured' => true,
                'size' => 'medium',
            ],
            [
                'title' => 'Portfolio Website',
                'slug' => 'portfolio-website',
                'description' => 'Modern portfolio website with dark mode, animations, and responsive design.',
                'category' => 'Design',
                'tech_stack' => ['HTML', 'CSS', 'JavaScript', 'GSAP'],
                'repository_url' => 'https://github.com/example/portfolio',
                'live_url' => 'https://demo-portfolio.com',
                'view_count' => 156,
                'is_featured' => false,
                'size' => 'medium',
            ],
            [
                'title' => 'Weather Dashboard',
                'slug' => 'weather-dashboard',
                'description' => 'Real-time weather dashboard with forecasts and interactive maps.',
                'category' => 'Web Application',
                'tech_stack' => ['Vue.js', 'OpenWeather API', 'Chart.js', 'Mapbox'],
                'repository_url' => 'https://github.com/example/weather',
                'live_url' => 'https://demo-weather.com',
                'view_count' => 98,
                'is_featured' => false,
                'size' => 'small',
            ],
            [
                'title' => 'Blog Platform',
                'slug' => 'blog-platform',
                'description' => 'Markdown-based blog platform with SEO optimization and analytics.',
                'category' => 'Web Application',
                'tech_stack' => ['Next.js', 'MDX', 'Vercel', 'TailwindCSS'],
                'repository_url' => 'https://github.com/example/blog',
                'live_url' => 'https://demo-blog.com',
                'view_count' => 134,
                'is_featured' => false,
                'size' => 'small',
            ],
            [
                'title' => 'Mobile Fitness App',
                'slug' => 'mobile-fitness-app',
                'description' => 'Cross-platform fitness tracking app with workout plans and progress tracking.',
                'category' => 'Mobile App',
                'tech_stack' => ['React Native', 'Firebase', 'Redux', 'Expo'],
                'repository_url' => 'https://github.com/example/fitness',
                'live_url' => null,
                'view_count' => 76,
                'is_featured' => false,
                'size' => 'small',
            ],
        ];

        foreach ($projects as $index => $project) {
            Project::create(array_merge($project, ['display_order' => $index + 1]));
        }
    }
}
