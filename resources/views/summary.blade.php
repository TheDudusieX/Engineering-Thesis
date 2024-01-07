@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="mt-3 d-flex justify-content-center align-items-center">
    <h1 class="my-3">{{ __('translation.review.summaryinfo') }}</h1>
</div>
    <div class="container rounded bg-white mb-5 border shadow">
        <div class="row align-items-start">
            <div class="col justify-content-center">
                <div class="p-3 py-5">
                    <div class="d-flex align-items-center mb-3">
                    </div>
                    <h3><b>{{ $orchestra->review->name }}</b></h3>
                    <h3><b>{{ __('translation.review.summaryPlace') }}</b> {{ $orchestra->review->place }},
                        {{ $orchestra->review->term }}</h3>
                    <h3 class="mb-2"><b>{{ __('translation.review.scheduleStart') }}</b>
                        {{ $orchestra->review->start_time }}</h3>
                    <h3 class=""><b>{{ __('translation.review.jury') }}</b></h3>
                    @foreach ($juries as $jury)
                        @php($user = $jury->getUser)
                        <h3 class=""> {{ $user->name }} {{ $user->surname }}</h3>
                    @endforeach
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col" class="fs-4">{{ __('translation.register.orchestraname') }}</th>
                                <th scope="col" class="fs-4">{{ __('translation.myReview.time') }}</th>
                                <th scope="col" class="fs-4">{{ __('translation.myReview.points') }}</th>
                            </tr>
                        </thead>
                        @foreach ($timetable as $member)
                            <tbody>
                                <tr>
                                    <td><label class="col fs-5 mt-1">{{ $member->orchestra?->orchestraname }}</label>
                                    </td>
                                    <td>
                                        <p class="fs-5">{{ $member->timetablePivot->performance_time }}</p>
                                    </td>
                                    <td>
                                        <p class="fs-5">{{ $member->rating }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="mt-4 text-center">
                    <a class="btn btn-dark m-3"
                        href="{{ route('orchesterreviewended') }}">{{ __('translation.review.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
