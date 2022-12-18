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
        <h6 class="font-weight-bolder text-white mb-0">Profil</h6>
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
      <div class="card-body p-3">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        @if($user)
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ asset('storage/'.$user->user_foto) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          @if($otherData)
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{$otherData->username }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                User
              </p>
            </div>
          </div>
          <div class="col md-8"></div>
          <div class="col-auto my-auto">
            <button class="btn btn-warning btn-sm ms-auto" style="background-color: #11cdef;">
              <a href="{{ route('edit') }}" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-pencil"></i>
                <span class="d-sm-inline d-none">Edit</span>
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <p class="text-uppercase text-sm">INFORMASI USER</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input class="form-control" type="text" value="{{$otherData->username  }}" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address</label>
                    <input class="form-control" type="email" value="{{$otherData->email  }}" readonly>
                  </div>
                </div>
                @endif
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Awal</label>
                    <input class="form-control" type="text" value="{{ $user->nama_awal }}" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Akhir</label>
                    <input class="form-control" type="text" value="{{ $user->nama_akhir }}" readonly>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Informasi Kontak</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <input class="form-control" type="text" value="{{ $user->alamat }}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kota</label>
                    <input class="form-control" type="text" value="{{ $user->kota }}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Provinsi</label>
                    <input class="form-control" type="text" value="{{ $user->provinsi }}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kode Pos</label>
                    <input class="form-control" type="text" value="{{ $user->kode_pos }}" readonly>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          @if($otherData)
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{$otherData->username }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                User
              </p>
            </div>
          </div>
          <div class="col md-8"></div>
          <div class="col-auto my-auto">
            <button class="btn btn-warning btn-sm ms-auto" style="background-color: #11cdef;">
              <a href="{{ route('lengkap') }}" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-pencil"></i>
                <span class="d-sm-inline d-none">Lengkapi Data</span>
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <p class="text-uppercase text-sm">INFORMASI USER</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input class="form-control" type="text" value="{{$otherData->username  }}" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address</label>
                    <input class="form-control" type="email" value="{{$otherData->email  }}" readonly></input>
                  </div>
                </div>
                @endif
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Awal</label>
                    <input class="form-control" type="text"readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Akhir</label>
                    <input class="form-control" type="text"readonly>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Informasi Kontak</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <input class="form-control" type="text"readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kota</label>
                    <input class="form-control" type="text"readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Provinsi</label>
                    <input class="form-control" type="text"readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kode Pos</label>
                    <input class="form-control" type="text"readonly>
                  </div>
                </div>
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