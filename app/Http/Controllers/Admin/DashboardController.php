<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
        ];

        // Top viewed projects
        $topProjects = Project::orderBy('view_count', 'desc')
            ->take(5)
            ->get();

        // Traffic data for last 7 days (dummy for now, will implement real analytics later)
        $trafficData = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('M d');
            $trafficData->push([
                'date' => $date,
                'count' => rand(10, 50) // Dummy data
            ]);
        }

        return view('admin.dashboard.index', compact('stats', 'topProjects', 'trafficData'));
    }

}
