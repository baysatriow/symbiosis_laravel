@extends('layouts.public')

@section('title', 'Contact Us - Symbiosis Indonesia')

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
                <h1 class="breadcrumb-title" style="font-size: 48px; font-weight: 700; margin-bottom: 15px;">Contact</h1>
                <ul class="breadcrumb-menu d-flex justify-content-center gap-2"
                    style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Home</a>
                    </li>
                    <li style="color: rgba(255,255,255,0.6);">/</li>
                    <li style="color: #fbbf24;">Contact</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-area" style="width: 100%; height: 450px; background: #eee;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126906.96205712391!2d106.7336465!3d-6.2844866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%20Selatan%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1645000000000!5m2!1sid!2sid"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!-- Info Cards Section -->
    <div class="contact-info-area"
        style="transform: translateY(-50%); position: relative; z-index: 2; margin-bottom: -50px;">
        <div class="container">
            <div class="row justify-content-center g-0"
                style="background: #196164; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); overflow: hidden;">
                <!-- Phone -->
                <div class="col-md-4">
                    <div class="contact-box"
                        style="padding: 40px 30px; display: flex; align-items: center; gap: 20px; border-right: 1px solid rgba(255,255,255,0.1);">
                        <div class="box-icon"
                            style="width: 50px; height: 50px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.1); border-radius: 50%;">
                            <i class="fas fa-phone-alt text-white" style="font-size: 20px;"></i>
                        </div>
                        <div class="box-content">
                            <h4 class="box-title text-white mb-1" style="font-size: 18px; font-weight: 700;">Phone</h4>
                            <p class="box-text text-white mb-0" style="opacity: 0.8; font-size: 14px;">+62 851-2329-3135</p>
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="col-md-4">
                    <div class="contact-box"
                        style="padding: 40px 30px; display: flex; align-items: center; gap: 20px; border-right: 1px solid rgba(255,255,255,0.1);">
                        <div class="box-icon"
                            style="width: 50px; height: 50px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.1); border-radius: 50%;">
                            <i class="fas fa-map-marker-alt text-white" style="font-size: 20px;"></i>
                        </div>
                        <div class="box-content">
                            <h4 class="box-title text-white mb-1" style="font-size: 18px; font-weight: 700;">Location</h4>
                            <p class="box-text text-white mb-0" style="opacity: 0.8; font-size: 14px;">Tebet, Jakarta
                                Selatan</p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-4">
                    <div class="contact-box" style="padding: 40px 30px; display: flex; align-items: center; gap: 20px;">
                        <div class="box-icon"
                            style="width: 50px; height: 50px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.1); border-radius: 50%;">
                            <i class="fas fa-envelope text-white" style="font-size: 20px;"></i>
                        </div>
                        <div class="box-content">
                            <h4 class="box-title text-white mb-1" style="font-size: 18px; font-weight: 700;">Email</h4>
                            <p class="box-text text-white mb-0" style="opacity: 0.8; font-size: 14px;">
                                symbiosis170845@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <section class="contact-form-area space-top space-extra-bottom"
        style="padding-top: 50px; padding-bottom: 100px; background-color: #f8f9fa;">
        <div class="container">
            <div class="row gx-60 align-items-start">
                <!-- Left: Text Content -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <span class="sub-title"
                        style="color: #196164; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 15px;">
                        <i class="fas fa-bolt me-2"></i>Contact Us
                    </span>
                    <h2 class="sec-title mb-4" style="font-size: 36px; font-weight: 800; color: #1a1a1a;">Hubungi kami</h2>
                    <p class="sec-text mb-4" style="color: #666; font-size: 16px; line-height: 1.6;">
                        Desain adalah kategori luas yang mencakup berbagai solusi teknologi.
                    </p>

                    <div class="social-btn style2 mt-4 d-flex gap-3">
                        <a href="https://instagram.com/" target="_blank"
                            style="width: 40px; height: 40px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://tiktok.com/" target="_blank"
                            style="width: 40px; height: 40px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s;">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="https://youtube.com/" target="_blank"
                            style="width: 40px; height: 40px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #196164; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s;">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Right: Form -->
                <div class="col-lg-8">
                    <div class="contact-form-wrap"
                        style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.03); border: 1px solid #eee;">
                        @if(session('success'))
                            <div class="alert alert-success mb-4" style="border-radius: 10px;">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama"
                                            required
                                            style="padding: 15px 20px; border-radius: 10px; border: 1px solid #eee; background: #f9f9f9; width: 100%;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                            required
                                            style="padding: 15px 20px; border-radius: 10px; border: 1px solid #eee; background: #f9f9f9; width: 100%;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="phone" id="phone"
                                            placeholder="Nomor telepon"
                                            style="padding: 15px 20px; border-radius: 10px; border: 1px solid #eee; background: #f9f9f9; width: 100%;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <select name="subject" id="subject" class="form-select"
                                            style="padding: 15px 20px; border-radius: 10px; border: 1px solid #eee; background: #f9f9f9; width: 100%; color: #666; height: 58px;">
                                            <option value="" disabled selected>Pilih Subjek</option>
                                            <option value="Consultation">Konsultasi</option>
                                            <option value="Partnership">Partnership</option>
                                            <option value="General">Pertanyaan Umum</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="5" class="form-control"
                                            placeholder="Isi pesan kamu" required
                                            style="padding: 15px 20px; border-radius: 10px; border: 1px solid #eee; background: #f9f9f9; width: 100%;"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn w-100"
                                        style="background: #196164; color: #fff; padding: 15px; border-radius: 10px; font-weight: 700; border: none; transition: background 0.3s; display: flex; align-items: center; justify-content: center; gap: 10px;">
                                        Kirim <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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