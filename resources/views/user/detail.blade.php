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
                            @if($otherData)  
                              <tr>
                                <td class="table-info">Email</td>
                                <td>: {{$otherData->email  }}</td>
                              </tr> 
                              <tr>
                                <td class="table-info">Username</td>
                                <td>: {{$otherData->username  }}</td>
                              </tr> 
                              @endif
                              <tr>
                                <td class="table-info" width="200px">Nama Awal</td>
                                <td>: {{ $user->nama_awal }}</td>
                              </tr>
                              <tr>
                                <td class="table-info">Nama Akhir</td>
                                <td>: {{ $user->nama_akhir }}</td>
                              </tr>
                              @if($otherData)  
                              <tr>
                                <td class="table-info">Email</td>
                                <td>: {{$otherData->email  }}</td>
                              </tr> 
                              @endif
                              <tr>
                                <td class="table-info" width="200px">Alamat</td>
                                <td>: {{ $user->alamat }}</td>
                              </tr>
                              <tr>
                                <td class="table-info">Kota</td>
                                <td>: {{ $user->kota }}</td>
                              </tr>
                              <tr>
                                <td class="table-info">Provinsi</td>
                                <td>: {{ $user->provinsi }}</td>
                              </tr>
                              <tr>
                                <td class="table-info">Kode Pos</td>
                                <td>: {{ $user->kode_pos }}</td>
                              </tr>
                          </div>
                          <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('edit') }}">Edit data</a>
                                </div>
                    @else 
                    <table class="table table-sm">
                            <tbody>
                            @if($otherData)  
                              <tr>
                                <td class="table-info">Email</td>
                                <td>: {{$otherData->email  }}</td>
                              </tr> 
                              <tr>
                                <td class="table-info">Username</td>
                                <td>: {{$otherData->username  }}</td>
                              </tr> 
                              @endif
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
                    <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('lengkap') }}">Lengkapi data</a>
                                </div>
                    @endif

            </div>
        </div>
    </div>
</div>
@endsection