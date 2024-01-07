@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush
@section('content')
    <section class="home">
        <div
            class="container h-100 d-flex flex-column justify-content-center align-items-center text-center text-light py-0">
            <p class="display-2">{{ __('translation.home.title') }}</p>
            <p class="welcome-text mb-5" style="font-size: 1.4rem">{{ __('translation.home.text') }}</p>
            <div class="hero-shadow"></div>
        </div>
    </section>
    <section class="home-boxes">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 home-box mb-5 mb-md-0">
                    <i class="fa-solid fa-circle-question"></i>
                    <h1>{{ __('translation.home.title1') }}</h1>
                    <p class="m-0">{{ __('translation.home.text1') }}</p>
                </div>
                <div class="col-md-4 home-box mb-5 mb-md-0">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <h1>{{ __('translation.home.title2') }}</h1>
                    <p class="m-0">{{ __('translation.home.text2') }}</p>
                </div>
                <div class="col-md-4 home-box mb-5 mb-md-0">
                    <i class="fa-solid fa-circle-info"></i>
                    <h1>{{ __('translation.home.title3') }}</h1>
                    <p class="m-0">{{ __('translation.home.text3') }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="home-passion p-5 text-light py-5">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <p class="fs-1">{{ __('translation.home.more') }}</p>
            <p style="font-size: 1.4rem">{{ __('translation.home.moreInfo') }}</p>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <a href="{{ route('orchesterreview') }}"
                    class="btn btn-outline-light">{{ __('translation.review.title') }}</a>
            </div>
            <div class="hero-shadow"></div>
        </div>
    </section>
@endsection
