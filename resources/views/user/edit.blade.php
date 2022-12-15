@extends('layouts.users')

@section('title', 'Profil')

@section('breadcrumb')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profil</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Edit Profil</h6>
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
    <div class="main-content position-relative max-height-vh-100 h-100">
        <div class="card shadow-lg mx-4 card-profile-bottom">
            @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            @if($user)
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('simpanedit') }}" enctype="multipart/form-data" id="myForm">
                                @csrf
                                <small id="passwordHelpBlock" class="form-text text-danger">
                                    Mohon isi kembali form yang kosong.
                                </small>
                                <p class="text-uppercase text-sm">INFORMASI USER</p>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Awal</label>
                                            <input id="nama_awal" class="form-control{{ $errors->has('nama_awal') ? ' is-invalid' : '' }}" type="text" name="nama_awal" value="{{ $user->nama_awal }}" required autofocus>
                                            @if ($errors->has('nama_awal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama_awal') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Akhir</label>
                                            <input id="nama_akhir" type="text" class="form-control{{ $errors->has('nama_akhir') ? ' is-invalid' : '' }}" name="nama_akhir" value="{{ $user->nama_akhir }}" required autofocus>
                                            @if ($errors->has('nama_akhir'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama_akhir') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Ubah Foto</label>
                                        <input id="user_foto" type="file" class="form-control{{ $errors->has('user_foto') ? ' is-invalid' : '' }}" name="user_foto" value="{{ old('user_foto') }}" required autofocus>
                                        @if ($errors->has('user_foto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_foto') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Informasi Kontak</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <input id="alamat" type="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ $user->alamat }}" required>
                                            @if ($errors->has('alamat'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('alamat') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kota</label>
                                            <input id="kota" type="text" class="form-control{{ $errors->has('kota') ? ' is-invalid' : '' }}" name="kota" value="{{ $user->kota }}" required autofocus>
                                            @if ($errors->has('kota'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kota') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Provinsi</label>
                                            <input id="provinsi" type="text" class="form-control{{ $errors->has('provinsi') ? ' is-invalid' : '' }}" name="provinsi" value="{{ $user->provinsi }}" required autofocus>
                                            @if ($errors->has('provinsi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('provinsi') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kode Pos</label>
                                            <input id="kode_pos" type="text" class="form-control{{ $errors->has('kode_pos') ? ' is-invalid' : '' }}" name="kode_pos" value="{{ $user->kode_pos }}" required autofocus>
                                            @if ($errors->has('kode_pos'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('kode_pos') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success">
                                                {{ __('Simpan perubahan') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection