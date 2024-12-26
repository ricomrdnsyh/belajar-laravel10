<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>SMPromedia</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('templates/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('templates/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('templates/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('templates/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->
	<link rel="stylesheet" href="{{ asset('templates/assets/css/demo1/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('templates/assets/images/favicon.png') }}" />

  @yield('css')
</head>
<body>
	<div class="main-wrapper">
		<!-- Sidebar -->
		<nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">SM<span>Promedia</span></a>
                    <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('admindashboard') }}" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">master</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#dataMaster" role="button" aria-expanded="false" aria-controls="dataMaster">
                          <i class="link-icon" data-feather="archive"></i>
                          <span class="link-title">Data Master</span>
                          <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="dataMaster">
                          <ul class="nav sub-menu">
                            @can('view_multimedia')
                            <li class="nav-item">
                                <a href="{{ route('adminmultimedia') }}" class="nav-link">Data Tim Multimedia</a>
                            </li>
                            @endcan
                            @can('view_user')
                            <li class="nav-item">
                                <a href="{{ route('adminuser') }}" class="nav-link"> Data User</a>
                            </li>
                            @endcan
                          </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Settings</li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="link-icon" data-feather="log-out"></i>
                            <span class="link-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
		<!-- End Sidebar -->

        <div class="page-wrapper">
            <!-- Navbar -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <form class="search-form">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">Amiah Burton</p>
                                        <p class="tx-12 text-muted">amiahburton@gmail.com</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                        <a href="pages/general/profile.html" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="{{ route('logout') }}" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- Content -->
            @yield('content')
            <!-- End Content -->

            <!-- footer -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
            </footer>
            <!-- End Footer -->

	    </div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('templates/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
    <script src="{{ asset('templates/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('templates/assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('templates/assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('templates/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('templates/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('templates/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('templates/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
    <script src="{{ asset('templates/assets/js/dashboard-light.js') }}"></script>
    <script src="{{ asset('templates/assets/js/datepicker.js') }}"></script>
	<!-- End custom js for this page -->

    <!-- Sweet Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
            title: "Good job!",
            text: "{{ $message }}",
            icon: "success"
});
        </script>
    @endif
    @if ($message = Session::get('failed'))
        <script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $message }}",
            });
        </script>
    @endif
    <!-- End Sweet Alerts -->

    @yield('scripts')


</body>
</html>
