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
                    <h5 align="center"><b>Detail Pesan</b> </h5>
                    @if($laporan)
                          <table class="table table-sm">
                            <tbody>
                            <tr>
                                <td><img src="{{ asset('storage/'.$laporan->foto) }}"  width="120px"></td>
                            </tr>
                              <tr>
                                <td class="table-info" width="200px">Tanggal masuk</td>
                                <td>: {{ $laporan->created_at }}</td>
                              </tr>
                              <tr>
                                <td class="table-info">Kategori</td>
                                <td>: {{ $laporan->kategori }}</td>
                              </tr>
                              <tr>
                                <td class="table-info" width="200px">Isi</td>
                                <td>: {{ $laporan ->isi }}</td>
                              </tr>
                              <tr>
                                <td class="table-info" width="200px">Status</td>
                                <td>: {{ $laporan ->status }}</td>
                              </tr>
                              <tr>
                          </div>
                          <div class="form-group">
                          <form method="post" action="{{ route('admin.status', $laporan->id) }}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="status"><Strong>Status</Strong></label>
                            <div class="col-md-4">
                                <select id="status" name='status' class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }} "value="{{ $laporan->status }}" required autofocus>
                                    <option selected='selected'>Ubah Status</option>
                                    <option value='Ditolak'>Ditolak</option>
                                    <option value='Diproses'>Diproses</option>
                                    <option value='Selesai'>Selesai</option>
                                </select>
                                @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert"> 
                                    <strong>{{ $laporan->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                          <div class="float-right my-2">
                            &nbsp;
                            &nbsp;
                            <a class="btn btn-success" href="{{ route('admin.showLaporan') }}">Kembali</a>
                          </div>
                          @if ($feedback)
                            <div class="float-right my-2">
                              &nbsp;
                              &nbsp;
                              <a class="btn btn-success" href="{{ route('showFeedback', $laporan->id) }}">Lihat feedback</a>
                            </div>
                          @else
                            <div class="float-right my-2">
                              &nbsp;
                              &nbsp;
                              <a class="btn btn-success" href="{{ route('feedback.create', $laporan->id) }}">Balas</a>
                            </div>   
                          @endif  
                    @endif 
            </div>
        </div>
    </div>
</div>
@endsection