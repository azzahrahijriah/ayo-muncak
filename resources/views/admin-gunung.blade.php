<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-asset-path="{{ asset('asset/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard Admin</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/favicon/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/apex-charts/apex-charts.css') }}" />
    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('asset/js/config.js') }}"></script>

    <style>
        .table .column-jalur {
            max-width: 150px;
            /* Atur lebar kolom sesuai kebutuhan */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .kolom {
    width: 300px;
    white-space: nowrap; /* Agar tidak pecah baris */
    overflow: hidden;
    text-overflow: ellipsis; /* Tambahkan jika ingin "..." saat terlalu panjang */
}
.kolom-no {
    width: 10px;
    white-space: nowrap; /* Agar tidak pecah baris */
    overflow: hidden;
    text-overflow: ellipsis; /* Tambahkan jika ingin "..." saat terlalu panjang */
}



    </style>

</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('beranda') }}" class="app-brand-link">
                        <h3 class="mb-4">AyoMuncak.</h3>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item {{ request()->routeIs('admin.index') ? 'active open' : '' }}">
                        <a href="{{ route('admin.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboards">Dashboard Admin</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('admin.gunung.index') ? 'active open' : '' }}">
                        <a href="{{ route('admin.gunung.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-table"></i>
                            <div data-i18n="Tables">Data Gunung</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('admin.pengalaman.*') ? 'active open' : '' }}">
                        <a href="{{ route('admin.pengalaman.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-list-check"></i>
                            <div data-i18n="Experiences">Data Pengalaman</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('admin.tour.*') ? 'active open' : '' }}">
                        <a href="{{ route('admin.tour.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Tours">Data Tour</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('admin.user.index') ? 'active open' : '' }}">
                        <a href="{{ route('admin.user.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Tables">Data User</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-fluid flex-grow-2 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Gunung</h4>

                        <!-- Tambah Gunung Button -->
                        <a href="{{ route('admin.gunung.create') }}" class="btn btn-primary">Tambah</a>

                        <!-- Striped Rows -->
                        <div class="card custom-card">
                            <h5 class="card-header">Data Gunung</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped" style="table-layout: fixed;">

                                    <thead>
                                        <tr>
                                            <th class="kolom-no">No</th>
                                            <th>Nama Gunung</th>
                                            <th class="kolom">Daerah</th>
                                            <th>Ketinggian</th>
                                            <th class="kolom">Deskripsi</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Jalur</th>
                                            <th>Rating</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($gunungs as $index => $gunung)
                                        <tr>
                                            <td class="kolom-no">{{ $index + 1}}</td>
                                            <td>{{ $gunung->nama }}</td>
                                            <td class="kolom">{{ $gunung->daerah }}</td>
                                            <td>{{ number_format($gunung->ketinggian, 3, ',', '.') }} Mdpl</td>
                                            <td class="kolom">{{ Str::limit($gunung->deskripsi, 50) }}</td>
                                            <td>{{ number_format($gunung->latitude, 9) }}</td>
                                            <td>{{ number_format($gunung->longitude, 7) }}</td>
                                            <td class="column-jalur">
                                                @if($gunung->jalur)
                                                <ul>
                                                    @foreach(explode(',', $gunung->jalur) as $jalur)
                                                    <li>{{ trim($jalur) }}</li>
                                                    @endforeach
                                                </ul>
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                            <td>{{ $gunung->rating ? $gunung->rating : 'N/A' }}</td>
                                            <td>
                                                @if ($gunung->gambar)
                                                <img src="{{ asset('storage/' . $gunung->gambar) }}" alt="{{ $gunung->nama }}" class="img-fluid" style="max-height: 150px; object-fit: cover;">
                                                @else
                                                <p>No Image</p>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('admin.gunung.edit', $gunung->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <form action="{{ route('admin.gunung.destroy', $gunung->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Striped Rows -->
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>