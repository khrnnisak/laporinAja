@extends('layouts.main')

@section('title', 'Balas Laporan')

@section('breadcrumb')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Buat Laporan</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Buat Laporan</h6>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @if(session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                            @endif

                            <form method="POST" action="{{ route('addFeedback', $fb->id) }}" enctype="multipart/form-data" id="myForm">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Isi Pesan</label>
                                        <textarea id="isi" style="resize:none;width:800px;height:200px;" class="form-control{{ $errors->has('isi') ? ' is-invalid' : '' }}" name="isi" value="{{ old('isi') }}" type="text"></textarea>
                                        @if ($errors->has('isi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('isi') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="example-text-input" class="form-control-label">Tambah Foto</label>
                                    <div class="form-group">
                                        <input id="foto" type="file" class="btn btn-icon btn-3 btn-primary{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" required autofocus>

                                        @if ($errors->has('foto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('foto') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-icon btn-3 btn-success" type="submit">
                                        <a class="nav-link text-white font-weight-bold px-0">Kirim</a>
                                    </button>
                            </form>
                            <button class="btn btn-icon btn-3 btn-danger" type="button">
                                <a href="{{ route('admin.showLaporan') }}" class="nav-link text-white font-weight-bold px-0">Batal</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection