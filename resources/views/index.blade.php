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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        /* Custom Styles */
        .favorite {
            background-color: #f8f9fa;
        }

        .text-gradient {
            background: linear-gradient(to right, #FD9B63, #ff6d18);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .title-underline {
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #ff6d18, #FD9B63);
            margin-bottom: 1rem;
        }

        .favorite-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .favorite-card:hover {
            transform: translateY(-10px);
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5));
        }

        .parallax-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease;
        }

        .favorite-card:hover .parallax-img {
            transform: scale(1.1);
        }

        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.03);
        }

    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
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


        </div>
    </header>

    <main class="main">

        <!-- HERO SECTION -->
        <section id="hero" class="hero section">
            <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="" data-aos=" fade-in">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h2 data-aos="fade-up" data-aos-delay="100">Selamat datang di AyoMuncak</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Jelajahi Gunung dan Pendakian di Jawa Timur</p>
                    </div>
                </div>
            </div>
        </section><!-- END HERO SECTION -->

        <!-- PROFILE PROFILE -->
        <section id="clients" class="clients section">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4 justify-content-center">
                    <!-- Menggunakan justify-content-center untuk centering -->
                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="https://kemenparekraf.go.id/profil/profil-amikom" target="_blank">
                            <img src="{{ asset('assets/img/clients/amikom.svg') }}" class="img-fluid" alt="">
                        </a>
                    </div><!-- End Client Item -->


                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="https://bdd.kemenparekraf.go.id/" target="_blank">
                            <img src="{{ asset('assets/img/clients/bdd.png') }}" class="img-fluid" alt="" href="https://kemenparekraf.go.id/profil/profil-lembaga">
                        </a>
                    </div><!-- End Client Item -->

                    <div class="col-xl-3 col-md-3 col-6 client-logo">
                        <a href="https://www.dicoding.com/" target="_blank">
                            <img src="{{ asset('assets/img/clients/dicoding.png') }}" class="img-fluid" alt="">
                        </a>
                    </div><!-- End Client Item -->
                </div>
            </div>
        </section><!-- END PROFILE PROFILE -->


        <!-- ABOUT SECTION -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">

                    <div class="col-xl-5 content">
                        <h3>Tentang AyoMuncak</h3>
                        <h2>Jelajahi Pegunungan Megah di Jawa Timur bersama AyoMuncak</h2>
                        <p>Selamat datang di AyoMuncak, sumber informasi utama Kamu tentang pegunungan dan jalur
                            pendakian di Jawa Timur. Misi kami adalah memberikan informasi yang terperinci, akurat, dan
                            inspiratif untuk membantu para petualang dan pecinta alam menjelajahi lanskap menakjubkan di
                            wilayah ini.</i>
                    </div>

                    <div class="col-xl-7">
                        <div class="row gy-4 icon-boxes">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <i class="bi bi-person-walking"></i>
                                    <h3>Petualangan yang Menginspirasi</h3>
                                    <p>Di AyoMuncak, kami percaya bahwa setiap orang harus merasakan keindahan dan
                                        sensasi mendaki gunung. Platform kami dirancang untuk memandu Kamu melewati
                                        puncak dan jalur menakjubkan di Jawa Timur, menawarkan tip, rute, dan informasi
                                        penting untuk membuat perjalanan Kamu aman dan berkesan.</p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-people-fill"></i>
                                    <h3>Menghubungkan Komunitas</h3>
                                    <p>AyoMuncak bertujuan untuk membangun komunitas pendaki dan pecinta alam yang dapat
                                        berbagi pengalaman, tips, dan cerita. Baik Kamu seorang pendaki gunung
                                        berpengalaman atau pemula, AyoMuncak adalah tempat untuk terhubung, belajar, dan
                                        tumbuh bersama.</p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-asterisk"></i>
                                    <h3>Mempromosikan Konservasi</h3>
                                    <p>Komitmen kami lebih dari sekedar memberikan informasi. Kami menganjurkan
                                        pelestarian keindahan alam Jawa Timur. Dengan mempromosikan praktik pendakian
                                        yang bertanggung jawab dan kesadaran lingkungan, kami berupaya melestarikan
                                        lanskap megah ini untuk generasi mendatang.</p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-balloon-heart-fill"></i>
                                    <h3>Semangat untuk Puncak</h3>
                                    <p>AyoMuncak didirikan oleh sekelompok pendaki yang sangat mencintai pegunungan di
                                        Jawa Timur. Frustrasi dengan kurangnya sumber daya yang komprehensif, kami
                                        memutuskan untuk membuat platform yang menggabungkan pengetahuan kolektif dan
                                        semangat kami untuk memberi manfaat bagi sesama petualang..</p>
                                </div>
                            </div> <!-- End Icon Box -->

                        </div>
                    </div>

                </div>
            </div>

        </section><!-- END ABOUT SECTION -->

        <!-- STATS SECTION -->
        <section id="stats" class="stats section">
            <img src="{{ asset('assets/img/stats-bg.jpg') }}" alt="" data-aos=" fade-in">
            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span>{{ $jumlahGunung }}</span>
                            <p>Gunung</p>
                        </div>
                    </div><!-- End Stats Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span>{{ $gunungTertinggi->ketinggian }} Mdpl</span>
                            <p>Tertinggi</p>
                        </div>
                    </div><!-- End Stats Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span>{{ $gunungTerendah->ketinggian }} Mdpl</span>
                            <p>Terendah</p>
                        </div>
                    </div><!-- End Stats Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span>Bromo</span>
                            <p>Favorit</p>
                        </div>
                    </div><!-- End Stats Item -->
                </div>
            </div>
        </section><!-- END STATS SECTION -->


        <!-- ASSISTANCE SECTION -->
        <section id="assistance" class="assistance section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pelayanan</h2>
                <p>Bantuan informasi yang bisa Kamu dapatkan dari AyoMuncak</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                            <div>
                                <h4 class="title">Informasi Area</a></h4>
                                <p class="description">Jelajahi detail lengkap tentang berbagai daerah dan jalan
                                    setapak di Jawa Timur. Dari gunung populer hingga permata tersembunyi, temukan semua
                                    yang perlu Anda ketahui sebelum bertualang.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-geo-alt"></i></div>
                            <div>
                                <h4 class="title">Peta Interaktif</>
                                </h4>
                                <p class="description">Bernavigasi dengan mudah menggunakan peta interaktif kami yang
                                    menyoroti jalur, landmark, dan tempat menarik. Rencanakan rute Anda dan jelajahi
                                    keindahan Jawa Timur dengan percaya diri.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-brightness-high"></i></div>
                            <div>
                                <h4 class="title">Pembaruan Cuaca</a></h4>
                                <p class="description">Tetap terinformasi dengan ramalan cuaca real-time untuk daerah
                                    pegunungan di Jawa Timur. Bersiaplah untuk pendakian Anda dengan informasi akurat
                                    tentang suhu, curah hujan, dan kondisi cuaca.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-telephone-plus"></i></div>
                            <div>
                                <h4 class="title">Kontak dan Paket Pendakian</a></h4>
                                <p class="description">Temukan dengan mudah informasi kontak pemandu wisata lokal dan
                                    agen yang menawarkan paket hiking. Pilih dari beragam paket untuk disesuaikan dengan
                                    tingkat pengalaman dan preferensi yang berbeda.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-card-text"></i></div>
                            <div>
                                <h4 class="title">Deskripsi Gunung</a></h4>
                                <p class="description">Dapatkan penjelasan rinci tentang karakteristik masing-masing
                                    gunung, termasuk ketinggian, medan, flora, dan fauna. Pahami keunikan puncak Jawa
                                    Timur sebelum memulai perjalanan Anda.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-hand-thumbs-up"></i></div>
                            <div>
                                <h4 class="title">Highlight</a></h4>
                                <p class="description">Akses informasi dan sumber daya terperinci untuk merencanakan
                                    petualangan hiking Anda secara efektif. Buat keputusan yang tepat dengan bimbingan
                                    dan bantuan komprehensif kami.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- END ASSISTANCE SECTION -->

        <!-- FAVORITE SECTION -->
        <section id="favorite" class="favorite section py-5">
            <!-- Section Title with Animated Underline -->
            <div class="container">
                <div class="section-title text-center mb-5" data-aos="fade-up">
                    <h2 class="display-4 fw-bold text-gradient">Gunung Favorit</h2>
                    <div class="title-underline mx-auto"></div>
                    <p class="lead mt-3">Destinasi favorit pendaki di {{ $daerahFavorit ?: 'Jawa Timur' }}</p>
                </div>

                <div class="row justify-content-center">
                    @foreach ($gunungFavorit as $index => $favorit)
                    @if ($favorit->gunung)
                    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card favorite-card h-100 overflow-hidden shadow-lg">
                            <!-- Image with Parallax Effect -->
                            <div class="card-img-top position-relative overflow-hidden" style="height: 300px;">
                                <div class="parallax-img" style="background-image: url('{{ asset('storage/' . $favorit->gunung->gambar) }}');">
                                </div>
                                <div class="card-overlay"></div>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-danger px-3 py-2 rounded-pill shadow">
                                        <i class="bi bi-heart-fill me-1"></i> Favorit
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h3 class="h2 fw-bold">{{ $favorit->gunung->nama }}</h3>
                                    <div class="rating">
                                        <span class="text-warning">
                                            @for ($i = 1; $i <= 5; $i++) <i class="bi {{ $i <= $favorit->gunung->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                                @endfor
                                        </span>
                                        <span class="ms-1">({{ $favorit->gunung->rating }})</span>
                                    </div>
                                </div>

                                <p class="card-text mb-4">{{ Str::limit($favorit->gunung->deskripsi, 200) }}
                                </p>

                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge bg-light text-dark">
                                        <i class="bi bi-geo-alt me-1"></i> {{ $favorit->gunung->daerah }}
                                    </span>
                                    <span class="badge bg-light text-dark">
                                        <i class="bi bi-arrow-up me-1"></i> {{ $favorit->gunung->ketinggian }}
                                        mdpl
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-people-fill me-1"></i> {{ $favorit->total }} favorit
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section><!-- END FAVORITE SECTION -->

        <!-- TIPS SECTION -->
        <section id="faq" class="faq section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="content px-xl-5">
                            <h3><strong>Tips</strong></h3>
                            <h3><span>Pendaki </span></h3>
                            <p>
                                Berikut adalah beberapa pertanyaan yang sering diajukan tentang pendakian gunung-gunung
                                di Jawa Timur. Temukan tips dan saran untuk pengalaman pendakian yang aman dan
                                menyenangkan.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3><span class="num">1.</span> <span>Bagaimana cara mempersiapkan fisik untuk
                                        pendakian?</span></h3>
                                <div class="faq-content">
                                    <p>Latihan fisik secara teratur sebelum mendaki sangat penting. Fokus pada latihan
                                        kardio seperti jogging, bersepeda, atau berenang untuk meningkatkan daya tahan
                                        tubuh. Latihan kekuatan seperti squats dan lunges juga membantu mempersiapkan
                                        otot kaki untuk medan pendakian yang menantang.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">2.</span> <span>Peralatan apa saja yang harus dibawa saat
                                        mendaki?</span></h3>
                                <div class="faq-content">
                                    <p>Beberapa peralatan penting yang harus dibawa termasuk sepatu pendakian yang
                                        nyaman, pakaian yang sesuai cuaca, jaket tahan angin dan air, tenda, sleeping
                                        bag, matras, makanan dan minuman yang cukup, peta atau GPS, senter atau
                                        headlamp, dan kotak P3K.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">3.</span> <span>Bagaimana cara menjaga kelestarian alam selama
                                        pendakian?</span></h3>
                                <div class="faq-content">
                                    <p>Selalu bawa pulang sampah Anda, hindari mengambil atau merusak flora dan fauna,
                                        patuhi jalur pendakian yang telah ditentukan, dan hindari membuat api unggun di
                                        area yang tidak diizinkan. Dengan menjaga alam, kita turut serta dalam
                                        melestarikan keindahan gunung untuk generasi mendatang.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">4.</span> <span>Apa yang harus dilakukan jika cuaca buruk saat
                                        pendakian?</span></h3>
                                <div class="faq-content">
                                    <p>Jika cuaca buruk, seperti hujan lebat atau badai, segera mencari tempat berteduh
                                        yang aman. Hindari daerah yang rawan longsor atau banjir. Gunakan pakaian anti
                                        air dan tetap tenang. Jika cuaca tidak membaik, pertimbangkan untuk turun gunung
                                        demi keselamatan.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>
                </div>

            </div>

        </section><!-- END TIPS SECTION -->


        <!-- TEAM SECTION -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <h2>Developer</h2>
                <p>Developer Pengembangan Website AyoMuncak</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5 justify-content-center">

                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="{{ asset('assets/img/team/zahra.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href="https://www.instagram.com/azzahrahijriah?igsh=MTEwemllb2d4YzUwNw=="><i class="bi bi-instagram"></i></a>
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=azzahrahijriah1@gmail.com" target="_blank"><i class=" bi bi-envelope"></i></a>
                                <a href="https://www.linkedin.com/in/az-zahra-hijriah-7985a6237?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>Az Zahra Hijriah</h4>
                            <span>Project Manager & FE-BE</span>
                            <span>Universitas Amikom Yogyakarta</span>
                            <p>"Sometimes It's Okay To Be Sad After We Make Right Decisions"</p>
                        </div>
                    </div><!-- End Team Member -->
                </div>
            </div>
        </section><!-- END TEAM SECTION -->

        <!-- TESTIMONIALS SECTION -->
        <section id="testimonials" class="testimonials section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                        <h3>Pengalaman</h3>
                        <p>
                            Ini adalah testimoni pengalaman pendaki di gunung-gunung Jawa Timur.
                        </p>
                    </div>
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                                {
                                    "loop": true
                                    , "speed": 600
                                    , "autoplay": {
                                        "delay": 5000
                                    }
                                    , "slidesPerView": "auto"
                                    , "pagination": {
                                        "el": ".swiper-pagination"
                                        , "type": "bullets"
                                        , "clickable": true
                                    }
                                }

                            </script>
                            <div class="swiper-wrapper">
                                @foreach ($pengalamans as $exp)
                                <div class="swiper-slide" id="comment-{{ $exp->id_pengalaman }}">
                                    <div class="testimonial-item">
                                        <div class="d-flex align-items-center">
                                            <div class="comment-img">
                                                @if ($exp->user && $exp->user->avatar)
                                                <img src="{{ asset('storage/' . $exp->user->avatar) }}" alt="Avatar" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                                @else
                                                <i class="bi bi-person-circle" style="font-size: 2.5rem;"></i>
                                                @endif
                                            </div>
                                            <div style="margin-left: 15px;">
                                                <h3>{{ $exp->user->nama_lengkap ?? '-' }}</h3>
                                                <h4>{{ $exp->gunung->nama ?? '-' }}</h4>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>{{ $exp->deskripsi }}</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <p><i><time datetime="{{ $exp->tanggal }}">{{ \Carbon\Carbon::parse($exp->tanggal)->format('d M Y') }}</time></i>
                                        </p>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- END TESTIMONIALS SECTION -->


        <!-- CONTACT SECTION -->
        <section id="contact" class="testimonials section bg-light py-5">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Swiper Carousel -->
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                                {
                                    "loop": true
                                    , "speed": 600
                                    , "autoplay": {
                                        "delay": 5000
                                    }
                                    , "slidesPerView": 1
                                    , "pagination": {
                                        "el": ".swiper-pagination"
                                        , "type": "bullets"
                                        , "clickable": true
                                    }
                                }

                            </script>

                        
                            <div class="swiper-wrapper">
                                @foreach ($contactTours as $contact)
                                <div class="swiper-slide">
                                    <div class="card shadow-sm border-0 rounded p-4">
                                        <div class="card-body">
                                            <h4 class="card-title text-primary mb-2">{{ $contact->nama }}</h4>
                                            <p class="mb-1"><i class="bi bi-telephone-fill me-2 text-muted"></i> {{ $contact->nohp }}</p>
                                            <p class="mb-1"><i class="bi bi-envelope-fill me-2 text-muted"></i> {{ $contact->email }}</p>

                                            @if($contact->instagram && $contact->instagram !== '-')
                                            <p class="mb-1">
                                                <i class="bi bi-instagram me-2 text-danger"></i>
                                                <a href="https://www.instagram.com/{{ $t->instagram }}" target="_blank">
                                                    {{ '@' . $t->instagram }}
                                                </a>
                                            </p>
                                            @endif

                                            @if($contact->facebook && $contact->facebook !== '-')
                                            <p class="mb-1">
                                                <i class="bi bi-facebook me-2 text-primary"></i>
                                                <a href="{{ $t->facebook }}" target="_blank">
                                                    {{ $t->facebook }}
                                                </a>
                                            </p>
                                            @endif

                                            @if($contact->tiktok && $contact->tiktok !== '-')
                                            <p class="mb-1">
                                                <i class="bi bi-tiktok me-2 text-dark"></i>
                                                <a href="{{ 'https://www.tiktok.com/@' . $t->tiktok }}" target="_blank">
                                                    {{ '@' . $t->tiktok }}
                                                </a>
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination mt-3"></div>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="col-lg-4 info" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="mb-3">Kontak Tour</h3>
                        <p>Hubungi Tour wisata untuk informasi lebih lanjut mengenai pendakian dan tour.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END CONTACT SECTION -->
    </main>

    <!-- FOOTER SECTION -->
    <footer id="footer" class="footer position-relative">

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="sitename">AyoMuncak</strong> <span>All Rights Reserved</span>
            </p>
        </div>

    </footer><!-- END FOOTER SECTION -->

    <!-- SCROLL -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- PRELOADER -->
    <div id="preloader"></div>


    <!-- SCRIPT -->
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- MAIN JS FILE -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script>
        // Parallax Effect
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.favorite-card');

            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const x = e.clientX - card.getBoundingClientRect().left;
                    const y = e.clientY - card.getBoundingClientRect().top;

                    const centerX = card.offsetWidth / 2;
                    const centerY = card.offsetHeight / 2;

                    const moveX = (x - centerX) / 20;
                    const moveY = (y - centerY) / 20;

                    const img = card.querySelector('.parallax-img');
                    img.style.transform = `scale(1.1) translate(${moveX}px, ${moveY}px)`;
                });

                card.addEventListener('mouseleave', () => {
                    const img = card.querySelector('.parallax-img');
                    img.style.transform = 'scale(1.1) translate(0, 0)';
                });
            });
        });

    </script>

</body>

</html>
