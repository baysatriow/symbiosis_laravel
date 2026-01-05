@extends('layouts.public')

@section('title', 'Projects - Symbiosis Indonesia')

@section('content')
    <!-- Breadcrumb with Background Image -->
    <div class="breadcrumb-wrapper" style="background-image: url('{{ asset('assets/img/normal/breadcrumb-thumb.jpg') }}'); 
                    background-size: cover; 
                    background-position: center; 
                    padding: 120px 0 80px;
                    position: relative;">
        <div
            style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(25,97,100,0.9) 0%, rgba(25,97,100,0.7) 100%);">
        </div>
        <div class="container" style="position: relative; z-index: 1;">
            <div class="breadcrumb-content text-center text-white">
                <h1 class="breadcrumb-title" style="font-size: 48px; font-weight: 700; margin-bottom: 15px;">Project</h1>
                <ul class="breadcrumb-menu d-flex justify-content-center gap-2"
                    style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a>
                    </li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li style="color: #fbbf24;">Project</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Project Area -->
    <section class="project-area space-top space-extra-bottom" style="padding: 80px 0; background-color: #f8f9fa;">
        <div class="container">
            <div class="row gx-40">
                <!-- Left Column: Project Grid -->
                <div class="col-lg-8">
                    <!-- Search Result Info (Optional) -->
                    @if(request('search') || request('category'))
                        <div class="d-flex justify-content-between align-items-center mb-4"
                            style="background: white; border-left: 4px solid #196164; border-radius: 8px; padding: 15px 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                            <div style="font-size: 15px; color: #444;">
                                @if(request('search'))
                                    Hasil pencarian: "<strong>{{ request('search') }}</strong>"
                                @endif
                                @if(request('search') && request('category'))
                                    dan 
                                @endif
                                @if(request('category'))
                                    Kategori: <span class="badge bg-emerald-100 text-emerald-700 px-3 py-2 rounded-pill">{{ request('category') }}</span>
                                @endif
                            </div>
                            <a href="{{ route('projects') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Reset</a>
                        </div>
                    @endif

                    <div class="row g-4 mb-5">
                        @forelse($projects as $project)
                            <div class="col-md-6">
                                <div class="project-card style2"
                                    style="background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); height: 100%; border: 1px solid #f0f0f0;">
                                    <div class="project-img overflow-hidden" style="position: relative;">
                                        <a href="{{ route('projects.show', $project->id) }}">
                                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-100"
                                                style="height: 250px; object-fit: cover; transition: transform 0.6s;">
                                        </a>
                                        <!-- Category Badge -->
                                        <div style="position: absolute; top: 15px; left: 15px; z-index: 2;">
                                            <span style="background: rgba(255,255,255,0.95); padding: 6px 16px; border-radius: 50px; font-size: 11px; font-weight: 800; color: #196164; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                                {{ $project->category ?? 'Project' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="project-content" style="padding: 30px;">
                                        <h3 class="project-title h5 mb-3">
                                            <a href="{{ route('projects.show', $project->id) }}"
                                                style="text-decoration: none; color: #1a1a1a; font-weight: 800; line-height: 1.4; transition: color 0.3s;">{{ $project->title }}</a>
                                        </h3>
                                        <p class="project-desc mb-4"
                                            style="color: #666; font-size: 14px; line-height: 1.7; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $project->description }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            @if($project->subtitle)
                                                <div class="project-meta" style="font-size: 12px; color: #888; font-weight: 500;">
                                                    <i class="far fa-folder-open me-1" style="color: #196164;"></i> {{ $project->subtitle }}
                                                </div>
                                            @endif
                                            <a href="{{ route('projects.show', $project->id) }}" style="color: #196164; font-weight: 700; font-size: 13px; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                                                Detail <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div style="background: #fff; padding: 60px; border-radius: 30px; border: 1px dashed #ddd;">
                                    <img src="{{ asset('assets/img/icon/empty.svg') }}" alt="Empty" style="width: 120px; opacity: 0.3; margin-bottom: 20px;">
                                    <h4 class="text-muted" style="font-weight: 700;">Belum ada project yang ditemukan.</h4>
                                    <p class="text-muted">Coba gunakan kata kunci lain atau reset filter.</p>
                                    <a href="{{ route('projects') }}" class="btn mt-3 rounded-pill px-4" style="background: #196164; color: #fff;">Lihat Semua Project</a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-area d-flex justify-content-center mb-5">
                        {{ $projects->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>

                <!-- Right Column: Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <!-- Cari Project -->
                        <div class="widget shadow-sm"
                            style="background: #fff; padding: 35px; border-radius: 24px; margin-bottom: 30px; border: 1px solid #f0f0f0;">
                            <h3 class="widget_title"
                                style="font-size: 20px; font-weight: 800; margin-bottom: 25px; color: #1a1a1a; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-search" style="color: #196164; font-size: 16px;"></i> Cari Project</h3>
                            <form class="search-form" action="{{ route('projects') }}" method="GET">
                                <div class="position-relative">
                                    <input type="text" name="search" placeholder="Masukkan kata kunci..." value="{{ request('search') }}"
                                        style="width: 100%; padding: 16px 20px; border: 1px solid #eee; border-radius: 14px; font-size: 14px; background: #f9f9f9; outline: none; transition: all 0.3s;">
                                    <button type="submit"
                                        style="position: absolute; right: 8px; top: 8px; background: #196164; border: none; color: #fff; width: 42px; height: 42px; border-radius: 10px; transition: all 0.3s;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Kategori -->
                        <div class="widget shadow-sm"
                            style="background: #fff; padding: 35px; border-radius: 24px; margin-bottom: 30px; border: 1px solid #f0f0f0;">
                            <h3 class="widget_title"
                                style="font-size: 20px; font-weight: 800; margin-bottom: 25px; color: #1a1a1a;">Kategori</h3>
                            <div style="display: grid; gap: 12px;">
                                @php
                                    $categories = [
                                        ['name' => 'YouTube', 'icon' => 'fab fa-youtube', 'color' => '#ff0000', 'bg' => '#fff1f0'],
                                        ['name' => 'Instagram', 'icon' => 'fab fa-instagram', 'color' => '#e1306c', 'bg' => '#fff0f6'],
                                        ['name' => 'TikTok', 'icon' => 'fab fa-tiktok', 'color' => '#000', 'bg' => '#f5f5f5'],
                                    ];
                                @endphp

                                @foreach($categories as $cat)
                                    <a href="{{ route('projects', ['category' => $cat['name']]) }}" 
                                       class="category-item {{ request('category') == $cat['name'] ? 'active' : '' }}"
                                       style="padding: 18px 22px; border-radius: 16px; border: 1px solid #eee; display: flex; align-items: center; justify-content: space-between; text-decoration: none; color: #444; transition: all 0.3s; font-weight: 700;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div style="width: 36px; height: 36px; background: {{ $cat['bg'] }}; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                <i class="{{ $cat['icon'] }}" style="color: {{ $cat['color'] }}; font-size: 18px;"></i>
                                            </div>
                                            {{ $cat['name'] }}
                                        </div>
                                        <i class="fas fa-chevron-right chevron" style="font-size: 12px; opacity: 0.3;"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <style>
                            .category-item:hover, .category-item.active {
                                background: #196164 !important;
                                color: #fff !important;
                                border-color: #196164 !important;
                                transform: translateX(5px);
                                box-shadow: 0 10px 20px rgba(25, 97, 100, 0.15);
                            }
                            .category-item:hover .chevron, .category-item.active .chevron {
                                opacity: 1 !important;
                                transform: translateX(3px);
                            }
                        </style>

                        <style>
                            .category-btn:hover {
                                transform: translateY(-3px);
                                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05) !important;
                                border-color: #196164 !important;
                            }

                            .category-btn:hover i.fa-chevron-right {
                                color: #196164 !important;
                                transform: translateX(3px);
                                transition: transform 0.3s;
                            }
                        </style>

                        <!-- Project Terbaru -->
                        <div class="widget widget_recent_entries"
                            style="background: #fff; padding: 30px; border-radius: 16px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.03);">
                            <h3 class="widget_title"
                                style="font-size: 20px; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 15px; color: #196164;">
                                Project Terbaru</h3>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                @foreach($recentProjects as $recent)
                                    <li style="margin-bottom: 20px; display: flex; align-items: start; gap: 15px;">
                                        <div class="recent-post-content">
                                            <div class="recent-post-meta"
                                                style="font-size: 12px; color: #196164; margin-bottom: 5px;">
                                                <i class="far fa-calendar-alt me-1"></i>
                                                {{ $recent->created_at->format('d M, Y') }}
                                            </div>
                                            <h4 class="recent-post-title"
                                                style="font-size: 16px; font-weight: 600; line-height: 1.4; margin: 0;">
                                                <a href="#"
                                                    style="text-decoration: none; color: #1a1a1a;">{{ $recent->title }}</a>
                                            </h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

        <style>
            .project-card:hover {
                transform: translateY(-5px) !important;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1) !important;
            }

            .project-card:hover .project-img img {
                transform: scale(1.05);
            }

            .widget_categories a:hover {
                background: #196164 !important;
                border-color: #196164 !important;
                color: #fff !important;
            }

            .widget_categories a:hover i {
                color: #fff !important;
            }

            /* Pagination Styling */
            .page-link {
                color: #196164;
                border: none;
                margin: 0 5px;
                border-radius: 8px !important;
                font-weight: 600;
            }

            .page-item.active .page-link {
                background-color: #196164;
                border-color: #196164;
                color: white;
            }
        </style>
    </section>

    <!-- CTA Section (Matches About Page) -->
    <div class="cta-area-1" style="background: linear-gradient(135deg, #104041 0%, #196164 100%); 
                    background-image: url('{{ asset('assets/img/bg/cta_bg_1.png') }}');
                    background-size: cover;
                    background-position: center;
                    padding: 100px 0;
                    position: relative;
                    overflow: hidden;">

        <!-- Decorative Elements -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);"></div>
        <div
            style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; border-radius: 50%; background: rgba(255,255,255,0.05); filter: blur(40px);">
        </div>
        <div
            style="position: absolute; bottom: -30px; left: -30px; width: 300px; height: 300px; border-radius: 50%; background: rgba(255,255,255,0.05); filter: blur(60px);">
        </div>

        <div class="container" style="position: relative; z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="cta-wrap text-center">
                        <span class="sub-title text-white mb-2"
                            style="display: block; font-size: 16px; letter-spacing: 1px; text-transform: uppercase;">Siap
                            untuk Berkolaborasi?</span>
                        <h2 class="sec-title text-white mb-4" style="font-size: 48px; font-weight: 700; line-height: 1.2;">
                            Wujudkan Potensi Bisnis Anda Bersama Kami
                        </h2>
                        <p class="sec-text text-white mb-5 mx-auto"
                            style="font-size: 18px; opacity: 0.9; max-width: 700px; line-height: 1.6;">
                            Diskusikan kebutuhan strategi bisnis keberlanjutan perusahaan Anda. Tim ahli kami siap membantu
                            Anda mencapai target dengan solusi yang terukur.
                        </p>

                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="https://wa.me/6285123293135?text=Halo!%20Saya%20tertarik%20untuk%20berdiskusi%20lebih%20lanjut%20tentang%20solusi%20bisnis%20Anda."
                                target="_blank" class="cta-btn-whatsapp" style="display: inline-flex; 
                                          align-items: center; 
                                          gap: 15px; 
                                          font-size: 20px; 
                                          font-weight: 700;
                                          padding: 20px 50px; 
                                          border-radius: 50px; 
                                          background: linear-gradient(90deg, #25D366 0%, #128C7E 100%);
                                          color: #fff; 
                                          text-decoration: none;
                                          box-shadow: 0 10px 40px rgba(37, 211, 102, 0.4);
                                          transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                                          position: relative;
                                          overflow: hidden;">
                                <span class="btn-icon"
                                    style="display: flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: rgba(255,255,255,0.2); border-radius: 50%;">
                                    <i class="fab fa-whatsapp" style="font-size: 22px;"></i>
                                </span>
                                <span>Chat Via WhatsApp</span>
                                <!-- Shine Effect -->
                                <span
                                    style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0) 100%); transform: rotate(45deg); animation: btnShine 3s infinite;"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            @keyframes btnShine {
                0% {
                    left: -100%;
                    top: -100%;
                }

                20% {
                    left: 100%;
                    top: 100%;
                }

                100% {
                    left: 100%;
                    top: 100%;
                }
            }

            .cta-btn-whatsapp:hover {
                transform: translateY(-5px) scale(1.02);
                box-shadow: 0 20px 50px rgba(37, 211, 102, 0.6);
                background: linear-gradient(90deg, #20bd5a 0%, #0e7a6d 100%);
            }
        </style>
    </div>
@endsection