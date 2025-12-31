<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;

class YoutubeVideoController extends Controller
{
    public function index()
    {
        $videos = YoutubeVideo::ordered()->paginate(10);
        return view('admin.youtube-videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.youtube-videos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'video_id' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        YoutubeVideo::create($validated);

        return redirect()->route('admin.youtube-videos.index')
            ->with('success', 'Video YouTube berhasil ditambahkan!');
    }

    public function edit(YoutubeVideo $youtubeVideo)
    {
        return view('admin.youtube-videos.edit', compact('youtubeVideo'));
    }

    public function update(Request $request, YoutubeVideo $youtubeVideo)
    {
        $validated = $request->validate([
            'video_id' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $youtubeVideo->update($validated);

        return redirect()->route('admin.youtube-videos.index')
            ->with('success', 'Video YouTube berhasil diupdate!');
    }

    public function destroy(YoutubeVideo $youtubeVideo)
    {
        $youtubeVideo->delete();

        return redirect()->route('admin.youtube-videos.index')
            ->with('success', 'Video YouTube berhasil dihapus!');
    }
}
