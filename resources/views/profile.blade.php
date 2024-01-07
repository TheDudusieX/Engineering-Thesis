@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@push('styles')
    <link href="{{ asset('css/none.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow" style="max-width: 450px">
        <div class="row align-items-start">
            <div class="col justify-content-center ">
                <form method="POST" action="{{ route('update') }}">
                    @csrf
                    @method('PATCH')
                    <div class="p-3 py-5">
                        <div class="d-flex align-items-center mb-3">
                            <h2 class="text-right">{{ __('translation.profile.edit') }}</h2>
                        </div>
                        <div class="row mt-2 justify-content-center align-items-center">
                            <div class="col-md-6"><input type="text" placeholder="{{ __('translation.register.name') }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $profile->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6"><input type="text"
                                    placeholder="{{ __('translation.register.surname') }}"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ $profile->surname }}">
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 my-1"><input type="text"
                                    placeholder="{{ __('translation.register.email') }}"
                                    class="form-control mb-2 @error('email') is-invalid @enderror" name="email"
                                    value="{{ $profile->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 my-1"><input type="tel"
                                    placeholder="{{ __('translation.register.phone') }}"
                                    class="form-control mb-2 @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ $profile->phone }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 my-1"><input type="text"
                                    placeholder="{{ __('translation.register.orchestraname') }}"
                                    class="form-control mb-2 @error('orchestraname') is-invalid @enderror"
                                    name="orchestraname" value="{{ $orchestra->orchestraname }}">
                                @error('orchestraname')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 my-1"><input type="text"
                                    placeholder="{{ __('translation.register.headquarter') }}"
                                    class="form-control mb-2 @error('headquarter') is-invalid @enderror" name="headquarter"
                                    value="{{ $orchestra->headquarter }}">
                                @error('headquarter')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 my-1"><input type="text"
                                    placeholder="{{ __('translation.profile.numberofmembers') }}"
                                    class="form-control mb-2 @error('numberofmembers') is-invalid @enderror"
                                    name="numberofmembers" value="{{ $orchestra->numberofmembers }}">
                                @error('numberofmembers')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 my-1"><input type="text"
                                    placeholder="{{ __('translation.profile.bandmaster') }}"
                                    class="form-control mb-2 @error('bandmaster') is-invalid @enderror" name="bandmaster"
                                    value="{{ $orchestra->bandmaster }}">
                                @error('bandmaster')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 my-1"><input type="text"
                                    placeholder="{{ __('translation.profile.president') }}"
                                    class="form-control mb-2 @error('president') is-invalid @enderror" name="president"
                                    value="{{ $orchestra->president }}">
                                @error('president')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-1 mb-2"><input type="text"
                                    placeholder="{{ __('translation.profile.description') }}"
                                    class="form-control mb-2 @error('description') is-invalid @enderror" name="description"
                                    value="{{ $orchestra->description }}">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 mb-2 text-center">
                            <button class="btn btn-primary profile-button"
                                type="submit">{{ __('translation.profile.save') }}</button>
                            <a class="btn btn-dark profile-button" href="" data-bs-target="#modal"
                                data-bs-toggle="modal">{{ __('translation.profile.change') }}</a>
                        </div>
                    </div>
                </form>
                <div id="modal" class="modal" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="text-center">Zmień hasło</h1>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="text-center">
                                                <p>{{ __('translation.password.text') }}</p>
                                                <div class="panel-body">
                                                    <form method="POST" action="{{ route('changepassword') }}">
                                                        @csrf
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <div class="input-group" id="password">
                                                                    <input class="m-1 form-control input-lg"
                                                                        placeholder="{{ __('translation.password.password') }}"
                                                                        name="password" type="password">
                                                                    <div class="input-group-addon"
                                                                        style="padding:0.75rem 0.5rem; margin-bottom:0; font-size:1rem;">
                                                                        <a href=""><i class="fa fa-eye-slash"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group" id="newpassword">
                                                                    <input class="m-1 form-control input-lg"
                                                                        placeholder="{{ __('translation.password.newpassword') }}"
                                                                        name="newpassword" type="password">
                                                                    <div class="input-group-addon"
                                                                        style="padding:0.75rem 0.5rem; margin-bottom:0; font-size:1rem;">
                                                                        <a href=""><i class="fa fa-eye-slash"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group" id="confirmedpassword">
                                                                    <input class="m-1 form-control input-lg"
                                                                        placeholder="{{ __('translation.password.confirmpassword') }}"
                                                                        name="newpassword_confirmation" type="password">
                                                                    <div class="input-group-addon"
                                                                        style="padding:0.75rem 0.5rem; margin-bottom:0; font-size:1rem;">
                                                                        <a href=""><i class="fa fa-eye-slash"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input class=" m-2 btn btn-lg btn-primary btn-block"
                                                                value="{{ __('translation.password.change') }}"
                                                                type="submit">
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal"
                                        aria-hidden="true">{{ __('translation.password.cancel') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $("#password a").on('click', function(event) {
                event.preventDefault();
                if ($('#password input').attr("type") == "text") {
                    $('#password input').attr('type', 'password');
                    $('#password i').addClass("fa-eye-slash");
                    $('#password i').removeClass("fa-eye");
                } else if ($('#password input').attr("type") == "password") {
                    $('#password input').attr('type', 'text');
                    $('#password i').removeClass("fa-eye-slash");
                    $('#password i').addClass("fa-eye");
                }
            });
            $("#newpassword a").on('click', function(event) {
                event.preventDefault();
                if ($('#newpassword input').attr("type") == "text") {
                    $('#newpassword input').attr('type', 'password');
                    $('#newpassword i').addClass("fa-eye-slash");
                    $('#newpassword i').removeClass("fa-eye");
                } else if ($('#newpassword input').attr("type") == "password") {
                    $('#newpassword input').attr('type', 'text');
                    $('#newpassword i').removeClass("fa-eye-slash");
                    $('#newpassword i').addClass("fa-eye");
                }
            });
            $("#confirmedpassword a").on('click', function(event) {
                event.preventDefault();
                if ($('#confirmedpassword input').attr("type") == "text") {
                    $('#confirmedpassword input').attr('type', 'password');
                    $('#confirmedpassword i').addClass("fa-eye-slash");
                    $('#confirmedpassword i').removeClass("fa-eye");
                } else if ($('#confirmedpassword input').attr("type") == "password") {
                    $('#confirmedpassword input').attr('type', 'text');
                    $('#confirmedpassword i').removeClass("fa-eye-slash");
                    $('#confirmedpassword i').addClass("fa-eye");
                }
            });
        });
    </script>
@endpush
