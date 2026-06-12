<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <i class="bi bi-tree-fill me-2"></i>
            <span class="fw-bold">Learning Center YIARI</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i>Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tentang-kami') ? 'active' : '' }}" href="{{ route('tentang-kami') }}">
                        <i class="bi bi-info-circle me-1"></i>Tentang Kami
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('fasilitas') ? 'active' : '' }}" href="{{ route('fasilitas') }}">
                        <i class="bi bi-building me-1"></i>Fasilitas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('event') ? 'active' : '' }}" href="{{ route('event') }}">
                        <i class="bi bi-calendar-event me-1"></i>Event
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ulasan') ? 'active' : '' }}" href="{{ route('ulasan') }}">
                        <i class="bi bi-book me-1"></i>Ulasan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">
                        <i class="bi bi-envelope me-1"></i>Kontak
                    </a>
                </li>
            </ul>

            <!-- CTA Button -->
            <a href="[wa.me](https://wa.me/6281234567890)" class="btn btn-light btn-sm ms-lg-3 mt-3 mt-lg-0" target="_blank">
                <i class="bi bi-whatsapp me-1"></i>Hubungi Kami
            </a>
        </div>
    </div>
</nav>
