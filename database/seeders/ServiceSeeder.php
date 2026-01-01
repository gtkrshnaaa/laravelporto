<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Full-Stack Web Development',
                'description' => 'Complete web application development from concept to deployment. I build scalable, modern web applications using cutting-edge technologies and best practices.',
                'icon_class' => 'code',
                'price_start' => 3000,
                'is_popular' => true,
                'is_active' => true,
                'display_order' => 1,
                'features' => [
                    'Custom web application development',
                    'Responsive & mobile-first design',
                    'Database design and optimization',
                    'RESTful API development',
                    'Third-party API integration',
                    'Payment gateway integration',
                    'Admin dashboard & CMS',
                    'Deployment & hosting setup',
                    '3 months post-launch support',
                ],
            ],
            [
                'title' => 'UI/UX Design & Prototyping',
                'description' => 'User-centered design solutions that combine aesthetics with functionality. From wireframes to high-fidelity prototypes.',
                'icon_class' => 'palette',
                'price_start' => 1500,
                'is_popular' => true,
                'is_active' => true,
                'display_order' => 2,
                'features' => [
                    'User research & personas',
                    'Information architecture',
                    'Wireframing & user flows',
                    'High-fidelity mockups',
                    'Interactive prototypes',
                    'Design system creation',
                    'Usability testing',
                    'Responsive design for all devices',
                ],
            ],
            [
                'title' => 'E-Commerce Solutions',
                'description' => 'Build your online store with secure payment processing, inventory management, and customer analytics.',
                'icon_class' => 'shopping-cart',
                'price_start' => 4500,
                'is_popular' => false,
                'is_active' => true,
                'display_order' => 3,
                'features' => [
                    'Product catalog management',
                    'Shopping cart & checkout',
                    'Payment gateway integration',
                    'Inventory tracking',
                    'Order management system',
                    'Customer accounts & profiles',
                    'Email notifications',
                    'Analytics & reporting',
                    'SEO optimization',
                ],
            ],
            [
                'title' => 'API Development & Integration',
                'description' => 'Design and develop robust RESTful APIs or integrate third-party services into your application.',
                'icon_class' => 'server',
                'price_start' => 2000,
                'is_popular' => false,
                'is_active' => true,
                'display_order' => 4,
                'features' => [
                    'RESTful API design',
                    'API documentation',
                    'Authentication & authorization',
                    'Rate limiting & security',
                    'Third-party API integration',
                    'Webhook implementation',
                    'API testing & monitoring',
                    'Versioning strategy',
                ],
            ],
            [
                'title' => 'Technical Consulting',
                'description' => 'Expert technical guidance for your project. Architecture planning, code review, and technology stack selection.',
                'icon_class' => 'chat',
                'price_start' => 150,
                'is_popular' => false,
                'is_active' => true,
                'display_order' => 5,
                'features' => [
                    'Technology stack selection',
                    'Architecture planning',
                    'Code review & audit',
                    'Performance optimization',
                    'Security assessment',
                    'Best practices guidance',
                    'Team training & mentoring',
                    'Project roadmap planning',
                ],
            ],
            [
                'title' => 'Website Maintenance & Support',
                'description' => 'Keep your website running smoothly with regular updates, security patches, and technical support.',
                'icon_class' => 'wrench',
                'price_start' => 500,
                'is_popular' => false,
                'is_active' => true,
                'display_order' => 6,
                'features' => [
                    'Regular security updates',
                    'Bug fixes & troubleshooting',
                    'Performance monitoring',
                    'Backup management',
                    'Content updates',
                    'Technical support',
                    'Monthly reports',
                    'Priority response time',
                ],
            ],
            [
                'title' => 'Database Design & Optimization',
                'description' => 'Efficient database architecture and query optimization for better performance and scalability.',
                'icon_class' => 'database',
                'price_start' => 1200,
                'is_popular' => false,
                'is_active' => true,
                'display_order' => 7,
                'features' => [
                    'Database schema design',
                    'Query optimization',
                    'Indexing strategy',
                    'Migration planning',
                    'Data modeling',
                    'Performance tuning',
                    'Backup & recovery setup',
                    'Scalability planning',
                ],
            ],
            [
                'title' => 'MVP Development (Startups)',
                'description' => 'Rapid MVP development for startups. Get your product to market quickly with essential features.',
                'icon_class' => 'rocket',
                'price_start' => 2500,
                'is_popular' => true,
                'is_active' => true,
                'display_order' => 8,
                'features' => [
                    'Core feature development',
                    'Rapid prototyping',
                    'User authentication',
                    'Basic admin panel',
                    'Responsive design',
                    'Cloud deployment',
                    'Analytics integration',
                    'Iterative development',
                    'Post-launch support',
                ],
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
