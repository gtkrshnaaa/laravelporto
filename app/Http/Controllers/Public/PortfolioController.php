<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio homepage.
     */
    public function show(): View
    {
        // Expanded projects data - 6 projects with varied metadata
        $featured_projects = [
            [
                'id' => 1,
                'title' => 'E-Commerce Platform',
                'slug' => 'ecommerce-platform',
                'description' => 'Full-stack e-commerce solution with payment integration and inventory management',
                'category' => 'Web App',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'Vue.js', 'TailwindCSS', 'Stripe'],
                'repository_url' => 'https://github.com/example/ecommerce',
                'live_url' => null,
                'view_count' => 1247,
                'is_featured' => true,
                'size' => 'large', // For bento layout
            ],
            [
                'id' => 2,
                'title' => 'Portfolio CMS',
                'slug' => 'portfolio-cms',
                'description' => 'Content management system for creative professionals with drag-and-drop builder',
                'category' => 'SaaS',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'Blade', 'Alpine.js', 'SQLite'],
                'repository_url' => 'https://github.com/example/portfolio-cms',
                'live_url' => null,
                'view_count' => 892,
                'is_featured' => true,
                'size' => 'medium',
            ],
            [
                'id' => 3,
                'title' => 'Task Manager Pro',
                'slug' => 'task-manager',
                'description' => 'Collaborative task management with real-time updates and team analytics',
                'category' => 'Productivity',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'Livewire', 'SQLite', 'Pusher'],
                'repository_url' => null,
                'live_url' => 'https://taskmanager-demo.com',
                'view_count' => 1456,
                'is_featured' => true,
                'size' => 'medium',
            ],
            [
                'id' => 4,
                'title' => 'Social Media Dashboard',
                'slug' => 'social-dashboard',
                'description' => 'Analytics dashboard for managing multiple social media accounts',
                'category' => 'Analytics',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'React', 'Chart.js', 'Redis'],
                'repository_url' => 'https://github.com/example/social-dashboard',
                'live_url' => null,
                'view_count' => 634,
                'is_featured' => true,
                'size' => 'small',
            ],
            [
                'id' => 5,
                'title' => 'Fitness Tracking App',
                'slug' => 'fitness-app',
                'description' => 'Mobile-first fitness tracking with workout plans and progress monitoring',
                'category' => 'Mobile',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'Vue.js', 'PWA', 'Chart.js'],
                'repository_url' => 'https://github.com/example/fitness-app',
                'live_url' => 'https://fitness-demo.com',
                'view_count' => 2103,
                'is_featured' => true,
                'size' => 'small',
            ],
            [
                'id' => 6,
                'title' => 'Restaurant Booking System',
                'slug' => 'restaurant-booking',
                'description' => 'Complete reservation system with table management and customer reviews',
                'category' => 'Booking',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'Blade', 'MySQL', 'Twillio'],
                'repository_url' => null,
                'live_url' => null,
                'view_count' => 478,
                'is_featured' => true,
                'size' => 'small',
            ],
        ];

        // Enhanced services data with features
        $services = [
            [
                'id' => 1,
                'title' => 'Web Development',
                'description' => 'Custom web applications built with modern technologies',
                'icon_class' => 'code',
                'price_start' => 500,
                'is_popular' => true,
                'features' => [
                    'Responsive Design',
                    'Performance Optimization',
                    'SEO Ready',
                    'Maintenance Support'
                ],
            ],
            [
                'id' => 2,
                'title' => 'UI/UX Design',
                'description' => 'Beautiful, user-centered interface designs',
                'icon_class' => 'palette',
                'price_start' => 300,
                'is_popular' => false,
                'features' => [
                    'Wireframing',
                    'Prototyping',
                    'User Research',
                    'Design Systems'
                ],
            ],
            [
                'id' => 3,
                'title' => 'Consulting',
                'description' => 'Technical consultation and architecture planning',
                'icon_class' => 'message-circle',
                'price_start' => 150,
                'is_popular' => false,
                'features' => [
                    'Code Review',
                    'Architecture Planning',
                    'Performance Audit',
                    'Team Training'
                ],
            ],
        ];

        // Skills data with categories and progress
        $skills = [
            'Frontend' => [
                ['name' => 'HTML/CSS', 'level' => 95],
                ['name' => 'JavaScript/TypeScript', 'level' => 90],
                ['name' => 'Vue.js / React', 'level' => 85],
                ['name' => 'TailwindCSS', 'level' => 92],
            ],
            'Backend' => [
                ['name' => 'PHP / Laravel', 'level' => 95],
                ['name' => 'Node.js / Express', 'level' => 80],
                ['name' => 'MySQL / PostgreSQL', 'level' => 88],
                ['name' => 'REST API Design', 'level' => 90],
            ],
            'Tools & Other' => [
                ['name' => 'Git / GitHub', 'level' => 93],
                ['name' => 'Docker', 'level' => 75],
                ['name' => 'CI/CD', 'level' => 70],
                ['name' => 'Agile / Scrum', 'level' => 85],
            ],
        ];

        // Testimonials data
        $testimonials = [
            [
                'id' => 1,
                'client_name' => 'Sarah Johnson',
                'client_position' => 'CEO',
                'client_company' => 'TechStart Inc.',
                'client_avatar' => null,
                'content' => 'Absolutely outstanding work! The attention to detail and commitment to delivering a high-quality product exceeded all our expectations. Highly recommended!',
                'rating' => 5,
            ],
            [
                'id' => 2,
                'client_name' => 'Michael Chen',
                'client_position' => 'Product Manager',
                'client_company' => 'Digital Solutions',
                'client_avatar' => null,
                'content' => 'Professional, efficient, and creative. The project was delivered on time and the communication throughout was excellent.',
                'rating' => 5,
            ],
            [
                'id' => 3,
                'client_name' => 'Emma Rodriguez',
                'client_position' => 'Founder',
                'client_company' => 'Creative Studio',
                'client_avatar' => null,
                'content' => 'Working together was a fantastic experience. The final product not only met but surpassed our vision. Will definitely collaborate again!',
                'rating' => 5,
            ],
            [
                'id' => 4,
                'client_name' => 'James Wilson',
                'client_position' => 'CTO',
                'client_company' => 'InnovateTech',
                'client_avatar' => null,
                'content' => 'Exceptional technical skills combined with great communication. The solutions provided were innovative and perfectly suited to our needs.',
                'rating' => 5,
            ],
            [
                'id' => 5,
                'client_name' => 'Lisa Martinez',
                'client_position' => 'Marketing Director',
                'client_company' => 'Brand Boost',
                'client_avatar' => null,
                'content' => 'A true professional who understands both the technical and business aspects. The website has significantly improved our online presence.',
                'rating' => 5,
            ],
        ];

        // Statistics data
        $statistics = [
            ['label' => 'Years Experience', 'value' => 5, 'icon' => 'clock'],
            ['label' => 'Projects Completed', 'value' => 127, 'icon' => 'check-circle'],
            ['label' => 'Happy Clients', 'value' => 89, 'icon' => 'users'],
            ['label' => 'Awards Won', 'value' => 12, 'icon' => 'trophy'],
        ];

        return view('public.portfolio.home', [
            'featured_projects' => $featured_projects,
            'services' => $services,
            'skills' => $skills,
            'testimonials' => $testimonials,
            'statistics' => $statistics,
            'portfolio_name' => 'Your Name',
            'portfolio_profession' => 'Full-Stack Developer',
            'portfolio_tagline' => 'Building beautiful digital experiences that make a difference',
        ]);
    }
}
