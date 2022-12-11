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
                    <h5 align="center"><b>IDENTITAS</b> </h5>
                    @if($user)
                    <table class="table table-sm">
                            <tbody>
                              <tr>
                                <td class="table-info">Email</td>
                                <td>: {{$user->email  }}</td>
                              </tr>
                              <tr>
                                <td class="table-info">Username</td>
                                <td>: {{$user->username  }}</td>
                              </tr>
                              <tr>
                                <td class="table-info" width="200px">Nama Awal</td>
                                <td>: -</td>
                              </tr>
                              <tr>
                                <td class="table-info">Nama Akhir</td>
                                <td>: -</td>
                              </tr>
                              <tr>
                                <td class="table-info" width="200px">Alamat</td>
                                <td>: -</td>
                              </tr>
                              <tr>
                                <td class="table-info">Kota</td>
                                <td>: -</td>
                              </tr>
                              <tr>
                                <td class="table-info">Provinsi</td>
                                <td>: -</td>
                              </tr>
                              <tr>
                                <td class="table-info">Kode Pos</td>
                                <td>: -</td>
                              </tr>
                          </div>
                    @endif
                    <div class="float-right my-2">
                      &nbsp;
                      &nbsp;
                      <a class="btn btn-success" href="{{ route('admin') }}">Kembali</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection