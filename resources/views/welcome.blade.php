@extends('layouts.public')

@section('title', 'Symbiosis Indonesia - Grow Together, Sustain Forever')

@section('content')
    <!-- Hero Section -->
    <div class="hero-wrapper hero-2" id="hero"
        style="background-image: url('{{ asset('assets/img/hero/Background-Header.jpg') }}')">
        <div class="hero-overlay" style="background-image: url('{{ asset('assets/img/hero/hero_overlay_1.png') }}')"></div>
        <div class="container">
            <div class="hero-style2">
                <h1 class="hero-title text-white">
                    Grow Together<span class="hero-title2">Sustain Forever</span>
                </h1>
                <p class="hero-text text-white">
                    Becoming a Platform That Supports Indonesia's Economic Transformation Towards Sustainability,
                    With a Focus on a Green Economy That Considers Environmental Sustainability and Social Welfare
                </p>
                <div class="btn-group">
                    <div class="media-wrap">
                        <div class="icon">
                            <span class="play-btn popup-video"
                                onclick="window.open('https://www.youtube.com/watch?v=ueWBAgwougc', '_blank')">
                                <i class="fas fa-solid fa-play"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h6 class="title text-white">See Profile Video</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="title-area mb-30">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                            About Us
                        </span>
                        <h2 class="sec-title style2">Memaksimalkan Melalui Strategi</h2>
                        <p class="sec-text">
                            Symbiosis Indonesia adalah konsultan manajemen yang membantu perusahaan membangun ekosistem
                            bisnis berkelanjutan. Dengan praktik ESG (Environment, Social, Governance) dan CSR (Corporate
                            Social Responsibility), kami menghadirkan strategi yang menguntungkan secara finansial sekaligus
                            berdampak positif bagi lingkungan dan masyarakat.
                        </p>
                    </div>
                    <div class="checklist">
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Integrasi ESG dalam strategi bisnis.</li>
                            <li><i class="fas fa-check-circle"></i> Pendampingan penerapan praktik CSR yang berkelanjutan.
                            </li>
                            <li><i class="fas fa-check-circle"></i> Solusi bisnis hijau untuk keberlangsungan jangka
                                panjang.</li>
                        </ul>
                    </div>
                    <p class="about-desc">
                        Kami berkomitmen mendukung transformasi menuju ekonomi hijau yang inklusif, inovatif, dan berdaya
                        saing global.
                    </p>
                    <div class="btn-group">
                        <a href="{{ route('about') }}" class="global-btn style2">
                            Tentang Kami <img src="{{ asset('assets/img/icon/right-icon.svg') }}" alt="Symbiosis">
                        </a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-thumb2">
                        <div class="about-img-1">
                            <img style="width: 300px; height: 610px; object-fit: cover;"
                                src="{{ asset('assets/img/normal/about_2-2.jpg') }}" alt="img">
                        </div>
                        <div class="about-img-2">
                            <img style="width: 270px; height: 450px; object-fit: cover;"
                                src="{{ asset('assets/img/normal/about_2-1.jpg') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="service-area-2 space-bottom">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-5">
                    <div class="title-area">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                            Our Services
                        </span>
                        <h2 class="sec-title style2">Menavigasi Jalan Menuju Kesuksesan</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="service-title-area">
                        <p>Mendukung bisnis Anda tumbuh berkelanjutan dengan strategi data, solusi inovatif, dan dukungan
                            nyata</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row gx-30">
                <div class="col-lg-3 col-md-6">
                    <div class="service-box">
                        <div class="service-box_content">
                            <div class="service-box_icon">
                                <img src="{{ asset('assets/img/icon/service-icon_1-1.svg') }}" alt="img">
                            </div>
                            <h4 class="service-box_title h5">
                                <a href="{{ route('service') }}">Symbiosis Lab/Research</a>
                            </h4>
                            <p class="service-box_text">
                                Symbiosis membantu perusahaan menyusun strategi keberlanjutan, merancang program CSR
                                berbasis data, serta memberikan asistensi kepatuhan regulasi.
                            </p>
                            <a href="{{ route('service') }}" class="global-btn style-border">
                                Selengkapnya <img src="{{ asset('assets/img/icon/right-icon2.svg') }}" alt="Symbiosis">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-box">
                        <div class="service-box_content">
                            <div class="service-box_icon">
                                <img src="{{ asset('assets/img/icon/service-icon_1-2.svg') }}" alt="img">
                            </div>
                            <h4 class="service-box_title h5">
                                <a href="{{ route('service') }}">Symbiosis Digital Services</a>
                            </h4>
                            <p class="service-box_text">
                                Symbiosis menghadirkan solusi berbasis AI untuk memetakan kebutuhan komunitas, mengukur
                                risiko ESG, dan menghitung nilai sosial program CSR.
                            </p>
                            <a href="{{ route('service') }}" class="global-btn style-border">
                                Selengkapnya <img src="{{ asset('assets/img/icon/right-icon2.svg') }}" alt="Symbiosis">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-box">
                        <div class="service-box_content">
                            <div class="service-box_icon">
                                <img src="{{ asset('assets/img/icon/service-icon_1-3.svg') }}" alt="img">
                            </div>
                            <h4 class="service-box_title h5">
                                <a href="{{ route('service') }}">Symbiosis Learning Center</a>
                            </h4>
                            <p class="service-box_text">
                                Symbiosis menyediakan pelatihan CSR melalui in-house training, public class, dan e-learning
                                yang dirancang sesuai kebutuhan.
                            </p>
                            <a href="{{ route('service') }}" class="global-btn style-border">
                                Selengkapnya <img src="{{ asset('assets/img/icon/right-icon2.svg') }}" alt="Symbiosis">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-box">
                        <div class="service-box_content">
                            <div class="service-box_icon">
                                <img src="{{ asset('assets/img/icon/service-icon_1-4.svg') }}" alt="img">
                            </div>
                            <h4 class="service-box_title h5">
                                <a href="{{ route('service') }}">Symbiosis Sustainable Business</a>
                            </h4>
                            <p class="service-box_text">
                                Symbiosis menjadi mitra strategis dalam proyek keberlanjutan dengan dukungan tenaga ahli dan
                                manajemen event.
                            </p>
                            <a href="{{ route('service') }}" class="global-btn style-border">
                                Selengkapnya <img src="{{ asset('assets/img/icon/right-icon2.svg') }}" alt="Symbiosis">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Section -->
    <div class="portfolio-area-2 space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="title-area text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                            Latest Project
                        </span>
                        <h2 class="sec-title style2">Transformasikan Bisnis Anda dengan Profesional</h2>
                    </div>
                </div>
            </div>
            <div class="row gx-30">
                <!-- Youtube Project -->
                <div class="col-lg-4 col-md-6">
                    <div class="portfolio-box2">
                        <div class="portfolio-box2_img">
                            <img src="{{ $youtubeProject ? asset('storage/' . $youtubeProject->image) : asset('assets/img/portfolio/2-1.jpg') }}" alt="Youtube Project" style="height: 250px; width: 100%; object-fit: cover;">
                        </div>
                        <div class="portfolio-box2-details">
                            <span class="portfolio-box2_subtitle">Youtube Channel</span>
                            <h4 class="portfolio-box2_title"><a href="{{ route('projects', ['category' => 'Youtube']) }}">{{ $youtubeProject ? $youtubeProject->title : 'Youtube Content' }}</a></h4>
                        </div>
                    </div>
                </div>

                <!-- Instagram Project -->
                <div class="col-lg-4 col-md-6">
                    <div class="portfolio-box2">
                        <div class="portfolio-box2_img">
                            <img src="{{ $instagramProject ? asset('storage/' . $instagramProject->image) : asset('assets/img/portfolio/2-2.jpg') }}" alt="Instagram Project" style="height: 250px; width: 100%; object-fit: cover;">
                        </div>
                        <div class="portfolio-box2-details">
                            <span class="portfolio-box2_subtitle">Instagram Feed</span>
                            <h4 class="portfolio-box2_title"><a href="{{ route('projects', ['category' => 'Instagram']) }}">{{ $instagramProject ? $instagramProject->title : 'Instagram Content' }}</a></h4>
                        </div>
                    </div>
                </div>

                <!-- Tiktok Project -->
                <div class="col-lg-4 col-md-6">
                    <div class="portfolio-box2">
                        <div class="portfolio-box2_img">
                            <img src="{{ $tiktokProject ? asset('storage/' . $tiktokProject->image) : asset('assets/img/portfolio/2-3.jpg') }}" alt="Tiktok Project" style="height: 250px; width: 100%; object-fit: cover;">
                        </div>
                        <div class="portfolio-box2-details">
                            <span class="portfolio-box2_subtitle">Tiktok Viral</span>
                            <h4 class="portfolio-box2_title"><a href="{{ route('projects', ['category' => 'Tiktok']) }}">{{ $tiktokProject ? $tiktokProject->title : 'Tiktok Content' }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <div class="testimonial-area-2 space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="title-area">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                            Clients Testimonial
                        </span>
                        <h2 class="sec-title style2">Suara Para Mitra Kami</h2>
                        <p class="sec-text" style="font-size: 15px; line-height: 1.6;">
                            Kami terus berkomitmen memberikan layanan konsultasi terbaik dan pendampingan berkelanjutan bagi
                            perusahaan untuk mencapai dampak nyata.
                        </p>
                    </div>
                    <div class="feature-wrapper mt-4">
                        <div class="feature-icon">
                            <a href="https://wa.me/6285123293135" target="_blank">
                                <img src="{{ asset('assets/img/icon/call.svg') }}" alt="Symbiosis">
                            </a>
                        </div>
                        <div class="media-body">
                            <span class="header-info_label">Butuh Bantuan?</span>
                            <p class="header-info_link">
                                <a href="https://wa.me/6285123293135" target="_blank">+62 851-2329-3135</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testiomonial-wrap-2">
                        <!-- Testimonial Marquee (Single Row) -->
                        <div class="marquee-wrapper">
                            <div class="marquee-content">
                                <!-- Original Set -->
                                @for($i = 0; $i < 3; $i++)
                                <div class="marquee-item" style="width: 400px; padding: 0 15px;">
                                    <div class="testi-box" style="padding: 30px; border-radius: 16px; background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.08); width: 100%;">
                                        <div class="quote-icon mb-3">
                                            <img src="{{ asset('assets/img/icon/quote2-1.svg') }}" alt="quote" style="width: 40px;">
                                        </div>
                                        <p class="testi-box_text" style="font-size: 15px; line-height: 1.7; color: #333; margin-bottom: 20px;">
                                            "Symbiosis banyak membantu kami di departemen CSR dalam pendampingan riset dan publikasi program sesuai kebutuhan internal."
                                        </p>
                                        <div class="testi-box-profile text-center mt-4">
                                            <h4 class="testi-profile-title" style="font-size: 16px; margin-bottom: 5px;">Oscar Muda Kusuma</h4>
                                            <span class="testi-profile-desig" style="font-size: 14px; color: #666; display: block; margin-bottom: 12px;">Senior Comdev PT Pertamina EP Sangatta</span>
                                            <img src="{{ asset('assets/img/testimonial/testimoni1.png') }}" alt="Oscar Muda Kusuma" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; border: 2px solid #eee;">
                                        </div>
                                    </div>
                                </div>
                                @endfor
                                <!-- Duplicate Set -->
                                @for($i = 0; $i < 3; $i++)
                                <div class="marquee-item" style="width: 400px; padding: 0 15px;">
                                    <div class="testi-box" style="padding: 30px; border-radius: 16px; background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.08); width: 100%;">
                                        <div class="quote-icon mb-3">
                                            <img src="{{ asset('assets/img/icon/quote2-1.svg') }}" alt="quote" style="width: 40px;">
                                        </div>
                                        <p class="testi-box_text" style="font-size: 15px; line-height: 1.7; color: #333; margin-bottom: 20px;">
                                            "Symbiosis banyak membantu kami di departemen CSR dalam pendampingan riset dan publikasi program sesuai kebutuhan internal."
                                        </p>
                                        <div class="testi-box-profile text-center mt-4">
                                            <h4 class="testi-profile-title" style="font-size: 16px; margin-bottom: 5px;">Oscar Muda Kusuma</h4>
                                            <span class="testi-profile-desig" style="font-size: 14px; color: #666; display: block; margin-bottom: 12px;">Senior Comdev PT Pertamina EP Sangatta</span>
                                            <img src="{{ asset('assets/img/testimonial/testimoni1.png') }}" alt="Oscar Muda Kusuma" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; border: 2px solid #eee;">
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="team-area-2 space">
        <div class="container">
            <div class="row gx-30 justify-content-center">
                <div class="col-lg-7">
                    <div class="title-area text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                            Our Team Member
                        </span>
                        <h2 class="sec-title style2">Solusi Strategis untuk Pertumbuhan Bisnis</h2>
                    </div>
                </div>
            </div>
            <div class="row gx-30">
                <div class="col-lg-4 col-md-6">
                    <div class="team-box">
                        <div class="team-box_img">
                            <img src="{{ asset('assets/img/team/ceo.png') }}" alt="img">
                        </div>
                        <div class="team-box_content">
                            <h4 class="team-box_title"><a href="{{ route('team') }}">M Rizki Yusro</a></h4>
                            <span class="team-box_desig">Chief Executive Officer</span>
                            <div class="team-social_wrap">
                                <div class="social-btn style2">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-box">
                        <div class="team-box_img">
                            <img src="{{ asset('assets/img/team/cto.png') }}" alt="img">
                        </div>
                        <div class="team-box_content">
                            <h4 class="team-box_title"><a href="{{ route('team') }}">M Omar Dhani</a></h4>
                            <span class="team-box_desig">Chief Technology Officer</span>
                            <div class="team-social_wrap">
                                <div class="social-btn style2">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-box">
                        <div class="team-box_img">
                            <img src="{{ asset('assets/img/team/cbo.png') }}" alt="img">
                        </div>
                        <div class="team-box_content">
                            <h4 class="team-box_title"><a href="{{ route('team') }}">Arif Hernowo</a></h4>
                            <span class="team-box_desig">Chief Business Officer</span>
                            <div class="team-social_wrap">
                                <div class="social-btn style2">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Section -->
    <div class="client-bg-area-2 space-bottom">
        <div class="container">
            <div class="row gx-90 d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="title-area text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                            Our Partners
                        </span>
                        <h2 class="sec-title style2">Mitra keberlanjutan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <style>
                    .marquee-wrapper {
                        overflow: hidden;
                        width: 100%;
                        position: relative;
                        margin-bottom: 20px;
                    }
                    
                    .marquee-content {
                        display: flex;
                        width: max-content;
                        animation: marquee-scroll 20s linear infinite;
                    }
                    
                    .marquee-content.reverse {
                        animation: marquee-scroll-reverse 20s linear infinite;
                    }
                    
                    .marquee-item {
                        flex: 0 0 auto;
                        width: 200px; /* Adjust based on image size */
                        padding: 0 20px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    
                    .marquee-item img {
                        max-width: 100%;
                        height: auto;
                        opacity: 0.8;
                        transition: opacity 0.3s;
                    }
                    
                    .marquee-item img:hover {
                        opacity: 1;
                    }

                    @keyframes marquee-scroll {
                        0% { transform: translateX(0); }
                        100% { transform: translateX(-50%); } /* Move half width because of duplication */
                    }
                    
                    @keyframes marquee-scroll-reverse {
                        0% { transform: translateX(-50%); }
                        100% { transform: translateX(0); }
                    }
                </style>

                <!-- Top Row: Scroll Left -->
                <div class="marquee-wrapper">
                    <div class="marquee-content">
                        <!-- Original Set -->
                        @for($i = 1; $i <= 8; $i++)
                            <div class="marquee-item">
                                <img src="{{ asset('assets/img/client/' . $i . '.png') }}" alt="client">
                            </div>
                        @endfor
                        <!-- Duplicate Set for Seamless Loop -->
                        @for($i = 1; $i <= 8; $i++)
                            <div class="marquee-item">
                                <img src="{{ asset('assets/img/client/' . $i . '.png') }}" alt="client">
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Bottom Row: Scroll Right -->
                <div class="marquee-wrapper">
                    <div class="marquee-content reverse">
                        <!-- Original Set -->
                        @for($i = 1; $i <= 8; $i++)
                            <div class="marquee-item">
                                <img src="{{ asset('assets/img/client/' . $i . '.png') }}" alt="client">
                            </div>
                        @endfor
                        <!-- Duplicate Set for Seamless Loop -->
                        @for($i = 1; $i <= 8; $i++)
                            <div class="marquee-item">
                                <img src="{{ asset('assets/img/client/' . $i . '.png') }}" alt="client">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-area-2 bg-theme" style="background-image: url('{{ asset('assets/img/bg/cta_bg_1.png') }}')">
        <div class="container">
            <div class="row justify-content-md-between align-items-center flex-row-reverse">
                <div class="col-lg-5">
                    <div class="cta2-bg-thumb text-center">
                        <img style="width: 522px; height: 521px; object-fit: cover; border-radius: 20px;"
                            src="{{ asset('assets/img/normal/cta-thumb-2-1.jpg') }}" alt="cta">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="cta-wrap2">
                        <div class="title-area">
                            <h2 class="sec-title text-white style2">Hubungi Kami di WhatsApp</h2>
                            <p class="sec-text text-white">
                                Ingin tahu lebih banyak tentang layanan dan strategi bisnis kami? Tim kami siap membantu
                                Anda secara langsung melalui WhatsApp.
                            </p>
                        </div>
                        <div class="text-start mt-4">
                            <a href="https://wa.me/6285123293135?text=Halo!%20Saya%20tertarik%20untuk%20berdiskusi%20lebih%20lanjut%20tentang%20solusi%20bisnis%20Anda."
                                target="_blank" class="global-btn"
                                style="display: inline-flex; align-items: center; gap: 10px; font-size: 18px; padding: 14px 28px; border-radius: 50px; background-color: #25D366; color: #fff; text-decoration: none;">
                                <i class="fab fa-whatsapp" style="font-size: 22px;"></i>
                                Chat via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection