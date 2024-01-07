@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myReview.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow">
        <div class="row align-items-start">
            <h2 class="my-4 text-center">{{ __('translation.dashboard.candidatsJury') }}</h2>
            @foreach ($users as $user)
                <div class=" row d-flex justify-content-center">
                    <div class="col-2 ">
                        <h5 class="mt-1 text-center">{{ $user->name }} {{ $user->surname }}</h5>
                        <hr>
                    </div>
                </div>
            @endforeach
            <div class="col justify-content-center">
                <hr>
                <form method="POST" action="{{ route('juryEdit') }}">
                    @csrf
                    <input type="hidden" value="{{ $id->id }}" name="orchester_reviews_id">
                    <div class="pb-4">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h2 class="text-center">{{ __('translation.dashboard.jury') }}</h2>
                        </div>
                        <div class="row form-group justify-content-center mb-2">
                            <div class="col-3 my-1">
                                <select class="form-select" name="jury[0][value]">
                                    <option hidden selected disabled>Wybierz członka jury nr 1</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if($user->id == $jury[0]->jury_id) selected @endif>{{ $user->name }} {{ $user->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group justify-content-center mb-2">
                            <div class="col-3 my-1">
                                <select class="form-select" name="jury[1][value]">
                                    <option hidden selected disabled>Wybierz członka jury nr 2</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if($user->id == $jury[1]->jury_id) selected @endif>{{ $user->name }} {{ $user->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group justify-content-center mb-1">
                            <div class="col-3 my-1">
                                <select class="form-select" name="jury[2][value]">
                                    <option hidden selected disabled>Wybierz członka jury nr 3</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if($user->id == $jury[2]->jury_id) selected @endif>{{ $user->name }} {{ $user->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">{{ __('translation.review.save') }}</button>
                        <a class="btn btn-dark m-2" href="{{ route('myReviews') }}">{{ __('translation.review.cancel') }}</a>
                    </div>
                </form>
            </div>
            <div class="row justify-content-center mt-5">
                <form method="POST" action="{{ route('juryUserAdd') }}">
                    @csrf
                    <input type="hidden" value="{{ $id->id }}" name="redirect">
                    <div class="align-items-center justify-content-start mt-5">
                        <hr>
                        <h2 class="mx-2">{{ __('translation.dashboard.juryadd') }}</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            <input type="text" placeholder="{{ __('translation.register.name') }}"
                                class="form-control @error('name') is-invalid @enderror" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <input type="text" placeholder="{{ __('translation.register.surname') }}"
                                class="form-control @error('surname') is-invalid @enderror" name="surname">
                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            <input type="text" placeholder="{{ __('translation.register.phone') }}"
                                class="form-control @error('phone') is-invalid @enderror" name="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <input type="text" placeholder="{{ __('translation.register.email') }}"
                                class="form-control @error('email') is-invalid @enderror" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="my-4">
                        <button class="btn btn-primary" type="submit">{{ __('translation.review.add') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
