@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@push('styles')
    <link href="{{ asset('css/none.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow" style="width: 600px">
        <div class="row align-items-start">
            <div class="col justify-content-center">
                <div class="p-3 py-5">
                    <div class="d-flex align-items-center mb-3">
                        <h2 class="text-right">{{ __('translation.dashboard.orchestrasIndex') }}</h2>
                    </div>
                    <h4 class="text-center">{{ $timetable->getReview->name }} <br> {{ $timetable->getReview->term }}</h4>
                    <hr>
                    @foreach ($collection as $item)
                        <div class="form-group row mb-2">
                            <label class="col fs-4 mt-1">{{ $item->getOrchestra?->orchestraname }}</label>
                            <a class="btn btn-dark m-2 col-3"
                                href="{{ route('rateIndex', ['orchestra' => $item->getOrchestra->id, 'review' => $timetable->getReview]) }}">{{ __('translation.dashboard.rate') }}</a>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="mt-4 text-center">
                    <a class="btn btn-dark m-2"
                    href="{{ route('juryInReviewsIndex') }}">{{ __('translation.review.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
