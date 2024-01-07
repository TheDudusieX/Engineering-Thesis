@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@push('styles')
    <link href="{{ asset('css/none.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow">
        <div class="row align-items-start">
            <form method="POST" action="{{ route('rateAdd') }}">
                @csrf
                <input type="hidden" value="{{ $orchestra->id }}" name="orchestra">
                <input type="hidden" value="{{ $review->id }}" name="review">
                <div class="p-3 py-5">
                    <div class=" mb-5">
                        <h2 class="">{{ __('translation.dashboard.rate') }}</h2>
                        <h4><b>{{ $orchestra->orchestraname }}</b></h4>
                        <h4 class="my-3">{{ $review->name }} {{ $review->place }} {{ $review->term }}</h4>
                    </div>
                    @foreach ($categories as $category)
                        <div class="my-3 form-group row  justify-content-center">
                            <label class="col-3 fs-4 mt-1">{{ $category->name }}</label>
                            <div class="col-2 mb-2">
                                <select class="form-select @error('rate') is-invalid @enderror"
                                    name="rate[{{ $category->id }}]">
                                    <option hidden selected disabled>{{ __('translation.jury.choose') }}
                                    </option>
                                    @foreach ($ratings as $rate)
                                        <option value="{{ $rate->id }}">{{ $rate->rate }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('rate')
                    <span class="invalid-feedback" role="alert" style="">
                        {{ $message }}
                    </span>
                @enderror
                <div class="my-3 text-center">
                    <button class="btn btn-primary" type="submit">{{ __('translation.review.save') }}</button>
                    <a class="btn btn-dark m-2"
                        href="{{ route('juryInReviewsIndex') }}">{{ __('translation.review.back') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
