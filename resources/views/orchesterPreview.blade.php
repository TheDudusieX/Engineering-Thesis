@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@push('styles')
    <link href="{{ asset('css/none.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="mt-3 d-flex justify-content-center align-items-center">
        <h1>{{ __('translation.review.data') }}</h1>
    </div>
    <div class="preview container py-5">
        <div class="d-flex justify-content-center">
            <div class="col-lg-5">
                <div class="card mb-4 shadow border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0"><b>{{ __('translation.register.orchestraname') }}</b></p>
                            </div>
                            <div class="col-sm-8">
                                <p class=" mb-0">{{ $organizer->orchestraname }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0"><b>{{ __('translation.register.headquarter') }}</b></p>
                            </div>
                            <div class="col-sm-8">
                                <p class=" mb-0">{{ $organizer->headquarter }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0"><b>{{ __('translation.profile.numberofmembers') }}</b></p>
                            </div>
                            <div class="col-sm-8">
                                <p class=" mb-0">{{ $organizer->numberofmembers }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0"><b>{{ __('translation.profile.bandmaster') }}</b></p>
                            </div>
                            <div class="col-sm-8">
                                <p class=" mb-0">{{ $organizer->bandmaster }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0"><b>{{ __('translation.profile.president') }}</b></p>
                            </div>
                            <div class="col-sm-8">
                                <p class=" mb-0">{{ $organizer->president }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" style="margin-left:5px;">
                <div class="card mb-4 shadow border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0"><b>{{ __('translation.profile.description') }}</b></p>
                            </div>
                            <div class="col-sm-8">
                                <p class=" mb-0">{{ $organizer->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-dark m-2" href="{{ route('orchesterreview') }}">{{ __('translation.review.back') }}</a>
        </div>
    </div>
@endsection
