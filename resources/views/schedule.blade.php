@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@push('styles')
    <link href="{{ asset('css/none.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow" style="max-width: 800px">
        <div class="row align-items-start">
            <div class="col justify-content-center">
                <div class="p-3 py-5">
                    <div class="d-flex align-items-center mb-3">
                        <h2>{{ __('translation.review.scheduleinfo') }}</h2>
                    </div>
                    <h3><b>{{ $orchesterreview->name }} {{ $orchesterreview->term }}</b></h3>
                    <h3 class="mb-5">{{ __('translation.review.scheduleStart') }} {{ $orchesterreview->start_time }}</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="fs-4">{{ __('translation.register.orchestraname') }}</th>
                                <th scope="col" class="fs-4">{{ __('translation.myReview.time') }}</th>
                            </tr>
                        </thead>
                        @foreach ($timetable->getOrchestraTimes as $member)
                            <tbody>
                                <tr>
                                    <td><label class="col fs-5 mt-1">{{ $member->getOrchestra?->orchestraname }}</label>
                                    </td>
                                    <td>
                                        <p class="fs-5">{{ $member->performance_time }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="mt-4 text-center">
                    <a class="btn btn-dark m-2"
                        href="{{ route('orchesterreview') }}">{{ __('translation.review.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
