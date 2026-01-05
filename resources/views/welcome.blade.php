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
                    <div class="portfolio-box2" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s;">
                        <div class="portfolio-box2_img" style="overflow: hidden;">
                            <a href="{{ $youtubeProject ? route('projects.show', $youtubeProject->id) : '#' }}">
                                <img src="{{ $youtubeProject && $youtubeProject->image ? asset('storage/' . $youtubeProject->image) : asset('assets/img/portfolio/2-1.jpg') }}" alt="Youtube Project" style="height: 280px; width: 100%; object-fit: cover; transition: transform 0.5s;">
                            </a>
                        </div>
                        <div class="portfolio-box2-details" style="padding: 25px; background: #fff;">
                            <span class="portfolio-box2_subtitle" style="color: #196164; font-weight: 700; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Youtube Channel</span>
                            <h4 class="portfolio-box2_title">
                                <a href="{{ $youtubeProject ? route('projects.show', $youtubeProject->id) : '#' }}" style="color: #1a1a1a; text-decoration: none; font-weight: 800; font-size: 20px;">
                                    {{ $youtubeProject ? $youtubeProject->title : 'Youtube Content' }}
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- Instagram Project -->
                <div class="col-lg-4 col-md-6">
                    <div class="portfolio-box2" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s;">
                        <div class="portfolio-box2_img" style="overflow: hidden;">
                            <a href="{{ $instagramProject ? route('projects.show', $instagramProject->id) : '#' }}">
                                <img src="{{ $instagramProject && $instagramProject->image ? asset('storage/' . $instagramProject->image) : asset('assets/img/portfolio/2-2.jpg') }}" alt="Instagram Project" style="height: 280px; width: 100%; object-fit: cover; transition: transform 0.5s;">
                            </a>
                        </div>
                        <div class="portfolio-box2-details" style="padding: 25px; background: #fff;">
                            <span class="portfolio-box2_subtitle" style="color: #196164; font-weight: 700; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Instagram Feed</span>
                            <h4 class="portfolio-box2_title">
                                <a href="{{ $instagramProject ? route('projects.show', $instagramProject->id) : '#' }}" style="color: #1a1a1a; text-decoration: none; font-weight: 800; font-size: 20px;">
                                    {{ $instagramProject ? $instagramProject->title : 'Instagram Content' }}
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- Tiktok Project -->
                <div class="col-lg-4 col-md-6">
                    <div class="portfolio-box2" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s;">
                        <div class="portfolio-box2_img" style="overflow: hidden;">
                            <a href="{{ $tiktokProject ? route('projects.show', $tiktokProject->id) : '#' }}">
                                <img src="{{ $tiktokProject && $tiktokProject->image ? asset('storage/' . $tiktokProject->image) : asset('assets/img/portfolio/2-3.jpg') }}" alt="Tiktok Project" style="height: 280px; width: 100%; object-fit: cover; transition: transform 0.5s;">
                            </a>
                        </div>
                        <div class="portfolio-box2-details" style="padding: 25px; background: #fff;">
                            <span class="portfolio-box2_subtitle" style="color: #196164; font-weight: 700; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Tiktok Viral</span>
                            <h4 class="portfolio-box2_title">
                                <a href="{{ $tiktokProject ? route('projects.show', $tiktokProject->id) : '#' }}" style="color: #1a1a1a; text-decoration: none; font-weight: 800; font-size: 20px;">
                                    {{ $tiktokProject ? $tiktokProject->title : 'Tiktok Content' }}
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <style>
                .portfolio-box2:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.12) !important; }
                .portfolio-box2:hover img { transform: scale(1.1); }
            </style>
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
                    <div class="testimonial-slider-wrap" x-data="{ 
                            active: 0,
                            items: [
                                {
                                    text: 'Symbiosis banyak membantu kami di departemen CSR dalam pendampingan riset dan publikasi program sesuai kebutuhan internal.',
                                    author: 'Oscar Muda Kusuma',
                                    desig: 'Senior Comdev PT Pertamina EP Sangatta',
                                    image: '{{ asset('assets/img/testimonial/testimoni1.png') }}'
                                },
                                {
                                    text: 'Layanan konsultasi yang diberikan sangat profesional dan berbasis data, sangat memudahkan kami dalam pengambilan keputusan strategis.',
                                    author: 'Mitra Bisnis A',
                                    desig: 'Manager CSR PT Berjaya',
                                    image: '{{ asset('assets/img/testimonial/testimoni1.png') }}'
                                },
                                {
                                    text: 'Penerapan ESG menjadi lebih terukur dan efisien berkat pendampingan dari tim ahli Symbiosis Indonesia.',
                                    author: 'Mitra Bisnis B',
                                    desig: 'Direktur Lingkungan PT Lestari',
                                    image: '{{ asset('assets/img/testimonial/testimoni1.png') }}'
                                }
                            ],
                            init() {
                                setInterval(() => {
                                    this.active = (this.active + 1) % this.items.length;
                                }, 5000);
                            },
                            prev() {
                                this.active = this.active === 0 ? this.items.length - 1 : this.active - 1;
                            },
                            next() {
                                this.active = (this.active + 1) % this.items.length;
                            }
                        }">
                        
                        <!-- Slider Container -->
                        <div class="testi-slider-container" style="position: relative; overflow: hidden; border-radius: 30px;">
                            <!-- Sliding Track -->
                            <div class="testi-slider-track" 
                                 :style="'display: flex; transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94); transform: translateX(-' + (active * 100) + '%);'">
                                <template x-for="(item, index) in items" :key="index">
                                    <div class="testi-slide" style="min-width: 100%; flex-shrink: 0; padding: 10px;">
                                        <div class="testi-box" style="padding: 45px; border-radius: 24px; background: #fff; box-shadow: 0 20px 60px rgba(0,0,0,0.08); border: 1px solid #f0f0f0;">
                                            <div class="quote-icon mb-4">
                                                <img src="{{ asset('assets/img/icon/quote2-1.svg') }}" alt="quote" style="width: 50px; opacity: 0.15;">
                                            </div>
                                            <p class="testi-box_text" x-text="item.text" style="font-size: 18px; line-height: 1.9; color: #333; font-style: italic; margin-bottom: 30px; min-height: 100px;">
                                            </p>
                                            <div class="testi-box-profile d-flex align-items-center gap-4 mt-4 pt-4" style="border-top: 1px solid #f0f0f0;">
                                                <img :src="item.image" :alt="item.author" style="width: 65px; height: 65px; border-radius: 50%; object-fit: cover; border: 3px solid #e0f2f1;">
                                                <div class="text-start">
                                                    <h4 class="testi-profile-title" x-text="item.author" style="font-size: 17px; font-weight: 800; margin-bottom: 4px; color: #196164;"></h4>
                                                    <span class="testi-profile-desig" x-text="item.desig" style="font-size: 13px; color: #888; font-weight: 500;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        
                        <!-- Navigation & Dots -->
                        <div class="testi-nav d-flex align-items-center justify-content-between mt-4 px-2">
                            <!-- Left/Right Arrows -->
                            <div class="d-flex gap-2">
                                <button @click="prev()" 
                                        style="width: 45px; height: 45px; border-radius: 50%; border: 2px solid #e0e0e0; background: #fff; color: #196164; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s;">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button @click="next()" 
                                        style="width: 45px; height: 45px; border-radius: 50%; border: 2px solid #196164; background: #196164; color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s;">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            
                            <!-- Dots Indicator -->
                            <div class="testi-dots d-flex align-items-center gap-3">
                                <template x-for="(item, index) in items" :key="index">
                                    <button @click="active = index" 
                                            :class="active === index ? 'active' : ''"
                                            class="testi-dot"
                                            style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid #196164; background: transparent; cursor: pointer; transition: all 0.3s; padding: 0;">
                                    </button>
                                </template>
                            </div>
                        </div>
                        
                        <style>
                            .testi-dot.active, .testi-dot:hover {
                                background: #196164 !important;
                                transform: scale(1.2);
                            }
                            .testi-nav button:hover {
                                transform: scale(1.05);
                            }
                        </style>
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
    <div class="cta-area-2" style="position: relative; padding: 120px 0; overflow: hidden; background: #0a2627;">
        <!-- Dynamic Background Elements -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at 20% 30%, rgba(25, 97, 100, 0.4) 0%, transparent 50%), radial-gradient(circle at 80% 70%, rgba(16, 185, 129, 0.2) 0%, transparent 50%);"></div>
        <div style="position: absolute; top: -100px; right: -100px; width: 400px; height: 400px; background: rgba(25, 97, 100, 0.1); border-radius: 50%; filter: blur(80px); animation: float 10s infinite alternate;"></div>
        <div style="position: absolute; bottom: -50px; left: -50px; width: 300px; height: 300px; background: rgba(52, 211, 153, 0.05); border-radius: 50%; filter: blur(60px); animation: float 15s infinite alternate-reverse;"></div>

        <div class="container" style="position: relative; z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="cta-content-new" style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); padding: 60px; border-radius: 40px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 30px 60px rgba(0,0,0,0.3);">
                        <span class="sub-title text-emerald-400 mb-3" style="display: block; font-weight: 800; text-transform: uppercase; letter-spacing: 3px; font-size: 14px;">Siap Berkolaborasi?</span>
                        <h2 class="sec-title text-white mb-4" style="font-size: 42px; font-weight: 800; line-height: 1.2;">Wujudkan Potensi Bisnis Anda Bersama Kami</h2>
                        <p class="sec-text text-white/80 mb-5 mx-auto" style="font-size: 18px; max-width: 600px; line-height: 1.7;">
                            Diskusikan kebutuhan strategi bisnis keberlanjutan perusahaan Anda. Tim ahli kami siap membantu Anda mencapai target dengan solusi yang terukur.
                        </p>
                        
                        <a href="https://wa.me/6285123293135?text=Halo!%20Saya%20tertarik%20untuk%20berdiskusi%20lebih%20lanjut%20tentang%20solusi%20bisnis%20Anda."
                            target="_blank" class="whatsapp-btn-shine" 
                            style="display: inline-flex; align-items: center; gap: 15px; font-size: 20px; font-weight: 800; padding: 22px 45px; border-radius: 20px; background: #25D366; color: #fff; text-decoration: none; box-shadow: 0 15px 35px rgba(37, 211, 102, 0.4); position: relative; overflow: hidden; transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                            <i class="fab fa-whatsapp" style="font-size: 26px;"></i>
                            <span>Chat Via WhatsApp</span>
                            <!-- Shine Effect -->
                            <div class="shine"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <style>
            @keyframes float {
                from { transform: translateY(0) scale(1); }
                to { transform: translateY(30px) scale(1.1); }
            }
            .whatsapp-btn-shine:hover { transform: translateY(-5px); box-shadow: 0 25px 50px rgba(37, 211, 102, 0.6); }
            .whatsapp-btn-shine .shine {
                position: absolute; top: -100%; left: -100%; width: 200%; height: 200%;
                background: linear-gradient(135deg, transparent, rgba(255,255,255,0.4), transparent);
                transform: rotate(45deg);
                animation: shine 3s infinite;
            }
            @keyframes shine {
                0% { left: -100%; top: -100%; }
                20% { left: 100%; top: 100%; }
                100% { left: 100%; top: 100%; }
            }
        </style>
    </div>
@endsection