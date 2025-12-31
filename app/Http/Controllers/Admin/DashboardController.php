<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\News;
use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'news' => News::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::unread()->count(),
            'users' => User::count(),
        ];

        $recentMessages = Message::latest()->take(5)->get();
        $recentNews = News::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentNews'));
    }
}
