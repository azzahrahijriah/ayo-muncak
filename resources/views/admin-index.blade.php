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
                <div class=" menu-inner-shadow">
                </div>
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
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Gunung</h5>
                                        <p class="card-text">{{ $totalGunung }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Pengalaman</h5>
                                        <p class="card-text">{{ $totalPengalaman }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Tour</h5>
                                        <p class="card-text">{{ $totalTour }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div class="footer-to-top d-flex justify-content-center">
                                <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary">
                                    <i class="bx bx-up-arrow-alt"></i>
                                </a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                </div>
                <!-- / Content wrapper -->
            </div>
        </div>
    </div>
    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <script src="{{ asset('asset/js/dashboards-analytics.js') }}"></script>
</body>

</html>