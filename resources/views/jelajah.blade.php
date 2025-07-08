<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AyoMuncak</title>
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        .post-img {
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .post-img img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .blog-pagination ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 0.5rem;
        }

        .blog-pagination ul li {
            display: inline;
        }

        .blog-pagination ul li a {
            display: block;
            padding: 0.5rem 1rem;
            color: #007bff;
            text-decoration: none;
        }

        .blog-pagination ul li a.active {
            background: #007bff;
            color: #fff;
            border-radius: 0.25rem;
        }
    </style>

</head>

<body class="blog-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
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

    </header>


    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Jelajah Disini</h1>
                            <p class="mb-0">Jelajahi gunung-gunung di Jawa Timur dengan experience yang baru dan
                                informasi yang baik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <!-- Search Bar -->
        <div class="row mb-4 justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('jelajah') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari gunung..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </form>
            </div>
        </div>


        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">
            <div class="container">
                <div class="row gy-4">
                    @foreach ($gunungs as $gunung)
                        <div class="col-lg-4">
                            <article>
                                <div class="post-img">
                                    <a href="{{ route('gunung.show', $gunung->id) }}">
                                        <img src="{{ asset('storage/' . $gunung->gambar) }}" alt="{{ $gunung->nama }}"
                                            class="img-fluid">
                                    </a>
                                </div>
                                <h2 class="title">
                                    <a href="{{ route('gunung.show', $gunung->id) }}">{{ $gunung->nama }}</a>
                                </h2>
                                <p class="post-category">{{ $gunung->ketinggian }} Mdpl</p>
                                <div class="post-meta">
                                    <p class="post">
                                        {{ $gunung->rating }}
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($gunung->rating >= $i)
                                                <i class="fas fa-star"></i>
                                            @elseif ($gunung->rating >= $i - 0.5)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </p>
                                </div>
                            </article>
                        </div><!-- End post list item -->
                    @endforeach
                </div>

                <!-- Blog Pagination Section -->
                <section id="blog-pagination" class="blog-pagination section mt-5">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            {{ $gunungs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </section><!-- /Blog Pagination Section -->

            </div>
        </section><!-- /Blog Posts Section -->

    </main>

    <footer id="footer" class="footer position-relative">

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="sitename">AyoMuncak</strong> <span>All Rights Reserved</span></p>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
