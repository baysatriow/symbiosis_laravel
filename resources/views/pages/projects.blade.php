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
                    @if(request('search'))
                        <div class="alert alert-info mb-4"
                            style="background: white; border-left: 4px solid #196164; border-radius: 4px;">
                            Menampilkan hasil pencarian untuk: "<strong>{{ request('search') }}</strong>"
                        </div>
                    @endif

                    <div class="row g-4 mb-5">
                        @forelse($projects as $project)
                            <div class="col-md-6">
                                <div class="project-card style2"
                                    style="background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s; height: 100%;">
                                    <div class="project-img overflow-hidden" style="position: relative;">
                                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-100"
                                            style="height: 250px; object-fit: cover; transition: transform 0.5s;">
                                        <!-- Category Badge -->
                                        <span
                                            style="position: absolute; top: 15px; left: 15px; background: rgba(255,255,255,0.9); padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 600; color: #196164; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                            {{ $project->category ?? 'Project' }}
                                        </span>
                                    </div>
                                    <div class="project-content" style="padding: 25px;">
                                        <h3 class="project-title h5 mb-2">
                                            <a href="#"
                                                style="text-decoration: none; color: #1a1a1a; font-weight: 700;">{{ $project->title }}</a>
                                        </h3>
                                        <p class="project-desc mb-3"
                                            style="color: #666; font-size: 14px; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $project->description }}
                                        </p>
                                        @if($project->subtitle)
                                            <div class="project-meta text-muted" style="font-size: 13px;">
                                                <i class="far fa-folder me-1"></i> {{ $project->subtitle }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <i class="fas fa-box-open mb-3" style="font-size: 48px; color: #ccc;"></i>
                                <h4 class="text-muted">Belum ada project yang ditemukan.</h4>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-area text-center mb-4">
                        {{ $projects->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>

                <!-- Right Column: Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <!-- Cari Project -->
                        <div class="widget widget_search"
                            style="background: #fff; padding: 30px; border-radius: 16px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.03);">
                            <h3 class="widget_title"
                                style="font-size: 20px; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 15px; color: #196164;">
                                Cari Project</h3>
                            <form class="search-form" action="{{ route('projects') }}" method="GET"
                                style="position: relative; display: flex;">
                                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                                    style="width: 100%; padding: 15px; border: 1px solid #eee; border-radius: 8px; font-size: 14px; background: #f9f9f9;">
                                <button type="submit"
                                    style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #196164;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Kategori -->
                        <div class="widget widget_categories"
                            style="background: #fff; padding: 30px; border-radius: 16px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.03);">
                            <h3 class="widget_title"
                                style="font-size: 20px; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 15px; color: #196164;">
                                Kategori</h3>
                            <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 12px;">
                                <li>
                                    <a href="#" class="category-btn"
                                        style="background: linear-gradient(to right, #ffffff, #f9f9f9); border: 1px solid #eee; padding: 15px 20px; border-radius: 12px; display: flex; align-items: center; justify-content: space-between; text-decoration: none; color: #333; transition: all 0.3s; font-weight: 600; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
                                        <span style="display: flex; align-items: center; gap: 10px;">
                                            <span
                                                style="width: 32px; height: 32px; background: #ffebee; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fab fa-youtube" style="color: #ff0000; font-size: 16px;"></i>
                                            </span>
                                            YouTube
                                        </span>
                                        <i class="fas fa-chevron-right" style="font-size: 12px; color: #ccc;"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="category-btn"
                                        style="background: linear-gradient(to right, #ffffff, #f9f9f9); border: 1px solid #eee; padding: 15px 20px; border-radius: 12px; display: flex; align-items: center; justify-content: space-between; text-decoration: none; color: #333; transition: all 0.3s; font-weight: 600; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
                                        <span style="display: flex; align-items: center; gap: 10px;">
                                            <span
                                                style="width: 32px; height: 32px; background: #fce4ec; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fab fa-instagram" style="color: #e1306c; font-size: 16px;"></i>
                                            </span>
                                            Instagram
                                        </span>
                                        <i class="fas fa-chevron-right" style="font-size: 12px; color: #ccc;"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="category-btn"
                                        style="background: linear-gradient(to right, #ffffff, #f9f9f9); border: 1px solid #eee; padding: 15px 20px; border-radius: 12px; display: flex; align-items: center; justify-content: space-between; text-decoration: none; color: #333; transition: all 0.3s; font-weight: 600; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
                                        <span style="display: flex; align-items: center; gap: 10px;">
                                            <span
                                                style="width: 32px; height: 32px; background: #eeeeee; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fab fa-tiktok" style="color: #000; font-size: 16px;"></i>
                                            </span>
                                            TikTok
                                        </span>
                                        <i class="fas fa-chevron-right" style="font-size: 12px; color: #ccc;"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

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