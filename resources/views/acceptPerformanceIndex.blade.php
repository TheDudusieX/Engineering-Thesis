@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@push('styles')
    <link href="{{ asset('css/none.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow" style="max-width: 900px">
        <div class="row align-items-start">
            <div class="col justify-content-center">
                <form method="POST" action="{{ route('acceptPerformance') }}">
                    @csrf
                    <div class="p-3 py-5">
                        <div class="d-flex align-items-center mb-3">
                            <h2 class="text-right">{{ __('translation.dashboard.acceptPerformance') }}</h2>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><p class="fs-5 mb-0">{{ __('translation.register.orchestraname') }}</p></th>
                                    <th scope="col"><p class="fs-5 mb-0">{{ __('translation.myReview.time') }}</p></th>
                                    <th scope="col"><p class="fs-5 mb-0">{{ __('translation.myReview.ifEnded') }}</p></th>
                                </tr>
                            </thead>
                            @foreach ($participants as $member)
                                <input type="hidden" value="{{ $member->getOrchestra->id }}" name="members[]">
                                <tbody>
                                    <tr>
                                        <td><label class="col fs-5 my-2">{{ $member->getOrchestra?->orchestraname }}</label>
                                        </td>
                                        <td>
                                            <p class=" my-2 fs-5">{{ $member->performance_time }}</p>
                                        </td>
                                        <td>
                                            @if ($member->status_id == 1)
                                                <input type="checkbox" checked disabled style="transform: scale(1.5);">
                                                <label class="my-2 mx-2 fs-5"> {{ __('translation.myReview.accepted') }}</label>
                                            @else
                                                <input type="checkbox" style="transform: scale(1.5);"
                                                    name="status[{{ $member->getOrchestra->id }}]" value="1">
                                                <label class="my-2 mx-2 fs-5"> {{ __('translation.myReview.accepted') }}</label>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="btn btn-primary" type="submit">{{ __('translation.review.save') }}</button>
                        <a class="btn btn-dark m-2"
                            href="{{ route('myReviews') }}">{{ __('translation.review.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
