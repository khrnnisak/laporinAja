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

                    <form method="POST" action="{{ route('laporkan') }}" enctype="multipart/form-data" id="myForm">
                        @csrf

                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                            <div class="col-md-4">
                                <select  id="kategori" name='kategori' class="form-control{{ $errors->has('kategori') ? ' is-invalid' : '' }}" value="{{ old('kategori') }}" required autofocus>
                                    <option selected='selected' value='Keluhan'>Keluhan</option>
                                    <option value='Aspirasi' >Aspirasi</option>
                                </select>
                                @if ($errors->has('kategori'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isi" class="col-md-4 col-form-label text-md-right">{{ __('Isi') }}</label>
                            <div class="col-md-6">
                                <textarea id="isi" type="text" class="form-control{{ $errors->has('isi') ? ' is-invalid' : '' }}" name="isi" value="{{ old('isi') }}" rows="3"></textarea>

                                @if ($errors->has('isi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('isi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                            <div class="col-md-7">
                                <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" required autofocus>

                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="form-check">
                                <input id="is_hidden" type="checkbox" class="form-check-input{{ $errors->has('is_hidden') ? ' is-invalid' : '' }}" name="is_hidden" value="true" >
                                <label for="is_hidden" class="form-check-label">Kirim sebagai anonim</label>
                                @if ($errors->has('is_hidden'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_hidden') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim') }}
                                </button>
                            </div>
                            <div class="float-right my-2">
                                &nbsp;
                                &nbsp;
                                <a class="btn btn-success" href="{{ route('user') }}">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection