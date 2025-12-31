@extends('layouts.public')

@section('title', 'Our Team - Symbiosis Indonesia')

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
                <h1 class="breadcrumb-title" style="font-size: 48px; font-weight: 700; margin-bottom: 15px;">Our Team</h1>
                <ul class="breadcrumb-menu d-flex justify-content-center gap-2"
                    style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a>
                    </li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li style="color: #fbbf24;">Our Team</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Team Area -->
    <section class="team-area space-top space-extra-bottom" style="padding: 80px 0; background-color: #f4f8f9;">
        <div class="container">
            <!-- 1. Commissioner -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/commissioner1_.png') }}" alt="Achyar Al Rasyid"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">Achyar Al Rasyid</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Commissioner</p>
                    </div>
                </div>
            </div>

            <!-- 2. C-Level Executives -->
            <div class="row justify-content-center mb-5 gx-4 gy-4">
                <!-- CEO -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/ceo.png') }}" alt="M Rizki Yusro"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">M Rizki Yusro</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Executive Officer</p>
                    </div>
                </div>
                <!-- CTO -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/cto.png') }}" alt="M Omar Dhani"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">M Omar Dhani</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Technology Officer</p>
                    </div>
                </div>
                <!-- CBO -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/cbo.png') }}" alt="Arif Hernowo"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">Arif Hernowo</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Business Officer</p>
                    </div>
                </div>
            </div>

            <!-- 3. Managers -->
            <div class="row justify-content-center mb-5 gx-4 gy-4">
                <!-- COO -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/coo.png') }}" alt="Oliver P"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">Oliver P</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Operating Officer</p>
                    </div>
                </div>
                <!-- CDO -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/cdo.png') }}" alt="M. Rezza Fahlepi"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">M. Rezza Fahlepi</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Data Officer</p>
                    </div>
                </div>
                <!-- CLO -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/clo.png') }}" alt="Rinalldo D"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">Rinalldo D</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Legal Officer</p>
                    </div>
                </div>
            </div>

            <!-- 4. Leads & Officers -->
            <div class="row justify-content-center mb-5 gx-4 gy-4">
                <!-- CMO/Local -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/cmo.png') }}" alt="Aoz Azumah Allia"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">Aoz Azumah Allia</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Local Officer</p>
                    </div>
                </div>
                <!-- HR -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <!-- Using HR placeholder/generic if specific not found, closest is hr2 or coo -->
                            <img src="{{ asset('assets/img/team/hr2.png') }}" alt="Muh Adli"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">Muh Adli</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Human Resources Officer
                        </p>
                    </div>
                </div>
                <!-- CFO -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center h-100"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/cfo_fr.png') }}" alt="Wildan Galang Dermawan"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">Wildan Galang Dermawan</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Chief Finance Officer</p>
                    </div>
                </div>
            </div>

            <!-- 5. Advisor -->
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="team-card text-center"
                        style="background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                        <div class="team-img-wrap mb-3" style="position: relative; overflow: hidden; border-radius: 15px;">
                            <img src="{{ asset('assets/img/team/advisor.png') }}" alt="Advisor"
                                style="width: 100%; aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                            <div class="team-social" style="position: absolute; bottom: 10px; right: 10px;">
                                <a href="#" class="icon-btn"
                                    style="width: 35px; height: 35px; background: #a3e635; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164;"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                        <h3 class="team-title h5 mb-1" style="font-weight: 700; color: #196164;">Ijang Achmad Haidir</h3>
                        <p class="team-desig" style="color: #666; font-size: 14px; margin: 0;">Advisor</p>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .team-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
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