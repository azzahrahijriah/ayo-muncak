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

    <!-- Leafletjs -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <link href="{{ asset('assets/css/second.css') }}" rel="stylesheet">
</head>


<body class="blog-details-page">
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

        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1><a href="{{ route('gunung.show', $gunung->id) }}">{{ $gunung->nama }}</a></h1>
                            <p class="mb-0">Detail Gunung {{ $gunung->nama }} dirancang untuk memberikan informasi
                                yang lebih mendetail mengenai gunung {{ $gunung->nama }}, seperti tinggi, lokasi
                                geografis, deskripsi, dan informasi terkait lainnya. .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mx-auto"> <!-- Tambahkan kelas mx-auto di sini -->

                    <!-- Blog Details Section -->
                    <div id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">

                                <div class="post-img text-center">
                                    <a href="{{ route('gunung.show', $gunung->id) }}">
                                        <img src="{{ asset('storage/' . $gunung->gambar) }}" alt="{{ $gunung->nama }}"
                                            class="img-fluid">
                                    </a>
                                </div>

                                <h2 class="title text-left" id="content">Deskripsi</h2>
                                <p class="post-category">{{ $gunung->ketinggian }} Mdpl</p>
                                <div class="post-meta">
                                    <p class="post"> {{ $gunung->rating }}
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

                                <div class="meta-top text-center">
                                    <ul>
                                        <li class="d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box-seam"></i>
                                            <span class="ms-1">{{ $jumlahTour }} Paket Tour</span>
                                        </li>
                                        <li class="d-flex align-items-center justify-content-center">
                                            <i class="bi bi-heart-fill text-danger"></i>
                                            <span class="ms-1">{{ $favoritCount }} Disukai</span>
                                        </li>
                                    </ul>
                                </div>
                                

                                <div class="content text-left">
                                    <p>{{ $gunung->deskripsi }}</p>
                                </div>

                                <!-- Bagian HTML untuk Map -->
                                <h2 class="title text-left">Lokasi</h2>

                                <!-- Map Controls -->
                                <div class="map-controls mb-3">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-outline-warning btn-sm"
                                            onclick="changeMapLayer('street')">
                                            <i class="bi bi-map"></i> Street
                                        </button>
                                        <button type="button" class="btn btn-outline-warning btn-sm"
                                            onclick="changeMapLayer('satellite')">
                                            <i class="bi bi-globe"></i> Satelit
                                        </button>
                                        <button type="button" class="btn btn-outline-warning btn-sm"
                                            onclick="getCurrentLocation()">
                                            <i class="bi bi-geo-alt"></i> Lokasi Saya
                                        </button>
                                    </div>
                                </div>

                                <!-- Map Container dengan styling yang lebih menarik -->
                                <div class="map-wrapper"
                                    style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative;">
                                    <div id="map" style="height:450px; position: relative;"></div>

                                    <!-- Loading indicator -->
                                    <div id="map-loading"
                                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); 
                                        background: rgba(255,255,255,0.9); padding: 20px; border-radius: 10px; display: none;">
                                        <div class="text-center">
                                            <div class="spinner-border text-primary" role="status"></div>
                                            <p class="mt-2 mb-0">Memuat peta...</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Info Panel -->
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="card border-0 shadow-sm" id="koordinat-card"
                                            style="cursor: pointer;">
                                            <div class="card-body">
                                                <h6 class="card-title">
                                                    <i class="bi bi-geo-alt-fill text-danger"></i> Koordinat
                                                    <small class="text-muted float-end">
                                                        <i class="bi bi-arrow-return-left"></i> Klik untuk kembali
                                                    </small>
                                                </h6>
                                                <p class="card-text mb-1">
                                                    <small class="text-muted">Latitude:</small> <span
                                                        id="lat-display"></span><br>
                                                    <small class="text-muted">Longitude:</small> <span
                                                        id="lng-display"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body">
                                                <h6 class="card-title"><i class="bi bi-rulers text-success"></i> Jarak
                                                    dari Lokasi Anda</h6>
                                                <p class="card-text" id="distance-info">
                                                    <small class="text-muted">Klik "Lokasi Saya" untuk mengetahui
                                                        jarak</small>
                                                </p>

                                                <div class="mb-3">
                                                    <button onclick="getCurrentLocation()"
                                                        class="btn btn-outline-warning">
                                                        <i class="bi bi-crosshair"></i> Lokasi Saya
                                                    </button>
                                                </div>

                                                <div id="map-loading" style="display: none;">
                                                    <div class="alert alert-info"><i class="bi bi-clock-history"></i>
                                                        Memuat lokasi...</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @auth('web')
                                    @php
                                        $favorit = \App\Models\FavoritGunung::where('id_user', auth('web')->id()
                                        )
                                                    ->where('id_gunung', $gunung->id)
                                                    ->first();
                                    @endphp

                                    @if ($favorit)
                                        <form action="{{ route('gunung.favorit.hapus', $gunung->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mb-3">
                                                <i class="bi bi-heartbreak"></i> Hapus dari Favorit
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('gunung.favorit', $gunung->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-warning mb-3">
                                                <i class="bi bi-heart-fill"></i> Simpan Gunung Favorit
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <div class="alert alert-light text-center mb-3">
                                        <i class="bi bi-heart"></i> <a href="{{ route('login') }}">Login</a> untuk simpan gunung ke daftar favoritmu.
                                    </div>
                                @endauth



                                <h2 class="title text-left">Jalur Pendakian</h2>
                                <ul class="custom-list">
                                    @php
                                        $jalurArray = explode(',', $gunung->jalur);
                                    @endphp
                                    @foreach ($jalurArray as $jalur)
                                        <li><i class="bi bi-check-circle custom-icon"></i>
                                            <span>{{ trim($jalur) }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                @auth('web')
                                <div class="weather-forecast-container">
                            
                                    <div class="weather-header">
                                        <h2 class="weather-title">🌤️ Prakiraan Cuaca 
                                            <a class="weather-title" href="{{ route('gunung.show', $gunung->id) }}">
                                                {{ $gunung->nama }}
                                            </a>
                                        </h2>
                                        <p class="weather-subtitle">Detail prakiraan cuaca 3 jam per periode untuk 5 hari ke depan</p>
                                    </div>
                            
                                    <div class="weather-content">
                                        <div class="info-box">
                                            <div class="info-title">💡 Klik Untuk Melihat Detail</div>
                                            <div class="info-text">
                                                Anda dapat mengklik kolom jam, suhu atau icon cuaca di bawah ini untuk
                                                mendapatkan informasi lebih detail per periode 3 jam.
                                            </div>
                                        </div>
                                        @php
                                            $groupedByDate = collect($forecast['hourly'])->groupBy(function ($item) {
                                                return date('l, d M Y', $item['dt']);
                                            });
                                        @endphp
                            
                                        @foreach ($groupedByDate as $date => $items)
                                            <div class="day-section">
                                                <div class="day-header">
                                                    📅 {{ $date }}
                                                </div>
                                                <div class="hourly-grid">
                                                    @foreach ($items as $item)
                                                        @php
                                                            $temp = round($item['main']['temp']);
                                                            $tempClass =
                                                                $temp >= 25
                                                                    ? 'temp-hot'
                                                                    : ($temp >= 20
                                                                        ? 'temp-warm'
                                                                        : ($temp >= 15
                                                                            ? 'temp-cool'
                                                                            : 'temp-cold'));
                                                            $tempEmoji = $temp >= 20 ? '🔥' : ($temp >= 15 ? '☀️' : '❄️');
                                                        @endphp
                                                        <div class="hour-card"
                                                            onclick="showWeatherDetail('{{ $date }}', '{{ date('H:i', $item['dt']) }}', {{ $temp }}, '{{ $item['weather'][0]['description'] }}', '{{ $item['weather'][0]['main'] }}')">
                                                            <div class="hour-time">{{ date('H:i', $item['dt']) }}</div>
                                                            <div class="hour-temp">
                                                                {{ $temp }}°C
                                                                <span class="temp-badge {{ $tempClass }}">
                                                                    {{ $tempEmoji }}
                                                                </span>
                                                            </div>
                                                            <img src="https://openweathermap.org/img/wn/{{ $item['weather'][0]['icon'] }}@2x.png"
                                                                alt="{{ $item['weather'][0]['description'] }}"
                                                                class="weather-icon">
                                                            <div class="weather-desc">
                                                                {{ $item['weather'][0]['description'] }}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach

                                    <!-- Weather Modal -->
                                    <div id="weatherModal" class="weather-modal">
                                        <div class="weather-modal-content">
                                            <div class="weather-modal-header">
                                                <button class="weather-close"
                                                    onclick="closeWeatherModal()">&times;</button>
                                                <h4><i class="bi bi-mountain"></i>Prakiraan Cuaca <a
                                                        href="{{ route('gunung.show', $gunung->id) }}">{{ $gunung->nama }}</a>
                                                </h4>
                                                <div class="temp-display" id="modal-temp"></div>
                                            </div>
                                            <div class="weather-modal-body">
                                                <div class="weather-section">
                                                    <h6><i class="bi bi-calendar3"></i> Informasi Waktu</h6>
                                                    <div class="weather-item">
                                                        <i class="bi bi-calendar-day text-primary"></i>
                                                        <span id="modal-day"></span>
                                                    </div>
                                                    <div class="weather-item">
                                                        <i class="bi bi-clock text-success"></i>
                                                        <span id="modal-time"></span>
                                                    </div>
                                                    <div class="weather-item">
                                                        <i class="bi bi-cloud-sun text-warning"></i>
                                                        <span id="modal-condition"></span>
                                                    </div>
                                                </div>

                                                <div class="weather-section weather-equipment">
                                                    <h6><i class="bi bi-backpack"></i> SARAN PERLENGKAPAN</h6>
                                                    <div id="modal-equipment"></div>
                                                </div>

                                                <div class="weather-section weather-advice">
                                                    <h6><i class="bi bi-exclamation-triangle"></i> CATATAN CUACA</h6>
                                                    <div id="modal-advice"></div>
                                                </div>

                                                <div class="weather-section weather-tips">
                                                    <h6><i class="bi bi-lightbulb"></i> TIPS PENDAKIAN</h6>
                                                    <div class="weather-item">
                                                        <i class="bi bi-check-circle"></i>
                                                        <span>Selalu cek cuaca terbaru sebelum mendaki</span>
                                                    </div>
                                                    <div class="weather-item">
                                                        <i class="bi bi-check-circle"></i>
                                                        <span>Bawa perlengkapan cadangan</span>
                                                    </div>
                                                    <div class="weather-item">
                                                        <i class="bi bi-check-circle"></i>
                                                        <span>Informasikan rencana perjalanan ke orang terdekat</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>

                            @else
                            <div class="weather-header">
                                <h2 class="weather-title">🌤️ Prakiraan Cuaca <a class="weather-title"
                                        href="{{ route('gunung.show', $gunung->id) }}">{{ $gunung->nama }}</a>
                                </h2>
                                <p class="weather-subtitle">Detail prakiraan cuaca 3 jam per periode untuk 5 hari
                                    ke depan</p>
                            </div>

                            <div class="weather-content">
                                <div class="info-box">
                                    <a class="info-title" href="{{ route('login') }}">💡 Login Untuk Melihat Prakiraan Cuaca</a>
                                </div>
                            @endauth

                        </div>

                    </article>

                </div>
            </div><!-- /Blog Details Section -->

        </div>
        </div>
        </div>

        </div><!-- End post content -->
        </article>
        </div>
        </div><!-- /Blog Details Section -->


        <!-- Blog Comments Section -->
        <section id="blog-comments" class="blog-comments section">
            <div class="container">
                <h4 class="comments-count">{{ count($pengalaman) }} Pengalaman</h4>

                @foreach ($pengalaman as $exp)
                    <div id="comment-{{ $exp->id_pengalaman }}" class="comment">
                        <div class="d-flex">
                            <div class="comment-img">
                                @if ($exp->user && $exp->user->avatar)
                                    <img src="{{ asset('storage/' . $exp->user->avatar) }}" alt="Avatar" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                @else
                                    <i class="bi bi-person-circle" style="font-size: 2.5rem;"></i>
                                @endif
                            </div>
                            
                            <div>
                                <h5>
                                    <a href="#">{{ $exp->user->username ?? 'User tidak diketahui' }}</a>
                                    <br>
                                    <small>{{ $exp->user->nama_lengkap ?? '-' }}</small>
                                </h5>
                                <time datetime="{{ $exp->tanggal }}">{{ \Carbon\Carbon::parse($exp->tanggal)->format('d M Y') }}</time>
                                <p>{{ $exp->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- Comment Form Section -->
        <section id="comment-form" class="comment-form section">
            <div class="container">
                @auth('web')
                <form action="{{ route('pengalaman.store', $gunung->id) }}" method="POST">
                        @csrf
                        <h4>Isi Pengalaman</h4>

                        <!-- Hanya tampilkan nama gunung -->
                        <div class="col-md-6 form-group">
                            <label style="font-weight: bold;">Gunung</label>
                            <input type="text" value="{{ $gunung->nama }}" readonly class="form-control">
                        </div>


                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label style="font-weight: bold;">Tanggal Pendakian</label>
                                <input type="date" name="tanggal_pendakian" class="form-control" placeholder="Tanggal Pendakian" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label style="font-weight: bold;">Sampai Puncak?</label>
                                <select name="sampai_puncak" class="form-control" required>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label style="font-weight: bold;">Tingkat Kesulitan</label>
                                <select name="tingkat_kesulitan" class="form-control" required>
                                    <option value="Ringan">Ringan</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Lupa">Sulit</option>
                                    <option value="Lupa">Lupa</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label style="font-weight: bold;">Resiko Pendakian</label><br>
                                @php
                                    $risiko = [
                                        'Terjatuh', 'Kedinginan', 'Tersesat', 'Longsoran Batu',
                                        'Gas Beracun', 'Binatang Buas', 'Keamanan Pendakian', 'Cuaca Tidak Menentu'
                                    ];
                                @endphp
                                @foreach($risiko as $item)
                                    <input type="checkbox" name="resiko_pendakian[]" value="{{ $item }}"> {{ $item }}<br>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label style="font-weight: bold;">Catatan</label>
                                <input type="text" name="catatan" class="form-control" placeholder="Catatan" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                @else
                    <div class="alert alert-info text-center">
                        <h5>📝 Tulis Pengalaman Pendakian</h5>
                        <p>Login terlebih dahulu untuk mengisi pengalaman mendaki.</p>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login Sekarang</a>
                    </div>
                @endauth
            </div>
        </section>



        <!-- Tour Information Section -->
        <section id="tour-information" class="blog-comments section">
            <div class="container">
                <h4 class="comments-count">{{ count($tour) }} Informasi Tour</h4>

                @foreach ($tour as $t)
                    <div id="comment-{{ $t->id_tour }}" class="comment">
                        <div class="d-flex">
                            <div class="comment-img"><i class="bi bi-person-walking" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <h5>{{ $t->nama }}</h5>
                                <p>Nomor HP: {{ $t->nohp }}</p>
                                <p>Email: {{ $t->email }}</p>
                                <p>Instagram: {{ $t->instagram }}</p>
                                <p>Facebook: {{ $t->facebook }}</p>
                                <p>TikTok: {{ $t->tiktok }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Form untuk Menambahkan Informasi Tour -->
        <section id="comment-form" class="comment-form section">
            <div class="container">
                <form action="{{ route('tour.store', $gunung->id) }}" method="POST">
                    @csrf
                    <h4>Tambahkan Informasi Tour</h4>
                    <p>Jika tidak ada cukup diisi (-)</p>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="nama" type="text" class="form-control" placeholder="Nama*" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="nohp" type="text" class="form-control" placeholder="Nomor HP*"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="instagram" type="text" class="form-control" placeholder="Instagram">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="facebook" type="text" class="form-control" placeholder="Facebook">
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="tiktok" type="text" class="form-control" placeholder="Tiktok">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </section><!-- /Form untuk Menambahkan Informasi Tour -->
        </div>

    </main>

    <footer id="footer" class="footer position-relative">

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="sitename">AyoMuncak</strong> <span>All Rights Reserved</span>
            </p>
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

    <!-- Enhanced Leafletjs Script -->
    <script>
        var map;
        var currentLayer;
        var userMarker;
        var mountainMarker;
        var routeLine;

        // Data gunung dari PHP
        var latitude = <?php echo json_encode($gunung->latitude); ?>;
        var longitude = <?php echo json_encode($gunung->longitude); ?>;
        var gunungNama = "{{ $gunung->nama }}";
        var gunungKetinggian = "{{ $gunung->ketinggian }}";

        // Definisi berbagai layer peta
        var mapLayers = {
            street: L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }),
            satellite: L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    attribution: '&copy; <a href="https://www.arcgis.com/">ArcGIS</a>'
                }),
            terrain: L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://opentopomap.org/">OpenTopoMap</a>'
            })
        };

        // Inisialisasi peta
        function initializeMap() {
            // Show loading
            document.getElementById('map-loading').style.display = 'block';

            // Inisialisasi peta dengan zoom 13
            map = L.map('map', {
                zoomControl: false // Remove default zoom control
            }).setView([latitude, longitude], 13);

            // Add custom zoom control di kanan bawah
            L.control.zoom({
                position: 'bottomright'
            }).addTo(map);

            // Set default layer
            currentLayer = mapLayers.street;
            currentLayer.addTo(map);

            // Create custom mountain icon
            var mountainIcon = L.divIcon({
                html: '<div style="background: linear-gradient(45deg, #e74c3c, #c0392b); color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(231,76,60,0.4); border: 2px solid white;"><i class="bi bi-mountain" style="font-size: 14px;"></i></div>',
                iconSize: [30, 30],
                className: 'custom-mountain-marker'
            });

            // Menambahkan marker gunung dengan popup yang lebih menarik
            mountainMarker = L.marker([latitude, longitude], {
                icon: mountainIcon
            }).addTo(map);

            var popupContent = `
            <div class="custom-marker-popup">
                <h5><i class="bi bi-mountain"></i> ${gunungNama}</h5>
                <p><i class="bi bi-rulers"></i> Ketinggian: ${gunungKetinggian} Mdpl</p>
                <p><i class="bi bi-geo-alt"></i> ${latitude}, ${longitude}</p>
                <hr style="margin: 8px 0;">
                <small class="text-muted">Klik peta untuk melihat koordinat</small>
            </div>
        `;

            document.getElementById('koordinat-card')?.addEventListener('click', function() {
                if (mountainMarker && map) {
                    map.setView([latitude, longitude], 15);
                    mountainMarker.openPopup();
                }
            });

            mountainMarker.bindPopup(popupContent, {
                maxWidth: 250,
                closeButton: true
            }).openPopup();

            // Add circle around mountain untuk highlight area
            L.circle([latitude, longitude], {
                color: '#e74c3c',
                fillColor: '#e74c3c',
                fillOpacity: 0.1,
                radius: 3000,
                weight: 2,
                dashArray: '5, 5'
            }).addTo(map);

            // Update coordinate display
            updateCoordinateDisplay();

            // Add map click event untuk menampilkan koordinat
            map.on('click', function(e) {
                var clickedLat = e.latlng.lat.toFixed(6);
                var clickedLng = e.latlng.lng.toFixed(6);

                L.popup()
                    .setLatLng(e.latlng)
                    .setContent(`
                    <div style="text-align: center;">
                        <strong>Koordinat:</strong><br>
                        ${clickedLat}, ${clickedLng}
                    </div>
                `)
                    .openOn(map);
            });

            // Hide loading when map is ready
            map.whenReady(function() {
                setTimeout(() => {
                    document.getElementById('map-loading').style.display = 'none';
                }, 500);
            });
        }

        // Fungsi untuk mengganti layer peta
        function changeMapLayer(layerType) {
            if (currentLayer) {
                map.removeLayer(currentLayer);
            }

            currentLayer = mapLayers[layerType];
            currentLayer.addTo(map);

            // Update active button
            document.querySelectorAll('.btn-group .btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        // Fungsi untuk mendapatkan lokasi user
        function getCurrentLocation() {
            if (navigator.geolocation) {
                document.getElementById('map-loading').style.display = 'block';

                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLat = position.coords.latitude;
                    var userLng = position.coords.longitude;

                    // Remove existing user marker and route
                    if (userMarker) {
                        map.removeLayer(userMarker);
                    }
                    if (routeLine) {
                        map.removeLayer(routeLine);
                    }

                    // Create user location icon
                    var userIcon = L.divIcon({
                        html: '<div style="background: linear-gradient(45deg, #3498db, #2980b9); color: white; width: 25px; height: 25px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(52,152,219,0.4); border: 2px solid white;"><i class="bi bi-person-fill" style="font-size: 12px;"></i></div>',
                        iconSize: [25, 25],
                        className: 'custom-user-marker'
                    });

                    // Add user marker
                    userMarker = L.marker([userLat, userLng], {
                        icon: userIcon
                    }).addTo(map);
                    userMarker.bindPopup('<div style="text-align: center;"><strong>Lokasi Anda</strong></div>');

                    // Calculate distance
                    var distance = calculateDistance(userLat, userLng, latitude, longitude);

                    // Add route line
                    routeLine = L.polyline([
                        [userLat, userLng],
                        [latitude, longitude]
                    ], {
                        color: '#3498db',
                        weight: 3,
                        opacity: 0.7,
                        dashArray: '10, 10'
                    }).addTo(map);

                    // Fit map to show both markers
                    var group = new L.featureGroup([userMarker, mountainMarker]);
                    map.fitBounds(group.getBounds().pad(0.1));

                    // Update distance info
                    document.getElementById('distance-info').innerHTML = `
                    <span class="text-success">
                        <i class="bi bi-check-circle"></i> 
                        Jarak: <strong>${distance.toFixed(2)} km</strong>
                    </span>
                `;

                    document.getElementById('map-loading').style.display = 'none';

                }, function(error) {
                    document.getElementById('map-loading').style.display = 'none';
                    alert('Tidak dapat mengakses lokasi: ' + error.message);
                });
            } else {
                alert('Geolocation tidak didukung oleh browser ini.');
            }
        }

        // Fungsi untuk menghitung jarak
        function calculateDistance(lat1, lng1, lat2, lng2) {
            var R = 6371; // Earth's radius in km
            var dLat = (lat2 - lat1) * Math.PI / 180;
            var dLng = (lng2 - lng1) * Math.PI / 180;
            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLng / 2) * Math.sin(dLng / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c;
        }

        // Update coordinate display
        function updateCoordinateDisplay() {
            document.getElementById('lat-display').textContent = latitude;
            document.getElementById('lng-display').textContent = longitude;
        }

        // Initialize map when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initializeMap();
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (map) {
                setTimeout(() => map.invalidateSize(), 100);
            }
        });
    </script>

    <script>
        function showWeatherDetail(day, time, temp, conditionDesc, conditionMain) {
            document.getElementById('modal-day').textContent = day;
            document.getElementById('modal-time').textContent = time;
            document.getElementById('modal-temp').textContent = `${temp}°C`;
            document.getElementById('modal-condition').textContent = `${conditionMain} - ${conditionDesc}`;

            // Tambahkan logika saran perlengkapan dan catatan cuaca berdasarkan kondisi
            let equipment = '';
            let advice = '';

            if (temp < 15) {
                equipment = 'Jaket tebal, sarung tangan, dan pelindung hujan';
                advice = 'Waspadai suhu rendah. Risiko hipotermia meningkat.';
            } else if (temp < 25) {
                equipment = 'Jas hujan ringan, pakaian berlapis';
                advice = 'Cuaca relatif sejuk, tetap siapkan perlengkapan darurat.';
            } else {
                equipment = 'Pakaian ringan, kacamata hitam, topi';
                advice = 'Cuaca panas. Jaga hidrasi dan gunakan pelindung matahari.';
            }

            document.getElementById('modal-equipment').textContent = equipment;
            document.getElementById('modal-advice').textContent = advice;

            // Tampilkan modal
            document.getElementById('weatherModal').style.display = 'block';
        }

        function closeWeatherModal() {
            document.getElementById('weatherModal').style.display = 'none';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</body>

</html>
