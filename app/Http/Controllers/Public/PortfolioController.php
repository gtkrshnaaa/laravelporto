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
        // Sample projects data for initial development
        $featured_projects = [
            [
                'id' => 1,
                'title' => 'E-Commerce Platform',
                'slug' => 'ecommerce-platform',
                'description' => 'Full-stack e-commerce solution with payment integration',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'Vue.js', 'TailwindCSS', 'Stripe'],
                'is_featured' => true,
            ],
            [
                'id' => 2,
                'title' => 'Portfolio CMS',
                'slug' => 'portfolio-cms',
                'description' => 'Content management system for creative professionals',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'Blade', 'Alpine.js'],
                'is_featured' => true,
            ],
            [
                'id' => 3,
                'title' => 'Task Manager App',
                'slug' => 'task-manager',
                'description' => 'Collaborative task management with real-time updates',
                'featured_image' => null,
                'tech_stack' => ['Laravel', 'Livewire', 'SQLite'],
                'is_featured' => true,
            ],
        ];

        // Sample services data
        $services = [
            [
                'id' => 1,
                'title' => 'Web Development',
                'description' => 'Custom web applications built with modern technologies',
                'icon_class' => 'code',
                'price_start' => 500,
            ],
            [
                'id' => 2,
                'title' => 'UI/UX Design',
                'description' => 'Beautiful, user-centered interface designs',
                'icon_class' => 'palette',
                'price_start' => 300,
            ],
            [
                'id' => 3,
                'title' => 'Consulting',
                'description' => 'Technical consultation and architecture planning',
                'icon_class' => 'message-circle',
                'price_start' => 150,
            ],
        ];

        return view('public.portfolio.home', [
            'featured_projects' => $featured_projects,
            'services' => $services,
            'portfolio_name' => 'Your Name',
            'portfolio_profession' => 'Full-Stack Developer',
            'portfolio_tagline' => 'Building beautiful digital experiences',
        ]);
    }
}
