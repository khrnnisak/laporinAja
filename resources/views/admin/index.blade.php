@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumb')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Beranda</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Beranda Admin</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link text-white font-weight-bold px-0" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt me-sm-1"></i>
                                {{ __('Keluar') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    @endsection

    @section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah User</p>
                                    <h2 class="font-weight-bolder">{{ $users }}</h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Laporan Masuk</p>
                                    <h2 class="font-weight-bolder">{{$masuk}}</h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-email-83 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sedang Diproses</p>
                                    <h2 class="font-weight-bolder">{{$proses}}</h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-settings text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Laporan Selesai</p>
                                    <h2 class="font-weight-bolder">{{$selesai}}</h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Selamat Datang!</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="inside">
                            <div class="content" style="margin-top: 40px; width: auto; height: auto; text-align: center;">
                                <p class="days" style="font-size: 1.3rem; ">
                                    <span id="sun">SUN</span>&ensp;
                                    <span id="mon">MON</span>&ensp;
                                    <span id="tue">TUE</span>&ensp;
                                    <span id="wed">WED</span>&ensp;
                                    <span id="thu">THU</span>&ensp;
                                    <span id="fri">FRI</span>&ensp;
                                    <span id="sat">SAT</span>
                                </p>
                                <br>
                                <p class="text" style="font-size: 2.5rem; font-weight:bold;">
                                    <span id="hours"></span> :
                                    <span id="min"></span> :
                                    <span id="sec"></span>
                                    <span id="time"></span>
                                </p>
                                <p id="date">
                                    <span id="cal">
                                        <i class="fa fa-calendar-alt" style="color: blue;"></i>
                                    </span>
                                    <span id="day"></span>
                                    <span id="month"></span>
                                    <span id="year"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active" style="background-image: url('assets/img/gallery/gallery-1.jpg'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <h5 class="text-white mb-1">SMA NEGERI 5 MALANG</h5>
                                    <p>Jalan Tanimbar no. 24 Malang</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('assets/img/gallery/gallery-2.jpg'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <h5 class="text-white mb-1">Lapangan Tenis</h5>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('assets/img/gallery/gallery-3.jpg'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <h5 class="text-white mb-1">Halaman Perpustakaan</h5>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection