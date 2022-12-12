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
                    @if($fb)
                      <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('feedback', $fb->laporan_id) }}">Lihat Feedback</a>
                      </div>
                    @endif
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
                          </div>
                          <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('riwayatLaporan') }}">Kembali</a>
                          </div>
                    @endif 
                    
                    

            </div>
        </div>
    </div>
</div>
@endsection