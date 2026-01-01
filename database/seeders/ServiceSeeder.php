<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Full-stack web application development using modern technologies and best practices.',
                'icon_class' => 'code',
                'price_start' => 2000,
                'is_popular' => true,
                'features' => [
                    'Custom web application development',
                    'Responsive design',
                    'Database design and optimization',
                    'API development',
                    'Deployment and maintenance',
                ],
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'User-centered design solutions that combine aesthetics with functionality.',
                'icon_class' => 'palette',
                'price_start' => 1500,
                'is_popular' => false,
                'features' => [
                    'User research and personas',
                    'Wireframing and prototyping',
                    'Visual design',
                    'Usability testing',
                    'Design system creation',
                ],
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Consulting',
                'description' => 'Technical consulting and architecture planning for your next project.',
                'icon_class' => 'chat',
                'price_start' => 500,
                'is_popular' => false,
                'features' => [
                    'Technology stack selection',
                    'Architecture planning',
                    'Code review',
                    'Performance optimization',
                    'Best practices guidance',
                ],
                'is_active' => true,
                'display_order' => 3,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
