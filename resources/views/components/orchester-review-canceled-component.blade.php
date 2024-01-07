@foreach ($review as $item)
    <div class="col-md-4">
        <div class="card p-3 mb-4 shadow">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div class="icon"> <i class="fa-solid fa-drum"></i> </div>
                    <div class="ms-2 c-details">
                        <a class="mb-0 fs-4" style="text-decoration: none"
                            href="{{ route('orchesterPreview', ['id' => $item->getOrganizer->id]) }}"><b>{{ $item->organizer }}</b></a><br>
                        <span>{{ (new Carbon\Carbon($item->created_at))->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h2 class="heading">{{ $item->name }}</h2>
                <p class="font-italic mb-0 transform">
                    <i class="fa-solid fa-calendar-days"></i> {{ __('translation.review.term') }}:
                    {{ $item->term }} <br>
                    <i class="fa-solid fa-clock"></i> {{ __('translation.review.startTime') }}:
                    {{ $item->start_time }} <br>
                    <i class="fa-solid fa-stopwatch"></i> {{ __('translation.review.deadline') }}:
                    {{ $item->deadline }}<br>
                    <i class="fa-solid fa-location-dot"></i> {{ __('translation.review.place') }}:
                    {{ $item->place }}, {{ $item->information }} <br>
                </p>
                <div class="mt-5">
                    {{-- <div class="progress">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ ($item->current_number_of_orchestras * 100) / $item->maximum_number_of_orchestras }}%">
                        </div>
                    </div>
                    <div class="mt-1 mb-2"> <span class="text1">{{ __('translation.review.members') }}
                            {{ $item->current_number_of_orchestras }}/{{ $item->maximum_number_of_orchestras }}</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endforeach
