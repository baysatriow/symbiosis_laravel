@extends('layouts.public')

@section('title', 'Services - Symbiosis Indonesia')

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
                <h1 class="breadcrumb-title" style="font-size: 48px; font-weight: 700; margin-bottom: 15px;">Service</h1>
                <ul class="breadcrumb-menu d-flex justify-content-center gap-2"
                    style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a>
                    </li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li style="color: #fbbf24;">Service</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Service Page Area -->
    <div class="service-details-area space-top space-extra-bottom" style="padding: 80px 0;">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span
                        class="sub-title d-flex align-items-center justify-content-center gap-2 text-[#196164] font-semibold mb-2">
                        <img src="{{ asset('assets/img/icon/title_left.svg') }}" alt="shape">
                        Our Services
                    </span>
                    <h2 class="sec-title style2 mb-3" style="font-size: 36px; font-weight: 700; color: #1a1a1a;">
                        Bermitra Bisnis untuk Sukses
                    </h2>
                    <p class="sec-text" style="color: #666; max-width: 700px; margin: 0 auto;">
                        Kami berfokus pada solusi kolaboratif berbasis riset, digitalisasi, pembelajaran, dan keberlanjutan
                        bisnis untuk membantu organisasi Anda tumbuh lebih berdampak dan berkelanjutan.
                    </p>
                </div>
            </div>

            <div class="row gx-40">
                <!-- Sidebar / Tabs -->
                <div class="col-lg-4">
                    <div class="service-widget" style="background: #fff; padding: 0;">
                        <div class="service-menu" style="display: flex; flex-direction: column; gap: 15px;">
                            <button class="service-tab-btn active" onclick="openService(event, 'lab-research')"
                                style="text-align: left; padding: 20px 25px; border: 1px solid #eee; border-radius: 12px; background: #fff; font-weight: 600; font-size: 16px; color: #333; transition: all 0.3s; display: flex; align-items: center; justify-content: space-between;">
                                Lab / Research
                                <i class="fas fa-arrow-right" style="opacity: 0;"></i>
                            </button>
                            <button class="service-tab-btn" onclick="openService(event, 'digital-services')"
                                style="text-align: left; padding: 20px 25px; border: 1px solid #eee; border-radius: 12px; background: #fff; font-weight: 600; font-size: 16px; color: #333; transition: all 0.3s; display: flex; align-items: center; justify-content: space-between;">
                                Digital Services
                                <i class="fas fa-arrow-right" style="opacity: 0;"></i>
                            </button>
                            <button class="service-tab-btn" onclick="openService(event, 'learning-center')"
                                style="text-align: left; padding: 20px 25px; border: 1px solid #eee; border-radius: 12px; background: #fff; font-weight: 600; font-size: 16px; color: #333; transition: all 0.3s; display: flex; align-items: center; justify-content: space-between;">
                                Learning Center
                                <i class="fas fa-arrow-right" style="opacity: 0;"></i>
                            </button>
                            <button class="service-tab-btn" onclick="openService(event, 'sustainable-business')"
                                style="text-align: left; padding: 20px 25px; border: 1px solid #eee; border-radius: 12px; background: #fff; font-weight: 600; font-size: 16px; color: #333; transition: all 0.3s; display: flex; align-items: center; justify-content: space-between;">
                                Sustainable Business
                                <i class="fas fa-arrow-right" style="opacity: 0;"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="col-lg-8">
                    <!-- Lab & Research Content -->
                    <div id="lab-research" class="service-content active">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <h3 class="h4 mb-3" style="font-weight: 700; color: #333;">Lab & Research</h3>
                                <p class="mb-4" style="color: #666; line-height: 1.6; font-size: 15px;">
                                    Divisi ini berfokus pada penelitian sosial, lingkungan, dan tata kelola (ESG) untuk
                                    membantu perusahaan memahami dampak aktivitasnya secara komprehensif. Kami menyediakan
                                    hasil riset berbasis data yang dapat diimplementasikan langsung dalam strategi
                                    keberlanjutan dan perencanaan bisnis jangka panjang.
                                </p>
                                <ul class="checklist mb-4" style="list-style: none; padding: 0;">
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Kajian ESG dan dampak sosial
                                    </li>
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Survei kepuasan masyarakat dan stakeholder
                                    </li>
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Analisis data kebijakan dan corporate sustainability
                                    </li>
                                </ul>
                                <a href="https://wa.me/6285123293135?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Lab%20%26%20Research"
                                    target="_blank" class="global-btn"
                                    style="background-color: #196164; color: white; padding: 12px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; font-size: 14px;">
                                    WhatsApp Layanan Ini!
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="service-img rounded-xl overflow-hidden shadow-lg">
                                    <img src="{{ asset('assets/img/service/service-1-1.jpg') }}" alt="Lab & Research"
                                        style="width: 100%; height: 300px; object-fit: cover; border-radius: 12px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Digital Services Content -->
                    <div id="digital-services" class="service-content" style="display: none;">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <h3 class="h4 mb-3" style="font-weight: 700; color: #333;">Digital Services</h3>
                                <p class="mb-4" style="color: #666; line-height: 1.6; font-size: 15px;">
                                    Solusi digital untuk mengoptimalkan operasional bisnis Anda melalui transformasi
                                    teknologi yang efektif dan efisien, mendukung pengambilan keputusan berbasis data.
                                </p>
                                <ul class="checklist mb-4" style="list-style: none; padding: 0;">
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Pengembangan Website & Aplikasi
                                    </li>
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Sistem Manajemen Data
                                    </li>
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Digital Marketing Strategy
                                    </li>
                                </ul>
                                <a href="https://wa.me/6285123293135?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Digital%20Services"
                                    target="_blank" class="global-btn"
                                    style="background-color: #196164; color: white; padding: 12px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; font-size: 14px;">
                                    WhatsApp Layanan Ini!
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="service-img rounded-xl overflow-hidden shadow-lg">
                                    <img src="{{ asset('assets/img/service/service-1-2.jpg') }}" alt="Digital Services"
                                        style="width: 100%; height: 300px; object-fit: cover; border-radius: 12px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Learning Center Content -->
                    <div id="learning-center" class="service-content" style="display: none;">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <h3 class="h4 mb-3" style="font-weight: 700; color: #333;">Learning Center</h3>
                                <p class="mb-4" style="color: #666; line-height: 1.6; font-size: 15px;">
                                    Pusat pengembangan kapasitas SDM melalui pelatihan dan workshop yang dirancang khusus
                                    untuk meningkatkan kompetensi tim Anda.
                                </p>
                                <ul class="checklist mb-4" style="list-style: none; padding: 0;">
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        In-house Training
                                    </li>
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Workshop Keberlanjutan
                                    </li>
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Sertifikasi Profesional
                                    </li>
                                </ul>
                                <a href="https://wa.me/6285123293135?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Learning%20Center"
                                    target="_blank" class="global-btn"
                                    style="background-color: #196164; color: white; padding: 12px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; font-size: 14px;">
                                    WhatsApp Layanan Ini!
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="service-img rounded-xl overflow-hidden shadow-lg">
                                    <img src="{{ asset('assets/img/service/service-1-3.jpg') }}" alt="Learning Center"
                                        style="width: 100%; height: 300px; object-fit: cover; border-radius: 12px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sustainable Business Content -->
                    <div id="sustainable-business" class="service-content" style="display: none;">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <h3 class="h4 mb-3" style="font-weight: 700; color: #333;">Sustainable Business</h3>
                                <p class="mb-4" style="color: #666; line-height: 1.6; font-size: 15px;">
                                    Pendampingan strategis untuk memastikan bisnis Anda berjalan selaras dengan
                                    prinsip-prinsip keberlanjutan global dan tanggung jawab sosial.
                                </p>
                                <ul class="checklist mb-4" style="list-style: none; padding: 0;">
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Strategi CSR & Comdev
                                    </li>
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Sustainability Reporting (SR)
                                    </li>
                                    <li
                                        style="display: flex; gap: 10px; margin-bottom: 10px; color: #555; font-size: 14px;">
                                        <i class="fas fa-circle"
                                            style="font-size: 6px; color: #196164; margin-top: 8px;"></i>
                                        Green Business Model
                                    </li>
                                </ul>
                                <a href="https://wa.me/6285123293135?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Sustainable%20Business"
                                    target="_blank" class="global-btn"
                                    style="background-color: #196164; color: white; padding: 12px 25px; border-radius: 8px; font-weight: 600; text-decoration: none; font-size: 14px;">
                                    WhatsApp Layanan Ini!
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="service-img rounded-xl overflow-hidden shadow-lg">
                                    <img src="{{ asset('assets/img/service/service-1-4.jpg') }}" alt="Sustainable Business"
                                        style="width: 100%; height: 300px; object-fit: cover; border-radius: 12px;">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

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

                        <p class="mt-4 text-white" style="font-size: 14px; opacity: 0.7;">
                            <i class="fas fa-clock me-2"></i> Respon cepat di jam kerja (Senin - Jumat, 09:00 - 17:00)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            /* Tab Button Styles */
            .service-tab-btn:hover {
                background-color: #f0f7f7 !important;
                border-color: #196164 !important;
                color: #196164 !important;
            }

            .service-tab-btn.active {
                background-color: #196164 !important;
                border-color: #196164 !important;
                color: #fff !important;
            }

            .service-tab-btn:hover i {
                opacity: 1 !important;
                transform: translateX(5px);
            }

            .service-tab-btn.active i {
                opacity: 1 !important;
                color: #fff;
            }

            /* CTA Button Animation */
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
    @endpush

    @push('scripts')
        <script>
            function openService(evt, serviceName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("service-content");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                    x[i].classList.remove("active");
                }
                tablinks = document.getElementsByClassName("service-tab-btn");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("active");
                }
                document.getElementById(serviceName).style.display = "block";
                evt.currentTarget.classList.add("active");

                // Optional: Add fake fade in effect
                document.getElementById(serviceName).style.opacity = 0;
                setTimeout(function () {
                    document.getElementById(serviceName).style.transition = "opacity 0.4s";
                    document.getElementById(serviceName).style.opacity = 1;
                }, 50);
            }
        </script>
    @endpush

@endsection