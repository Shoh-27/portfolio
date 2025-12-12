<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'short_description' => 'A full-featured e-commerce platform with shopping cart, payment integration, and admin dashboard.',
                'full_description' => "Built a comprehensive e-commerce solution using Laravel and Vue.js. The platform includes user authentication, product catalog, shopping cart, payment gateway integration with Stripe, order management, and a complete admin dashboard for managing products, orders, and customers.\n\nKey Features:\n- User registration and authentication\n- Product catalog with categories and filters\n- Shopping cart and checkout process\n- Stripe payment integration\n- Order tracking and history\n- Admin dashboard with analytics\n- Email notifications\n- Responsive design for mobile and desktop",
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Stripe API', 'Tailwind CSS', 'Redis'],
                'github_link' => 'https://github.com/yourusername/ecommerce-platform',
                'live_link' => null,
                'zip_file_path' => null,
                'cover_image_path' => null,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Task Management System',
                'slug' => 'task-management-system',
                'short_description' => 'A collaborative task management application with real-time updates and team features.',
                'full_description' => "Developed a modern task management system that enables teams to collaborate effectively. The application features real-time updates using WebSockets, drag-and-drop task organization, and comprehensive project management tools.\n\nKey Features:\n- Real-time collaboration with WebSockets\n- Drag-and-drop task boards (Kanban style)\n- Team management and permissions\n- File attachments and comments\n- Due dates and notifications\n- Activity timeline\n- Dashboard with analytics\n- Export functionality",
                'tech_stack' => ['Laravel', 'Livewire', 'Alpine.js', 'MySQL', 'WebSockets', 'Tailwind CSS'],
                'github_link' => null,
                'live_link' => 'https://demo-task-manager.example.com',
                'zip_file_path' => null,
                'cover_image_path' => null,
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Blog Platform',
                'slug' => 'blog-platform',
                'short_description' => 'A modern blogging platform with markdown support, SEO optimization, and social features.',
                'full_description' => "Created a feature-rich blogging platform that supports markdown editing, SEO optimization, and social interactions. Perfect for content creators and publishers.\n\nKey Features:\n- Markdown editor with live preview\n- SEO-friendly URLs and meta tags\n- Categories and tags\n- Comments and reactions\n- Social media sharing\n- RSS feed generation\n- Admin dashboard\n- Analytics integration",
                'tech_stack' => ['Laravel', 'Vue.js', 'PostgreSQL', 'Elasticsearch', 'Tailwind CSS'],
                'github_link' => 'https://github.com/yourusername/blog-platform',
                'live_link' => null,
                'zip_file_path' => null,
                'cover_image_path' => null,
                'is_featured' => false,
                'order' => 3,
            ],
            [
                'title' => 'Inventory Management',
                'slug' => 'inventory-management',
                'short_description' => 'Enterprise-level inventory management system with barcode scanning and reporting.',
                'full_description' => "Developed an enterprise inventory management system that streamlines stock tracking, order management, and reporting. The system includes barcode scanning capabilities and comprehensive analytics.\n\nKey Features:\n- Product and stock management\n- Barcode scanning integration\n- Purchase order management\n- Supplier management\n- Low stock alerts\n- Comprehensive reporting\n- Multi-warehouse support\n- Export to Excel/PDF",
                'tech_stack' => ['Laravel', 'React', 'MySQL', 'Chart.js', 'Bootstrap'],
                'github_link' => null,
                'live_link' => null,
                'zip_file_path' => null,
                'cover_image_path' => null,
                'is_featured' => false,
                'order' => 4,
            ],
            [
                'title' => 'Real Estate Portal',
                'slug' => 'real-estate-portal',
                'short_description' => 'Property listing platform with advanced search, map integration, and agent management.',
                'full_description' => "Built a comprehensive real estate portal that connects property seekers with agents. Features advanced search filters, interactive maps, and virtual tours.\n\nKey Features:\n- Property listings with photos and details\n- Advanced search and filters\n- Google Maps integration\n- Favorite properties\n- Agent profiles and contact\n- Mortgage calculator\n- Comparison tool\n- Mobile-responsive design",
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Google Maps API', 'Tailwind CSS'],
                'github_link' => 'https://github.com/yourusername/real-estate-portal',
                'live_link' => 'https://demo-realestate.example.com',
                'zip_file_path' => null,
                'cover_image_path' => null,
                'is_featured' => true,
                'order' => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
