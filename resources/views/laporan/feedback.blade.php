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
                          <!-- <div class="form-group">
                          <form method="post" action="{{url('user/ratePuas/'.$feedback->laporan_id)}}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <label for="status"><Strong></Strong></label>
                            <div class="col-md-4">
                                    <input type="radio" name="status" value="Puas" id="status">Ya</input>
                                    <input type="radio" name="status" value="Tidak Puas" id="status">Tidak</input>
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
                        </div> -->
                            <!-- <button type="submit" class="btn btn-primary">Kirim</button>
                          </form>
                          <div class="float-right my-2"> -->
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