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
                    <h5 align="center"><b>Detail Feedback</b> </h5>
                    @if($feedback)
                          <table class="table table-sm">
                            <tbody>
                            <tr>
                                <td><img src="{{ asset('storage/'.$feedback->foto) }}"  width="120px"></td>
                            </tr>
                              <tr>
                                <td class="table-info" width="200px">Isi</td>
                                <td>: {{ $feedback ->isi }}</td>
                              </tr>
                              <tr>
                                <td class="table-info" width="200px">Status</td>
                                <td>: {{ $feedback ->status }}</td>
                              </tr>
                              <tr>
                                <td class="table-info" width="200px">Kritik dan Saran</td>
                                <td>: {{ $feedback ->kritik }}</td>
                              </tr>
                              <tr>
                          </div>
                          <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('showDetailLaporan', $feedback->laporan_id) }}">Kembali</a>
                            </div>
                    @endif 
                    
                    

            </div>
        </div>
    </div>
</div>
@endsection