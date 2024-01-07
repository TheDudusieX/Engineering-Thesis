@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow" style="width: 450px">
        <div class="row align-items-start">
            <div class="col justify-content-center">
                <form method="POST" action="{{ route('orchesterreviewUpdate', ['id' => $review->id]) }}">
                    @csrf
                    <div class="p-3 py-5">
                        <div class="d-flex align-items-center mb-3">
                            <h2 class="text-right">{{ __('translation.dashboard.reviewedit') }}</h2>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label
                                    class="labels fs-5 mt-3">{{ __('translation.review.name') }}</label><input
                                    type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $review->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12"><label
                                    class="labels fs-5 mt-3">{{ __('translation.review.maximumNumberOfMembers') }}</label><input
                                    type="number"
                                    class="form-control @error('maximum_number_of_orchestras') is-invalid @enderror"
                                    name="maximum_number_of_orchestras" value="{{ $review->maximum_number_of_orchestras }}">
                                @error('maximum_number_of_orchestras')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12"><label
                                    class="labels fs-5 mt-3">{{ __('translation.review.term') }}</label><input
                                    type="date" class="form-control @error('term') is-invalid @enderror" name="term"
                                    value="{{ $review->term }}">
                                @error('term')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12"><label
                                    class="labels fs-5 mt-3">{{ __('translation.review.startTime') }}</label><input
                                    type="time" class="form-control @error('start_time') is-invalid @enderror"
                                    name="start_time" value="{{ $review->start_time }}">
                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12"><label
                                    class="labels fs-5 mt-3">{{ __('translation.review.deadline') }}</label><input
                                    type="date" class="form-control @error('deadline') is-invalid @enderror"
                                    name="deadline" value="{{ $review->deadline }}">
                                @error('deadline')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12"><label
                                    class="labels fs-5 mt-3">{{ __('translation.review.place') }}</label><input
                                    type="text" class="form-control @error('place') is-invalid @enderror" name="place"
                                    value="{{ $review->place }}">
                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12"><label
                                    class="labels fs-5 mt-3">{{ __('translation.review.information') }}</label><input
                                    type="text" class="form-control @error('information') is-invalid @enderror"
                                    name="information" value="{{ $review->information }}">
                                @error('information')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <button class="btn btn-primary" type="submit">{{ __('translation.review.save') }}</button>
                            <a class="btn btn-secondary m-2"
                                href="{{ route('myReviews') }}">{{ __('translation.review.cancel') }}</a>
                        </div>
                        {{-- <x-auth-validation-error class="mb-4" :errors="$errors"/> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
