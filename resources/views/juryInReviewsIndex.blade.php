@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@push('styles')
    <link href="{{ asset('css/none.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow" style="max-width: 1000px">
        <div class="row">
            <div class="col">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-center mb-3">
                        <h2>{{ __('translation.dashboard.reviewsIndex') }}</h2>
                    </div>
                    @foreach ($users as $user)
                        <div class="row mb-2 d-flex align-items-center">
                            @if ($user->review->status_id == 1)
                                <label class="col fs-4 mt-1"><b>{{ $user->review?->name }}</b></label>
                                <a class="btn btn-dark m-2 col-2"
                                    href="{{ route('orchestrasInReviewsIndex', ['review' => $user->orchester_reviews_id]) }}">{{ __('translation.jury.orchestras') }}</a>
                            @endif
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="mt-2 text-center">
                    <a class="btn btn-dark m-2" href="{{ route('home') }}">{{ __('translation.review.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
