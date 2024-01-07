@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/myreview.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container py-5">
        <div class="row text-center mb-4">
            <div class="col-lg-7 mx-auto">
                <h2> {{ __('translation.myReview.title') }}</h2>
            </div>
        </div>
        <div class="row fs-4">
            <div class="col mx-auto">
                <ul class="list-group shadow">
                    @if (isset($myReviews))
                        @foreach ($myReviews as $item)
                            <li class="list-group-item">
                                <div class=" align-items-lg-center flex-column flex-lg-row p-3">
                                    <div class="">
                                        <h3 class="mt-0 font-weight-bold text-center text-uppercase">{{ $item->name }}
                                        </h3>
                                        <br>
                                        <p class="text-center m-0"><b>{{ __('translation.myReview.info') }}</b></p>
                                        <hr class="mt-0">
                                        <p class="font-italic mb-0 small">
                                            <i class="fa-solid fa-people-group"></i>
                                            {{ __('translation.review.maximumNumberOfMembers') }}:
                                            {{ $item->maximum_number_of_orchestras }} <br>
                                            <i class="fa-solid fa-people-line"></i>
                                            {{ __('translation.review.currentNumberOfMembers') }}:
                                            {{ $item->current_number_of_orchestras }}<br>
                                            <i class="fa-solid fa-calendar-days"></i> {{ __('translation.review.term') }}:
                                            {{ $item->term }} <br>
                                            <i class="fa-solid fa-stopwatch"></i> {{ __('translation.review.deadline') }}:
                                            {{ $item->deadline }}<br>
                                            <i class="fa-solid fa-location-dot"></i> {{ __('translation.review.place') }}:
                                            {{ $item->place }} <br>
                                            <i class="fa-solid fa-clock"></i> {{ __('translation.review.startTime') }}:
                                            {{ $item->start_time }} <br>
                                            <i class="fa-solid fa-user"></i> {{ __('translation.review.organizer') }}:
                                            {{ $item->organizer }} <br>
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <p class="my-0">{{ __('translation.myReview.reportedOrchestras') }}:</p>
                                                @foreach ($item->getMembers->where('status_id', 2) as $member)
                                                    <a class="mb-0" style="text-decoration: none"
                                                        href="{{ route('orchesterPreview', ['id' => $member->orchestra->id]) }}"><b>{{ $member->orchestra->orchestraname }}</b></a>
                                                    <a class="btn btn-success btn-block my-1"
                                                        href="{{ route('accept', ['id' => $member->orchestra->id, 'reviewId' => $item->id]) }}"><i
                                                            class="fa-solid fa-check"></i></i>
                                                        {{ __('translation.myReview.accept') }}</a>
                                                    <a class="btn btn-danger btn-block"
                                                        href="{{ route('deny', ['id' => $member->orchestra->id, 'reviewId' => $item->id]) }}"><i
                                                            class="fa-solid fa-xmark"></i>
                                                        {{ __('translation.myReview.deny') }}</a><br>
                                                @endforeach
                                            </div>
                                            <div class="col">
                                                <p class="my-0">{{ __('translation.myReview.acceptedOrchestras') }}:</p>
                                                @foreach ($item->getMembers->where('status_id', 1) as $member)
                                                    <a class="mb-0 fs-4" style="text-decoration: none"
                                                        href="{{ route('orchesterPreview', ['id' => $member->orchestra->id]) }}"><b>{{ $member->orchestra->orchestraname }}</b></a><br>
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr>
                                        <div class=" mt-3 mx-auto">
                                            {{-- PRZYCISK OD DODAWANIA --}}
                                            @if (Carbon\Carbon::now() > $item->deadline)
                                                @if (!App\Models\Timetable::where('review_id', $item->id)->exists())
                                                    <a class="btn btn-primary"
                                                        href="{{ route('timeTableStore', ['id' => $item->id]) }}">{{ __('translation.myReview.addSchedule') }}</a>
                                                    <label
                                                        class="fs-5">{{ __('translation.myReview.addScheduleDesc') }}</label><br>
                                                @else
                                                    <a class="btn btn-primary"
                                                        href="{{ route('timeTablePivotEdit', ['id' => App\Models\Timetable::where('review_id', $item->id)->first()->id]) }}">{{ __('translation.myReview.editSchedule') }}</a>
                                                    <label
                                                        class="fs-5">{{ __('translation.myReview.editScheduleDesc') }}</label><br>
                                                @endif
                                            @endif
                                            @if (!App\Models\JuryInReview::where('orchester_reviews_id', $item->id)->exists())
                                                <a class="btn btn-primary mt-2 "
                                                    href="{{ route('juryindex', $item->id) }}">{{ __('translation.myReview.jury') }}</a>
                                                <label class="fs-5">{{ __('translation.myReview.juryDesc') }}</label><br>
                                            @else
                                                <a class="btn btn-primary mt-2 "
                                                    href="{{ route('juryEditIndex', ['id' => $item->id]) }}">{{ __('translation.myReview.editJury') }}</a>
                                                <label
                                                    class="fs-5">{{ __('translation.myReview.editJuryDesc') }}</label><br>
                                            @endif
                                            @if (Carbon\Carbon::now() > $item->deadline)
                                                <a class="btn btn-primary mt-2"
                                                    href="{{ route('acceptPerfomanceIndex', $item->id) }}">{{ __('translation.myReview.done') }}</a>
                                                <label
                                                    class="labels fs-5">{{ __('translation.myReview.doneDesc') }}</label><br>
                                            @endif
                                            <hr>
                                            <div class="mt-1 mb-4 d-flex justify-content-center">
                                                <a class="btn btn-warning mt-2 mx-3"
                                                    href="{{ route('orchesterreviewEdit', $item->id) }}">{{ __('translation.myReview.edit') }}</a>
                                                <button class="btn btn-danger mt-2" data-bs-target="#modal"
                                                    data-bs-toggle="modal">{{ __('translation.myReview.delete') }}</button>
                                                <a class="btn btn-dark mt-2 mx-3"
                                                    href="{{ route('finishReview', ['review' => $item->id]) }}">{{ __('translation.myReview.ended') }}</a>
                                            </div>
                                        </div>
                                        <div>
                                            <hr>
                                            <h3 class="text-center mt-4">{{ __('translation.myReview.info2') }}</h3>
                                            <table class="table table-striped mt-4">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nazwa orkiestry</th>
                                                        @foreach ($item->getJury as $jury)
                                                            <th scope="col">
                                                                @if (isset($jury->getUser))
                                                                    {{ $jury->getUser->name }}
                                                                    {{ $jury->getUser->surname }}
                                                                @else
                                                                    {{-- {{ $item->id }} dokończyć --}}
                                                                @endif
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                @foreach ($item->getMembers->where('status_id', 1) as $member)
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                {{ $member->orchestra->orchestraname }}
                                                            </td>
                                                            @foreach ($item->getJury as $jury)
                                                                <td>
                                                                    @if (isset($jury->getUser))
                                                                        @php
                                                                            $rating = App\Models\JuryRating::where('jury_id', $jury->getUser->id)
                                                                                ->where([['orchestra_id', $member->orchestra_id], ['review_id', $item->id]])
                                                                                ->first();
                                                                        @endphp
                                                                        @if (isset($rating))
                                                                            {{ __('translation.myReview.rated') }}
                                                                        @else
                                                                            {{ __('translation.myReview.notRated') }}
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div id="modal" class="modal" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="text-center">Usuń przegląd</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="text-center">
                                                            <p>{{ __('translation.myReview.description') }}</p>
                                                            <div class="panel-body">
                                                                <form class="mt-1 d-flex justify-content-center"
                                                                    action="{{ route('orchesterreviewDestroy', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        class="btn btn-danger mt-2 mx-2">{{ __('translation.myReview.delete') }}</button>
                                                                    <button type="button" class="btn btn-dark mt-2"
                                                                        data-bs-dismiss="modal">{{ __('translation.review.cancel') }}</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $myReviews->links() !!}
    </div>
@endsection
