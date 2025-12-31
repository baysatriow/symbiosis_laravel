<?php

namespace Database\Seeders;

use App\Models\YoutubeVideo;
use Illuminate\Database\Seeder;

class YoutubeVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            ['video_id' => '2wBslDcFMPM', 'title' => 'Symbiosis Video 1', 'sort_order' => 1],
            ['video_id' => '7sqZ7RTEGDw', 'title' => 'Symbiosis Video 2', 'sort_order' => 2],
            ['video_id' => 'oEeLr8QoD4Y', 'title' => 'Symbiosis Video 3', 'sort_order' => 3],
            ['video_id' => 'ySIbGohfMRs', 'title' => 'Symbiosis Video 4', 'sort_order' => 4],
            ['video_id' => 'DRcUBHp1vLI', 'title' => 'Symbiosis Video 5', 'sort_order' => 5],
            ['video_id' => '_G2CZzD5tIM', 'title' => 'Symbiosis Video 6', 'sort_order' => 6],
            ['video_id' => 'aBJYDbgp-QM', 'title' => 'Symbiosis Video 7', 'sort_order' => 7],
            ['video_id' => 'NF8mFbINLFU', 'title' => 'Symbiosis Video 8', 'sort_order' => 8],
        ];

        foreach ($videos as $video) {
            YoutubeVideo::updateOrCreate(
                ['video_id' => $video['video_id']],
                array_merge($video, ['is_active' => true])
            );
        }
    }
}
