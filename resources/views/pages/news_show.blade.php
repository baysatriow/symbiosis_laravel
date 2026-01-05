@extends('layouts.public')

@section('title', $news->title . ' - Symbiosis Indonesia')

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
                <h1 class="breadcrumb-title" style="font-size: 40px; font-weight: 700; margin-bottom: 15px;">News Detail</h1>
                <ul class="breadcrumb-menu d-flex justify-content-center gap-2" style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a></li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li><a href="{{ route('news') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">News</a></li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li style="color: #fbbf24;">Read</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- News Content -->
    <section class="news-details-area space" style="padding: 100px 0;">
        <div class="container">
            <div class="row gx-60 justify-content-center">
                <div class="col-lg-10">
                    <div class="news-content-wrap">
                        <div class="news-meta mb-3" style="font-size: 14px; color: #196164; font-weight: 600; display: flex; gap: 20px;">
                            <span><i class="far fa-calendar-alt me-2"></i> {{ $news->published_at->format('d M, Y') }}</span>
                            <span><i class="far fa-user me-2"></i> {{ $news->author->name ?? 'Admin' }}</span>
                        </div>
                        
                        <h2 style="font-size: 42px; font-weight: 800; color: #1a1a1a; margin-bottom: 35px; line-height: 1.2;">{{ $news->title }}</h2>
                        
                        <div class="news-main-img mb-5" style="border-radius: 30px; overflow: hidden; box-shadow: 0 25px 60px rgba(0,0,0,0.12);">
                            <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-100" style="max-height: 600px; object-fit: cover;">
                        </div>

                        <div class="news-text" style="font-size: 18px; line-height: 1.9; color: #333; max-width: 900px; margin: 0 auto;">
                            {!! $news->content !!}
                        </div>
                        
                        <!-- Share and Recent News -->
                        <div class="news-footer mt-100" style="margin-top: 80px; padding-top: 40px; border-top: 1px solid #eee;">
                            <h3 class="mb-5" style="font-size: 24px; font-weight: 800; color: #1a1a1a;">Berita Terbaru Lainnya</h3>
                            <div class="row g-4">
                                @foreach($recentNews as $recent)
                                    <div class="col-md-4">
                                        <div class="news-card-small" style="background: #fff; border-radius: 20px; border: 1px solid #eee; overflow: hidden; transition: all 0.3s;">
                                            <div style="height: 180px; overflow: hidden;">
                                                <img src="{{ Storage::url($recent->image) }}" alt="{{ $recent->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <div style="padding: 20px;">
                                                <span style="font-size: 12px; color: #196164; font-weight: 600;">{{ $recent->published_at->format('M d, Y') }}</span>
                                                <h4 style="font-size: 16px; font-weight: 700; margin-top: 10px; line-height: 1.4;">
                                                    <a href="{{ route('news.show', $recent->slug) }}" style="color: #1a1a1a; text-decoration: none;">{{ Str::limit($recent->title, 50) }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
