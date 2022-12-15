@extends('layouts.main')

@section('title', 'Lihat Laporan')

@section('breadcrumb')
<main class="main-content position-relative border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Laporan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Lihat Laporan</h6>
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-primary">

          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif

            @if($feedback)
            <div class="col-auto">
              <a class="fa fa-arrow-left" type="button" href="{{ route('showDetailLaporan', $feedback->laporan_id) }}"></a>
              <h5 style="text-align: center;"><b>Detail Feedback</b> </h5>
            </div>
            <div class="row gx-4">
              <div class="col-auto my-auto">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Rating User</label>
                  <textarea style="resize:none;width:800px; border:none;" class="form-control" type="text" readonly>{{ $feedback ->status }}</textarea>
                </div>
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Kritik dan Saran</label>
                  <textarea style="resize:none;width:800px; border:none;" class="form-control" type="text" readonly>{{ $feedback ->kritik }}</textarea>
                </div>

                <div class="h-100">
                  <label for="example-text-input" class="form-control-label">Isi Feedback</label>
                  <textarea style="resize:none;width:800px; border:none;" class="form-control" type="text" readonly>{{ $feedback ->isi }}</textarea>
                </div>
              </div>
            </div>
            <div class="col-md-8">

              <label for="example-text-input" class="form-control-label">Foto</label><br>
              <img src="{{ asset('storage/'.$feedback->foto) }}" width="120px">
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</main>
@endsection