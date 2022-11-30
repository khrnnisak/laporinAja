@extends('layouts.app')

@section('content')
<br><br>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Profil') }}</div>

                <div class="card-body">

                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('lengkapi') }}" enctype="multipart/form-data" id="myForm">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_awal" class="col-md-4 col-form-label text-md-right">{{ __('Nama Awal') }}</label>

                            <div class="col-md-6">
                                <input id="nama_awal" type="text" class="form-control{{ $errors->has('nama_awal') ? ' is-invalid' : '' }}" name="nama_awal" value="{{ old('nama_awal') }}" required autofocus>

                                @if ($errors->has('nama_awal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_awal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_akhir" class="col-md-4 col-form-label text-md-right">{{ __('Nama Akhir') }}</label>

                            <div class="col-md-6">
                                <input id="nama_akhir" type="text" class="form-control{{ $errors->has('nama_akhir') ? ' is-invalid' : '' }}" name="nama_akhir" value="{{ old('nama_akhir') }}" required autofocus>

                                @if ($errors->has('nama_akhir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_akhir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Lengkap') }}</label>
                            <div class="col-md-6">
                                <textarea id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" rows="3"></textarea>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                            <div class="col-md-4">
                                <input id="kota" type="text" class="form-control{{ $errors->has('kota') ? ' is-invalid' : '' }}" name="kota" value="{{ old('kota') }}" required autofocus>

                                @if ($errors->has('kota'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="provinsi" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}</label>

                            <div class="col-md-4">
                                <input id="provinsi" type="text" class="form-control{{ $errors->has('provinsi') ? ' is-invalid' : '' }}" name="provinsi" value="{{ old('provinsi') }}" required autofocus>

                                @if ($errors->has('provinsi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-md-4 col-form-label text-md-right">{{ __('Kode Pos') }}</label>

                            <div class="col-md-6">
                                <input id="kode_pos" type="text" class="form-control{{ $errors->has('kode_pos') ? ' is-invalid' : '' }}" name="kode_pos" value="{{ old('kode_pos') }}" required autofocus>

                                @if ($errors->has('kode_pos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kode_pos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection