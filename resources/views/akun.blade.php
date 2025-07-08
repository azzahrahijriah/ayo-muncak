<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>User AyoMuncak</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet">
    
    <!-- Custom CSS untuk Profile Responsive -->
</head>
<body>

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
    
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('assets/img/logo.png') }}" alt=""> -->
                <h1 class="sitename">AyoMuncak</h1><span>.</span>
            </a>

            <!-- NAVIGASI BAR -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <!-- Arah ke route 'beranda' -->
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>

                    <!-- Scroll dalam halaman beranda -->
                    <li><a href="{{ route('beranda') }}#about">Tentang</a></li>
                    <li><a href="{{ route('beranda') }}#assistance">Pelayanan</a></li>
                    <li><a href="{{ route('beranda') }}#favorite">Favorit</a></li>
                    <li><a href="{{ route('beranda') }}#faq">Tips</a></li>
                    <li><a href="{{ route('jelajah') }}">Jelajah</a></li>
                    <li><a href="{{ route('beranda') }}#contact">Kontak</a></li>

                    @auth('web')
                        <li><a href="{{ route('akun') }}">Akun</a></li>
                        <li>
                            <!-- Logout dengan tampilan seperti link biasa -->
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <div class="container mt-5 px-3 px-md-5">

        <!-- Profile Header -->
        <div class="profile-header d-flex align-items-center flex-wrap flex-md-nowrap gap-4">
                <div class="avatar mx-auto mx-md-0">
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">           
                    @endif
            </div>
            
            <div class="col-12 col-md-9">
                <div class="profile-info text-md-start text-center flex-grow-1">
                    <h1 class="fs-4">{{ Auth::user()->nama_lengkap ?? 'Nama Pengguna' }}</h1>
                    <div class="text-center text-md-start">
                        <div class="username">
                            {{ Auth::user()->username ?? 'Username' }}
                            <a href="{{ route('user.edit') }}" class="edit-profile" title="Edit Profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                        </div>
                        
                        <div class="profile-stats justify-content-start justify-content-md-start">
                            <div class="stat-item">
                                <span class="stat-number">{{ $pengalaman->count() }}</span>
                                <span class="stat-label">Pengalaman</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">{{ $favoritGunung->count() ?? 0 }}</span>
                                <span class="stat-label">Favorit</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">{{ $pengalaman->where('sampai_puncak', 1)->count() ?? 0 }}</span>
                                <span class="stat-label">Puncak</span>
                            </div>
                        </div>

                        @if(Auth::user()->bio)
                        <div class="bio text-md-start text-center">
                                {{ Auth::user()->bio }}
                            </div>
                        @endif

                        <div class="social-links justify-content-md-start justify-content-center">
                            @if(Auth::user()->instagram)
                                <a href="{{ Auth::user()->instagram }}" class="social-link instagram" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            
                            @if(Auth::user()->tiktok)
                                <a href="@{{ Auth::user()->tiktok }}" class="social-link tiktok" target="_blank">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            @endif
                            
                            @if(Auth::user()->youtube)
                                <a href="@{{ Auth::user()->youtube }}" class="social-link youtube" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Pengalaman Pendakian -->
            <div class="section">
                <h2 class="section-title">
                    <i class="fas fa-mountain"></i>
                    Pengalaman Pendakian
                </h2>
                
                @forelse($pengalaman as $exp)
                    <div class="experience-item">
                        <div class="experience-header">
                            <div>
                                <div class="mountain-name">{{ $exp->gunung->nama ?? 'Gunung Tidak Diketahui' }}</div>
                                <div class="experience-date">{{ date('d M Y', strtotime($exp->tanggal_pendakian)) }}</div>
                            </div>
                            <div>
                                @if($exp->sampai_puncak)
                                    <span class="summit-badge">
                                        <i class="fas fa-flag"></i> Sampai Puncak
                                    </span>
                                @else
                                    <span class="no-summit-badge">
                                        <i class="fas fa-times"></i> Tidak Sampai
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        @if($exp->deskripsi)
                            <div class="experience-description">
                                {{ $exp->deskripsi }}
                            </div>
                        @endif
                        
                        @if($exp->tingkat_kesulitan)
                            <span class="difficulty-level difficulty-{{ strtolower($exp->tingkat_kesulitan) }}">
                                {{ ucfirst($exp->tingkat_kesulitan) }}
                            </span>
                        @endif
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-mountain"></i>
                        <p>Belum ada pengalaman pendakian</p>
                        <p>Mulai petualangan pertama Anda!</p>
                    </div>
                @endforelse
            </div>

            <!-- Gunung Favorit -->
            <div class="section">
                <h2 class="section-title">
                    <i class="fas fa-heart"></i>
                    Gunung Favorit
                </h2>
                
                @forelse($favoritGunung as $fav)
                    <div class="favorite-item">
                        <div class="mountain-name">{{ $fav->gunung->nama ?? 'Gunung Tidak Diketahui' }}</div>
                        <div class="experience-date">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $fav->gunung->daerah ?? 'Daerah tidak diketahui' }}
                        </div>
                        @if($fav->gunung->ketinggian)
                            <div class="experience-description">
                                <i class="fas fa-ruler-vertical"></i>
                                {{ $fav->gunung->ketinggian }} mdpl
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-heart"></i>
                        <p>Belum ada gunung favorit</p>
                        <p>Jelajahi dan tambahkan gunung impian Anda!</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('jelajah') }}" class="btn btn-primary">
                <i class="fas fa-search"></i>
                Jelajahi Gunung
            </a>
        </div>
    </div>

    <script>
        // Simple animation on load
        window.addEventListener('load', function() {
            const elements = document.querySelectorAll('.profile-header, .section');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    el.style.transition = 'all 0.6s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });

        // Stats counter animation
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 30;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 50);