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
                        <h4>{{ __('translation.register.title') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3 row justify-content-center">
                                <h4 style="color: red;">{{ __('translation.register.warning') }}</h4>
                                <b><p class="text-uppercase" style="color: red;">{{ __('translation.register.text') }}</p></b>
                                <hr>
                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="{{ __('translation.register.name') }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="surname" type="text" placeholder="{{ __('translation.register.surname') }}"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="phone" type="text" placeholder="{{ __('translation.register.phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="orchestraname" type="text" placeholder="{{ __('translation.register.orchestraname') }}"
                                        class="form-control @error('orchestraname') is-invalid @enderror"
                                        name="orchestraname" value="{{ old('orchestraname') }}" required
                                        autocomplete="orchestraname" autofocus>
                                    @error('orchestraname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="headquarter" type="text" placeholder="{{ __('translation.register.headquarter') }}"
                                        class="form-control @error('headquarter') is-invalid @enderror"
                                        name="headquarter" value="{{ old('headquarter') }}" required
                                        autocomplete="headquarter" autofocus>
                                    @error('headquarter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="{{ __('translation.register.email') }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="{{ __('translation.register.password') }}"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" placeholder="{{ __('translation.register.password-confirm') }}"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <div class="d-flex justify-content-center mb-3">
                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHAV3_SITEKEY') }}">
                                </div>
                                    @error('g-recaptcha-response')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="my-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('translation.register.register') }}
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

@push('scripts')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endpush