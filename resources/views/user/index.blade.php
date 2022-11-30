@extends('layouts.app')

@section('content')
<div class="container" data-aos="fade-up" data-aos-delay="200">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                    <div class="card-body  bg-light">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>
                        <h5>Welcome, You are user!</h5>
                    </div>
                    <div class="col-lg-12 margin-tb">
                                <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('user') }}">Beranda</a>
                                </div>
                                <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="">Buat Laporan</a>
                                </div>
                                <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="">Riwayat Laporan</a>
                                </div>
                                <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('profil') }}">Profil</a>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>

@endsection
