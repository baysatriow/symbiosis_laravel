@extends('layouts.public')

@section('title', 'News & Blog - Symbiosis Indonesia')

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
                <h1 class="breadcrumb-title" style="font-size: 48px; font-weight: 700; margin-bottom: 15px;">News & Blog
                </h1>
                <ul class="breadcrumb-menu d-flex justify-content-center gap-2"
                    style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a>
                    </li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li style="color: #fbbf24;">News</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- News Area -->
    <section class="blog-area space-top space-extra-bottom" style="padding: 80px 0; background-color: #f8f9fa;">
        <div class="container">
            <div class="row gx-40">
                <!-- Left Column: News Grid -->
                <div class="col-lg-8">
                    <!-- Search Result Info -->
                    @if(request('search'))
                        <div class="d-flex justify-content-between align-items-center mb-4"
                            style="background: white; border-left: 4px solid #196164; border-radius: 8px; padding: 15px 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                            <div style="font-size: 15px; color: #444;">
                                Hasil pencarian: "<strong>{{ request('search') }}</strong>"
                            </div>
                            <a href="{{ route('news') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Reset</a>
                        </div>
                    @endif

                    <div class="row g-4 mb-5">
                        @forelse($news as $item)
                            <div class="col-md-6">
                                <div class="blog-card style2"
                                    style="background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s; height: 100%; border: 1px solid #f0f0f0;">
                                    <div class="blog-img overflow-hidden" style="position: relative;">
                                        <a href="{{ route('news.show', $item->slug) }}">
                                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-100"
                                                style="height: 250px; object-fit: cover; transition: transform 0.6s;">
                                        </a>
                                        <div style="position: absolute; top: 15px; left: 15px; z-index: 2;">
                                            <span style="background: #fbbf24; color: #1a1a1a; padding: 6px 16px; border-radius: 50px; font-size: 11px; font-weight: 800; display: block; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                                {{ $item->published_at->format('d M, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="blog-content" style="padding: 30px;">
                                        <h3 class="blog-title h5 mb-3">
                                            <a href="{{ route('news.show', $item->slug) }}"
                                                style="text-decoration: none; color: #1a1a1a; font-weight: 800; line-height: 1.4; transition: color 0.3s;">{{ $item->title }}</a>
                                        </h3>
                                        <p class="blog-text mb-4"
                                            style="color: #666; font-size: 14px; line-height: 1.7; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ Str::limit(strip_tags($item->content), 120) }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div style="font-size: 12px; color: #888; font-weight: 500;">
                                                <i class="far fa-user me-1" style="color: #196164;"></i> {{ $item->author->name ?? 'Admin' }}
                                            </div>
                                            <a href="{{ route('news.show', $item->slug) }}" class="link-btn"
                                                style="color: #196164; font-weight: 700; font-size: 13px; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                                                Read More <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div style="background: #fff; padding: 60px; border-radius: 30px; border: 1px dashed #ddd;">
                                    <h4 class="text-muted" style="font-weight: 700;">Belum ada berita terbaru.</h4>
                                    <a href="{{ route('news') }}" class="btn mt-3 rounded-pill px-4" style="background: #196164; color: #fff;">Lihat Semua Berita</a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-area d-flex justify-content-center mb-5">
                        {{ $news->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>

                <!-- Right Column: Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <!-- Cari News -->
                        <div class="widget widget_search"
                            style="background: #fff; padding: 30px; border-radius: 16px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.03);">
                            <h3 class="widget_title"
                                style="font-size: 20px; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 15px; color: #196164;">
                                Cari Berita</h3>
                            <form class="search-form" action="{{ route('news') }}" method="GET"
                                style="position: relative; display: flex;">
                                <input type="text" name="search" placeholder="Keyword..." value="{{ request('search') }}"
                                    style="width: 100%; padding: 15px; border: 1px solid #eee; border-radius: 8px; font-size: 14px; background: #f9f9f9;">
                                <button type="submit"
                                    style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #196164;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Recent News -->
                        <div class="widget widget_recent_entries"
                            style="background: #fff; padding: 30px; border-radius: 16px; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.03);">
                            <h3 class="widget_title"
                                style="font-size: 20px; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 15px; color: #196164;">
                                Berita Terbaru</h3>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                @foreach($recentNews as $recent)
                                    <li style="margin-bottom: 20px; display: flex; align-items: start; gap: 15px;">
                                        <div class="recent-post-img overflow-hidden"
                                            style="width: 80px; height: 80px; border-radius: 8px; flex-shrink: 0;">
                                            <img src="{{ Storage::url($recent->image) }}" alt="{{ $recent->title }}"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <div class="recent-post-content">
                                            <div class="recent-post-meta"
                                                style="font-size: 12px; color: #196164; margin-bottom: 5px;">
                                                <i class="far fa-calendar-alt me-1"></i>
                                                {{ $recent->created_at->format('d M, Y') }}
                                            </div>
                                            <h4 class="recent-post-title"
                                                style="font-size: 15px; font-weight: 600; line-height: 1.4; margin: 0;">
                                                <a href="{{ route('news.show', $recent->slug) }}"
                                                    style="text-decoration: none; color: #1a1a1a;">{{ Str::limit($recent->title, 40) }}</a>
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
            .blog-card:hover {
                transform: translateY(-5px) !important;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1) !important;
            }

            .blog-card:hover .blog-img img {
                transform: scale(1.05);
            }

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