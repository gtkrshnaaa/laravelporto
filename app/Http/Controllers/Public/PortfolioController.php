<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Testimonial;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio homepage.
     */
    public function show(): View
    {
        // Fetch featured projects from database
        $featured_projects = Project::where('is_featured', true)
            ->orderBy('display_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Fetch skills grouped by category
        $skillsRaw = Skill::orderBy('category', 'asc')
            ->orderBy('display_order', 'asc')
            ->get();
        
        $skills = $skillsRaw->groupBy('category')->map(function ($categorySkills) {
            return $categorySkills->map(function ($skill) {
                return [
                    'name' => $skill->name,
                    'level' => $skill->level,
                ];
            })->toArray();
        })->toArray();

        // Fetch active services
        $services = Service::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->get();

        // Fetch approved testimonials
        $testimonials = Testimonial::where('is_approved', true)
            ->orderBy('display_order', 'asc')
            ->limit(6)
            ->get();

        // Statistics data (can be moved to settings later)
        $statistics = [
            ['label' => 'Years Experience', 'value' => 5, 'icon' => 'clock'],
            ['label' => 'Projects Completed', 'value' => Project::count(), 'icon' => 'check-circle'],
            ['label' => 'Happy Clients', 'value' => Testimonial::where('is_approved', true)->count(), 'icon' => 'users'],
            ['label' => 'Awards Won', 'value' => 12, 'icon' => 'trophy'],
        ];

        return view('public.portfolio.home', [
            'featured_projects' => $featured_projects,
            'services' => $services,
            'skills' => $skills,
            'testimonials' => $testimonials,
            'statistics' => $statistics,
            'portfolio_name' => 'PORTFOLIOVERSE',
            'portfolio_profession' => 'Full-Stack Developer & UI/UX Designer',
            'portfolio_tagline' => 'Crafting Digital Experiences with Code & Creativity',
        ]);
    }
}
