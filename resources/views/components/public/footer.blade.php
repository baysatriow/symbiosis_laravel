<!-- Footer -->
<footer class="footer-wrapper footer-layout2"
    style="background-image: url('{{ asset('assets/img/bg/footer-bg2-1.png') }}')">
    <div class="container">
        <div class="widget-area">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget widget-about">
                        <div class="about-logo">
                            <a href="{{ route('home') }}">
                                <img style="width: 200px;" src="{{ asset('assets/img/logoSymbiosis.svg') }}"
                                    alt="Symbiosis">
                            </a>
                        </div>
                        <p class="footer-text mb-30">
                            mendukung transformasi menuju ekonomi hijau yang inklusif, dan inovatif.
                        </p>
                        <div class="social-btn style3">
                            <span class="social-title">Ikuti Kami</span>
                            <a target="_blank" href="https://instagram.com/symbiosis.ind"><i
                                    class="fab fa-instagram"></i></a>
                            <a target="_blank" href="https://www.tiktok.com/@symbiosis.indonesia"><i
                                    class="fab fa-tiktok"></i></a>
                            <a target="_blank" href="https://www.youtube.com/@symbiosis.indonesia"><i
                                    class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Contact</h3>
                        <div class="widget-contact2">
                            <div class="widget-contact-grid">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-grid-details">
                                    <h6><a href="mailto:symbiosis170845@gmail.com">symbiosis170845@gmail.com</a></h6>
                                </div>
                            </div>
                            <div class="widget-contact-grid">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-grid-details">
                                    <h6>
                                        <p>Tebet, Jakarta Selatan</p>
                                    </h6>
                                </div>
                            </div>
                            <div class="widget-contact-grid">
                                <div class="working-time">
                                    <span class="title">Jam Kantor</span>
                                    <p class="desc">Kami buka dari Senin hingga Jumat 09.00 AM - 17.00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Useful Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('team') }}">Team</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row gy-3 justify-content-lg-between justify-content-center">
                <div class="col-auto align-self-center">
                    <p class="copyright-text text-center">
                        © <a href="{{ route('home') }}">Symbiosis</a> {{ date('Y') }} | All Rights Reserved
                    </p>
                </div>
                <div class="col-auto">
                    <div class="footer-links">
                        <a href="{{ route('contact') }}">Terms &amp; Condition</a>
                        <a href="{{ route('contact') }}">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>