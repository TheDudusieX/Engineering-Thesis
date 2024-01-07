@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myReview.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container rounded bg-white my-5 border shadow" style="max-width: 550px">
        <div class="row align-items-start">
            <div class="col justify-content-center">
                <form method="POST" action="{{ route('timeTablePivotStore') }}">
                    @csrf
                    <div class="p-3 py-5">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h2 class="text-center">{{ __('translation.dashboard.harmonogram') }}</h2>
                        </div>
                        <h4 class="text-center mb-5">{{ $timetable->getReview->name }} {{ $timetable->getReview->term }}
                        </h4>
                        <input type="hidden" value="{{ $timetable->id }}" name="timetableid">
                        @foreach ($times as $time)
                            @if ($loop->index == 0)
                                <input type="hidden" value="{{ $time }}" name="startTime">
                            @endif
                            <div class="row form-group mb-2">
                                <div class="col d-flex align-items-center">
                                    <p class="fs-5 mt-1">{{ $time }}</p>
                                </div>
                                <div class="col">
                                    <select class="form-select" id="{{ $time }}"
                                        name="time[{{ $loop->index }}][value]">
                                        <option hidden selected disabled>Wybierz orkiestrę</option>
                                        @foreach ($members as $member)
                                            <option name="uczestnik" value="{{ $member->id }}">
                                                {{ $member->orchestra->orchestraname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                        @endforeach
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
