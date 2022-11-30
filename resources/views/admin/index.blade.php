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
                        <h5>Welcome, You are admin!</h5>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
