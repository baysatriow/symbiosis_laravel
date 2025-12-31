<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YoutubeVideo extends Model
{
    protected $fillable = [
        'video_id',
        'title',
        'thumbnail_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function getThumbnailAttribute()
    {
        if ($this->thumbnail_url) {
            return $this->thumbnail_url;
        }
        return "https://img.youtube.com/vi/{$this->video_id}/hqdefault.jpg";
    }

    public function getYoutubeUrlAttribute()
    {
        return "https://www.youtube.com/watch?v={$this->video_id}";
    }
}
