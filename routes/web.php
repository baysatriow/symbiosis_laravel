<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\YoutubeVideoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $youtubeProject = \App\Models\Project::where('category', 'Youtube')->latest()->first();
    $instagramProject = \App\Models\Project::where('category', 'Instagram')->latest()->first();
    $tiktokProject = \App\Models\Project::where('category', 'Tiktok')->latest()->first();

    return view('welcome', compact('youtubeProject', 'instagramProject', 'tiktokProject'));
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/service', function () {
    return view('pages.service');
})->name('service');

Route::get('/team', function () {
    return view('pages.team');
})->name('team');

Route::get('/projects', function (\Illuminate\Http\Request $request) {
    $query = \App\Models\Project::ordered();

    if ($request->has('search')) {
        $search = $request->get('search');
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%");
        });
    }

    if ($request->has('category')) {
        $category = $request->get('category');
        $query->where('category', $category);
    }

    $projects = $query->paginate(6);
    $recentProjects = \App\Models\Project::latest()->take(5)->get();

    return view('pages.projects', compact('projects', 'recentProjects'));
})->name('projects');

Route::get('/news', function (\Illuminate\Http\Request $request) {
    $query = \App\Models\News::latest();

    if ($request->has('search')) {
        $search = $request->get('search');
        $query->where('title', 'like', "%{$search}%")
            ->orWhere('content', 'like', "%{$search}%");
    }

    $news = $query->paginate(6);
    $recentNews = \App\Models\News::latest()->take(5)->get();

    return view('pages.news', compact('news', 'recentNews'));
})->name('news');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('projects', AdminProjectController::class)->except(['show']);
        Route::resource('news', AdminNewsController::class)->except(['show']);
        Route::resource('youtube-videos', YoutubeVideoController::class)->except(['show']);
        Route::resource('users', UserController::class)->except(['show']);

        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    });

require __DIR__ . '/auth.php';
