<!-- Header -->
<header class="header-layout2">
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/img/logoSymbiosis.svg') }}" alt="Symbiosis"
                                    style="width: 200px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-block">
                            <ul>
                                <li><a href="{{ route('home') }}"
                                        class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                                <li><a href="{{ route('about') }}"
                                        class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                                <li><a href="{{ route('service') }}"
                                        class="{{ request()->routeIs('service') ? 'active' : '' }}">Service</a></li>
                                <li><a href="{{ route('team') }}"
                                        class="{{ request()->routeIs('team') ? 'active' : '' }}">Team</a></li>
                                <li><a href="{{ route('projects') }}"
                                        class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a></li>
                                <li><a href="{{ route('news') }}"
                                        class="{{ request()->routeIs('news') ? 'active' : '' }}">News</a></li>
                                <li><a href="{{ route('contact') }}"
                                        class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                            </ul>
                        </nav>
                        <button type="button" class="menu-toggle d-block d-lg-none" data-bs-toggle="offcanvas"
                            data-bs-target="#mobileMenu">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logoSymbiosis.svg') }}" alt="Symbiosis" style="width: 150px;">
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
            <li class="mb-3"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
            <li class="mb-3"><a href="{{ route('about') }}" class="text-dark">About</a></li>
            <li class="mb-3"><a href="{{ route('service') }}" class="text-dark">Service</a></li>
            <li class="mb-3"><a href="{{ route('team') }}" class="text-dark">Team</a></li>
            <li class="mb-3"><a href="{{ route('projects') }}" class="text-dark">Projects</a></li>
            <li class="mb-3"><a href="{{ route('news') }}" class="text-dark">News</a></li>
            <li class="mb-3"><a href="{{ route('contact') }}" class="text-dark">Contact</a></li>
        </ul>
    </div>
</div>