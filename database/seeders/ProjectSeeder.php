<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // YouTube Project
        Project::create([
            'title' => 'Symbiosis Official Channel',
            'subtitle' => 'Our Latest Videos',
            'category' => 'Youtube',
            'description' => 'Check out our latest educational videos on sustainability.',
            'image' => 'portfolio/youtube.jpg', // Placeholder, assuming storage link
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        // Instagram Project
        Project::create([
            'title' => '@symbiosis_id',
            'subtitle' => 'Follow Us',
            'category' => 'Instagram',
            'description' => 'Daily updates and stories from our community.',
            'image' => 'portfolio/instagram.jpg',
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        // TikTok Project
        Project::create([
            'title' => 'Symbiosis TikTok',
            'subtitle' => 'Viral Trends',
            'category' => 'Tiktok',
            'description' => 'Short form content about green energy.',
            'image' => 'portfolio/tiktok.jpg',
            'is_featured' => true,
            'sort_order' => 3,
        ]);
    }
}
