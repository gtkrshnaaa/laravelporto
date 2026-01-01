<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Sarah Johnson',
                'client_position' => 'CEO',
                'client_company' => 'TechStart Inc',
                'content' => 'Working with this developer was an absolute pleasure. The project was delivered on time and exceeded our expectations. Highly recommended!',
                'rating' => 5,
                'is_approved' => true,
                'display_order' => 1,
            ],
            [
                'client_name' => 'Michael Chen',
                'client_position' => 'Product Manager',
                'client_company' => 'InnovateCo',
                'content' => 'Exceptional work quality and great communication throughout the project. The final product was exactly what we needed.',
                'rating' => 5,
                'is_approved' => true,
                'display_order' => 2,
            ],
            [
                'client_name' => 'Emily Rodriguez',
                'client_position' => 'Marketing Director',
                'client_company' => 'GrowthLabs',
                'content' => 'Very professional and skilled developer. Delivered a beautiful and functional website that our clients love.',
                'rating' => 5,
                'is_approved' => true,
                'display_order' => 3,
            ],
            [
                'client_name' => 'David Kim',
                'client_position' => 'Founder',
                'client_company' => 'StartupHub',
                'content' => 'Great attention to detail and excellent problem-solving skills. Would definitely work together again.',
                'rating' => 4,
                'is_approved' => true,
                'display_order' => 4,
            ],
            [
                'client_name' => 'Lisa Anderson',
                'client_position' => 'CTO',
                'client_company' => 'DataFlow Systems',
                'content' => 'Impressive technical skills and ability to understand complex requirements. The project was a success!',
                'rating' => 5,
                'is_approved' => true,
                'display_order' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
