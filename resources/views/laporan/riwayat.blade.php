@extends('layouts.users')

@section('title', 'Riwayat Laporan')

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
                <h6 class="font-weight-bolder text-white mb-0">Riwayat Laporan</h6>
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
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Riwayat Laporan</h6>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if ($laporan)
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Masuk</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Pesan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Isi Pesan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($paginate as $a)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $a->created_at }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $a->kategori }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $a->isi }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($a->status == 'Ditolak')
                                            <span class="badge badge-sm bg-gradient-danger">{{ $a->status }}</span>
                                            @elseif($a->status == 'Diproses')
                                            <span class="badge badge-sm bg-gradient-warning">{{ $a->status }}</span>
                                            @elseif($a->status == 'Masuk')
                                            <span class="badge badge-sm bg-gradient-primary">{{ $a->status }}</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-success">{{ $a->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('user.destroy', $a->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('showDetail', $a->id) }}">
                                                    <i class="fa fa-eye me-sm-1"></i>
                                                    <span class="d-sm-inline d-none">Detail</span>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                                                    <i class="fa fa-trash me-sm-1"></i>
                                                    <span class="d-sm-inline d-none">Delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            @else
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left mt-2">
                                        <h2 style="text-align: center">Anda belum membuat laporan</h2>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="javascript:;" tabindex="-1">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="javascript:;">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</main>
@endsection