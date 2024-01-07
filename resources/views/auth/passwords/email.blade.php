@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@push('styles')
    <link href="{{ asset('css/none.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border">
                    <div class="card-header">
                        <h4>{{ __('translation.reset.reset') }}</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3 row justify-content-center">

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="{{ __('translation.register.email') }}" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('translation.reset.link') }}
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
