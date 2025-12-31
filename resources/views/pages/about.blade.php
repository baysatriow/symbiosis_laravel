@extends('layouts.public')

@section('title', 'About Us - Symbiosis Indonesia')

@php
    use App\Models\YoutubeVideo;
    $youtubeVideos = YoutubeVideo::active()->ordered()->get();
@endphp

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
                <h1 class="breadcrumb-title" style="font-size: 48px; font-weight: 700; margin-bottom: 15px;">About Us</h1>
                <ul class="breadcrumb-menu d-flex justify-content-center gap-2"
                    style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a>
                    </li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li style="color: #fbbf24;">About Us</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- About Section: Wujudkan Potensi Bisnis Anda -->
    <div class="about-area-1 position-relative space-top" style="padding: 80px 0;">
        <div class="container">
            <div class="row align-items-center gx-5 gy-4">
                <!-- Left: Content -->
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="about-content-wrap pe-lg-4">
                        <div class="title-area mb-3">
                            <span class="sub-title d-flex align-items-center gap-2">
                                <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                                About Us
                            </span>
                            <h2 class="sec-title mt-2">Wujudkan Potensi Bisnis Anda</h2>
                            <p class="sec-text mb-4">
                                <strong>Symbiosis Indonesia</strong> adalah perusahaan konsultan manajemen yang berfokus
                                pada pengembangan strategi bisnis berkelanjutan. Kami membantu organisasi dalam merancang,
                                mengimplementasikan, dan mengevaluasi strategi yang berdampak jangka panjang, dengan
                                mengintegrasikan nilai keberlanjutan, inovasi, dan tanggung jawab sosial di setiap langkah
                                bisnis.
                            </p>
                        </div>

                        <!-- Keunggulan -->
                        <div class="achive-about mb-3">
                            <div class="achive-about_content d-flex">
                                <div class="achive-about_icon me-3">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="media-body">
                                    <h3 class="box-title mb-1">Solusi Strategis Profesional</h3>
                                    <p class="achive-about_text mb-0">
                                        Kami menyediakan solusi strategis berbasis riset dan pengalaman industri untuk
                                        membantu perusahaan menghadapi dinamika bisnis modern.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="achive-about mb-4">
                            <div class="achive-about_content d-flex">
                                <div class="achive-about_icon me-3">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="media-body">
                                    <h3 class="box-title mb-1">Mitra Peningkatan Kinerja</h3>
                                    <p class="achive-about_text mb-0">
                                        Kami menjadi mitra terpercaya bagi perusahaan dalam meningkatkan efisiensi
                                        operasional, kinerja tim, dan daya saing pasar.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Visi & Misi -->
                        <div class="about-vision-mission mt-4">
                            <h3 class="sec-title" style="font-size: 26px;">Visi</h3>
                            <p class="sec-text mb-3">
                                Menjadi konsultan manajemen terdepan di Indonesia yang mendorong transformasi bisnis
                                berkelanjutan melalui inovasi, kolaborasi, dan keberlanjutan.
                            </p>

                            <h3 class="sec-title mt-3" style="font-size: 26px;">Misi</h3>
                            <ul class="checklist">
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Membantu perusahaan mengintegrasikan nilai keberlanjutan dan tanggung jawab sosial dalam
                                    strategi bisnisnya.
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Menghadirkan solusi berbasis data dan inovasi untuk pertumbuhan bisnis jangka panjang.
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    Memberdayakan sumber daya manusia dan organisasi agar adaptif terhadap perubahan global.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right: Image -->
                <div class="col-xl-5 col-lg-5 col-md-12 text-center">
                    <div class="about-image-wrap">
                        <img src="{{ asset('assets/img/normal/about_shape1-1.jpg') }}" alt="Symbiosis Indonesia"
                            class="about-image"
                            style="object-fit: cover; border-radius: 16px; box-shadow: 0 8px 25px rgba(0,0,0,0.25); width: 100%; max-width: 500px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <div class="testimonial-area-1 overflow-hidden" style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left: Image & Title -->
                <div class="col-lg-6">
                    <div class="title-area">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                            Clients Testimonial
                        </span>
                        <h2 class="sec-title style2">Tujuan Bisnis Anda adalah Keyakinan</h2>
                    </div>
                    <div class="testimonial-thumb1" style="margin-top: 20px;">
                        <img src="{{ asset('assets/img/testimonial/testimonial-1-1.jpg') }}" alt="testimonial background"
                            style="border-radius: 12px; object-fit: cover; width: 100%; max-width: 500px;">
                    </div>
                </div>

                <!-- Right: Testimonial -->
                <div class="col-lg-6">
                    <div class="title-area">
                        <p class="testi-desc" style="font-size: 16px; line-height: 1.7;">
                            Kami berdedikasi membantu perusahaan mencapai tujuan bisnis dengan strategi yang tepat dan
                            berkelanjutan.
                        </p>
                    </div>

                    <div class="testi-area-slider" style="margin-top: 30px;">
                        <div class="testi-card"
                            style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); position: relative;">
                            <div class="testi-card_content">
                                <div class="rating" style="color: #fbbf24; margin-bottom: 15px;">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testi-card_text"
                                    style="font-size: 15px; line-height: 1.8; color: #333; margin-bottom: 20px;">
                                    "Symbiosis Indonesia membantu kami dalam menyusun strategi implementasi sustainability
                                    initiatives perusahaan melalui program CSR yang lebih relevan, terukur dan tentunya
                                    dapat berkelanjutan."
                                </p>
                                <div class="testi-card-profile d-flex align-items-center gap-3">
                                    <div class="testi-profile_thumb">
                                        <img src="{{ asset('assets/img/testimonial/testimoni2.png') }}" alt="Erry Imasari"
                                            style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 3px solid #196164;">
                                    </div>
                                    <div class="testi-card-profile-details">
                                        <h4 class="testi-profile-title"
                                            style="font-size: 16px; font-weight: 600; margin: 0;">Erry Imasari</h4>
                                        <span class="testi-profile-desig" style="font-size: 14px; color: #666;">CSR Manager
                                            PT. Jababeka Infrastruktur</span>
                                    </div>
                                </div>
                            </div>
                            <div class="quote-icon" style="position: absolute; top: 20px; right: 20px; opacity: 0.2;">
                                <img src="{{ asset('assets/img/icon/quote1-1.svg') }}" alt="quote" style="width: 50px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media / YouTube Section -->
    <div class="social-media-area" style="padding: 80px 0; background: #fff;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="title-area text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                            Social Media
                        </span>
                        <h2 class="sec-title style2">Terhubung Dengan Kami</h2>
                        <p class="sec-text">
                            Temukan informasi terbaru dari kami melalui platform sosial media yang kami kelola
                        </p>
                    </div>
                </div>
            </div>
            @if($youtubeVideos->count() > 0)
                <div class="row g-4">
                    @foreach($youtubeVideos as $video)
                        <div class="col-lg-3 col-md-4 col-6">
                            <a href="https://www.youtube.com/watch?v={{ $video->video_id }}" target="_blank"
                                class="social-media-card d-block" style="text-decoration: none;">
                                <div class="social-media-thumb"
                                    style="position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                    <img src="https://img.youtube.com/vi/{{ $video->video_id }}/maxresdefault.jpg"
                                        alt="{{ $video->title }}"
                                        style="width: 100%; aspect-ratio: 16/9; object-fit: cover; transition: transform 0.3s;"
                                        onmouseover="this.style.transform='scale(1.05)'"
                                        onmouseout="this.style.transform='scale(1)'">
                                    <div class="play-overlay"
                                        style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.3); transition: background 0.3s;">
                                        <div
                                            style="width: 50px; height: 50px; background: #ff0000; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="fab fa-youtube" style="font-size: 24px; color: white;"></i>
                                        </div>
                                    </div>
                                    @if($video->title)
                                        <div
                                            style="position: absolute; bottom: 0; left: 0; right: 0; padding: 12px; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
                                            <span
                                                style="color: white; font-size: 13px; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $video->title }}</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted">Belum ada video yang tersedia.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- CTA Section: Hubungi Kami -->
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

                        <p class="mt-4 text-white" style="font-size: 14px; opacity: 0.7;">
                            <i class="fas fa-clock me-2"></i> Respon cepat di jam kerja (Senin - Jumat, 09:00 - 17:00)
                        </p>
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