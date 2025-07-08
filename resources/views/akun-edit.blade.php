<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>User</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/favicon/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('asset/js/config.js') }}"></script>
        <!-- Main CSS File -->
        <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-card {
            width: 100%;
            max-width: 600px; 
        }
    </style>
</head>

<body>
  <header id    = "header"~ class = "header d-flex align-items-center fixed-top">
    <div    class = "container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href = "index.html" class = "logo d-flex align-items-center me-auto me-xl-0">
                <h1 class = "sitename">AyoMuncak</h1><span>.</span>
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

    
   <!-- FORM EDIT USER -->
<div class="form-container">
  <div class="card form-card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Edit Pengguna</h5>
      <small class="text-muted float-end">Pengguna AyoMuncak</small>
    </div>
    <div class="card-body">
      <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
        {{-- Username --}}
        <div class="mb-3">
          <label class="form-label" for="username">Username</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text">@</span>
            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror"
              value="{{ old('username', $user->username) }}" required />
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      
        {{-- Password (Opsional) --}}
        <div class="mb-3">
          <label class="form-label" for="password">Password (Kosongkan jika tidak ingin mengganti)</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bi bi-key"></i></span>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
              placeholder="Password baru (opsional)" />
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      
        {{-- Nama Lengkap --}}
        <div class="mb-3">
          <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
            <input type="text" id="nama_lengkap" name="nama_lengkap"
              class="form-control @error('nama_lengkap') is-invalid @enderror"
              value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required />
            @error('nama_lengkap')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      
        {{-- Avatar --}}
        <div class="mb-3">
          <label class="form-label" for="avatar">Foto Profil</label>
          <input type="file" id="avatar" name="avatar"
            class="form-control @error('avatar') is-invalid @enderror" accept="image/*" />
          @if ($user->avatar)
            <small class="d-block mt-1">Saat ini: <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="50"></small>
          @endif
          @error('avatar')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      
        {{-- Bio --}}
        <div class="mb-3">
          <label class="form-label" for="bio">Bio</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
            <textarea id="bio" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="3">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      
        {{-- Instagram --}}
        <div class="mb-3">
          <label class="form-label" for="instagram">Instagram</label>
          <input type="text" id="instagram" name="instagram"
            class="form-control @error('instagram') is-invalid @enderror"
            value="{{ old('instagram', $user->instagram) }}" placeholder="contoh: @akun_ig" />
          @error('instagram')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      
        {{-- TikTok --}}
        <div class="mb-3">
          <label class="form-label" for="tiktok">TikTok</label>
          <input type="text" id="tiktok" name="tiktok"
            class="form-control @error('tiktok') is-invalid @enderror"
            value="{{ old('tiktok', $user->tiktok) }}" placeholder="contoh: @akun_tiktok" />
          @error('tiktok')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      
        {{-- YouTube --}}
        <div class="mb-3">
          <label class="form-label" for="youtube">YouTube</label>
          <input type="text" id="youtube" name="youtube"
            class="form-control @error('youtube') is-invalid @enderror"
            value="{{ old('youtube', $user->youtube) }}" placeholder="URL Channel YouTube" />
          @error('youtube')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      
        {{-- Tombol Submit --}}
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
      
    </div>
  </div>
</div>

    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
