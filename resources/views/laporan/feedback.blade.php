@extends('layouts.app')
<br><br>
<br><br>
<br><br>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-primary">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 align="center"><b>Admin</b> </h5>
                    @if($feedback)
                            <table class="table table-sm">
                                <tbody>
                                <tr>
                                    <td><img src="{{ asset('storage/'.$feedback->foto) }}"  width="120px"></td>
                                </tr>
                                <tr>
                                    <td class="table-info" width="200px">Tanggal</td>
                                    <td>: {{ $feedback ->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="table-info" width="200px">Isi</td>
                                    <td>: {{ $feedback ->isi }}</td>
                                </tr>
                                <tr>
                            </div>
                            @if ($feedback -> status == 'Tidak ada keterangan')
                                <div class="form-group">
                                    <form method="post" action="{{ route('ratePuas', $feedback->laporan_id) }}" id="myForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label for="status"><Strong>Status</Strong></label>
                                        <div class="col-md-4">
                                            <select id="status" name='status' class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }} "value="{{ $feedback->status }}" required autofocus>
                                                <option selected='selected'>Apakah anda puas?</option>
                                                <option value='Puas'>Ya</option>
                                                <option value='Tidak Puas'>Tidak</option>
                                            </select>
                                            @if ($errors->has('status'))
                                            <span class="invalid-feedback" role="alert"> 
                                                <strong>{{ $feedback->first('status') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <label for="kritik" class="col-md-4 col-form-label text-md-right">{{ __('Kritik dan Saran') }}</label>
                                            <div class="col-md-6">
                                                <textarea id="kritik" type="text" class="form-control{{ $errors->has('kritik') ? ' is-invalid' : '' }}" name="kritik" value="{{ old('kritik') }}" rows="3"></textarea>

                                                @if ($errors->has('kritik'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('kritik') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                                </div>
                            @endif
                        <div class="float-right my-2">
                            &nbsp;
                            &nbsp;
                            <a class="btn btn-success" href="{{ route('showDetail', $feedback->laporan_id) }}">Kembali</a>
                        </div>
                    @endif 
            </div>
        </div>
    </div>
</div>
@endsection