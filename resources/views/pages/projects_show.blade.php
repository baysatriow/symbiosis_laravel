@extends('layouts.public')

@section('title', $project->title . ' - Symbiosis Indonesia')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-wrapper" style="background-image: url('{{ asset('assets/img/normal/breadcrumb-thumb.jpg') }}'); 
                    background-size: cover; 
                    background-position: center; 
                    padding: 120px 0 80px;
                    position: relative;">
        <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(25,97,100,0.9) 0%, rgba(25,97,100,0.7) 100%);"></div>
        <div class="container" style="position: relative; z-index: 1;">
            <div class="breadcrumb-content text-center text-white">
                <h1 class="breadcrumb-title" style="font-size: 40px; font-weight: 700; margin-bottom: 15px;">{{ $project->title }}</h1>
                <ul class="breadcrumb-menu d-flex justify-content-center gap-2" style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a></li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li><a href="{{ route('projects') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Project</a></li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li style="color: #fbbf24;">Detail</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Project Details -->
    <section class="project-details space" style="padding: 100px 0;">
        <div class="container">
            <div class="row gx-60">
                <div class="col-lg-8">
                    <div class="project-image-wrap mb-5" style="border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-100" style="max-height: 500px; object-fit: cover;">
                    </div>
                    
                    @if($project->video_url)
                        <div class="project-embed mb-5" style="border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.08); background: #f8f9fa; padding: 25px;">
                            <h3 class="mb-4" style="font-size: 20px; font-weight: 800; color: #1a1a1a; display: flex; align-items: center; gap: 10px;">
                                @if(str_contains($project->video_url, 'youtube') || str_contains($project->video_url, 'youtu.be'))
                                    <i class="fab fa-youtube" style="color: #ff0000;"></i> Video YouTube
                                @elseif(str_contains($project->video_url, 'tiktok'))
                                    <i class="fab fa-tiktok"></i> Video TikTok
                                @elseif(str_contains($project->video_url, 'instagram'))
                                    <i class="fab fa-instagram" style="color: #e1306c;"></i> Instagram Post
                                @else
                                    <i class="fas fa-video" style="color: #196164;"></i> Video Content
                                @endif
                            </h3>
                            
                            @php
                                $embedUrl = $project->video_url;
                                
                                // Convert YouTube URL to embed format
                                if (str_contains($embedUrl, 'youtube.com/watch')) {
                                    preg_match('/v=([^&]+)/', $embedUrl, $matches);
                                    $videoId = $matches[1] ?? '';
                                    $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                                } elseif (str_contains($embedUrl, 'youtu.be/')) {
                                    $videoId = str_replace('https://youtu.be/', '', $embedUrl);
                                    $videoId = explode('?', $videoId)[0];
                                    $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                                }
                            @endphp
                            
                            @if(str_contains($project->video_url, 'youtube') || str_contains($project->video_url, 'youtu.be'))
                                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 16px;">
                                    <iframe src="{{ $embedUrl }}" 
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen></iframe>
                                </div>
                            @else
                                <a href="{{ $project->video_url }}" target="_blank" 
                                   style="display: flex; align-items: center; justify-content: center; gap: 12px; padding: 20px 30px; background: #196164; color: #fff; border-radius: 16px; text-decoration: none; font-weight: 700; transition: all 0.3s;">
                                    <i class="fas fa-external-link-alt"></i>
                                    Lihat di {{ str_contains($project->video_url, 'tiktok') ? 'TikTok' : (str_contains($project->video_url, 'instagram') ? 'Instagram' : 'Platform Asli') }}
                                </a>
                            @endif
                        </div>
                    @endif
                    
                    <div class="project-content">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <span style="background: rgba(25,97,100,0.1); color: #196164; padding: 8px 18px; border-radius: 50px; font-weight: 700; font-size: 14px;">
                                {{ $project->category ?? 'General Project' }}
                            </span>
                            @if($project->subtitle)
                                <span style="font-size: 14px; color: #666; font-weight: 500;">
                                    <i class="far fa-folder-open me-1"></i> {{ $project->subtitle }}
                                </span>
                            @endif
                        </div>
                        
                        <h2 class="mb-4" style="font-size: 32px; font-weight: 800; color: #1a1a1a;">Informasi Project</h2>
                        <div class="project-description" style="font-size: 17px; line-height: 1.8; color: #444;">
                            {!! nl2br(e($project->description)) !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <!-- Project Info Widget -->
                        <div class="widget" style="background: #f8f9fa; padding: 35px; border-radius: 20px; border: 1px solid #eee; margin-bottom: 40px;">
                            <h3 style="font-size: 20px; font-weight: 700; color: #196164; margin-bottom: 25px;">Detail Project</h3>
                            <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 20px;">
                                <li style="display: flex; justify-content: space-between; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
                                    <span style="font-weight: 600; color: #1a1a1a;">Kategori:</span>
                                    <span style="color: #666;">{{ $project->category }}</span>
                                </li>
                                <li style="display: flex; justify-content: space-between; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
                                    <span style="font-weight: 600; color: #1a1a1a;">Publish:</span>
                                    <span style="color: #666;">{{ $project->created_at->format('d M, Y') }}</span>
                                </li>
                                <li style="display: flex; justify-content: space-between;">
                                    <span style="font-weight: 600; color: #1a1a1a;">Status:</span>
                                    <span style="color: #10b981; font-weight: 700;">Completed</span>
                                </li>
                            </ul>
                            
                            <a href="https://wa.me/6285123293135" target="_blank" class="btn w-100 mt-4" style="background: #196164; color: #fff; padding: 15px; border-radius: 12px; font-weight: 700; border: none; display: flex; align-items: center; justify-content: center; gap: 10px;">
                                <i class="fab fa-whatsapp"></i> Tanya Tentang Ini
                            </a>
                        </div>

                        <!-- Recent Projects -->
                        <div class="widget" style="background: #fff; padding: 35px; border-radius: 20px; border: 1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                            <h3 style="font-size: 20px; font-weight: 700; color: #196164; margin-bottom: 25px;">Project Lainnya</h3>
                            <div class="display-grid gap-4">
                                @foreach($recentProjects as $recent)
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div style="width: 80px; height: 80px; flex-shrink: 0; border-radius: 12px; overflow: hidden;">
                                            <img src="{{ Storage::url($recent->image) }}" alt="{{ $recent->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <div>
                                            <h4 style="font-size: 15px; font-weight: 700; margin-bottom: 5px; line-height: 1.4;">
                                                <a href="{{ route('projects.show', $recent->id) }}" style="color: #1a1a1a; text-decoration: none;">{{ $recent->title }}</a>
                                            </h4>
                                            <span style="font-size: 12px; color: #196164; font-weight: 600;">{{ $recent->category }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
