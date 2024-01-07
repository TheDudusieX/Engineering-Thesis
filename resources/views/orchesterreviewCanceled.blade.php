@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/review.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container py-5">
        <div class="row text-center mb-4">
            <div class="col-lg-7 mx-auto">
                <h1>{{ __('translation.dashboard.cancelreview') }}</h1>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card p-3 mb-4 shadow" style="max-width: 400px">
                <h2 class="text-center">{{ __('translation.review.filters') }}</h2>
                <div class="d-flex justify-content-start align-items-center">
                    <b><p class="mt-3">{{ __('translation.review.search') }}</p></b>
                    <input type="text" class="form-control" placeholder="Wybierz daty" name="daterange"
                        style="max-width: 200px">
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-3 ">
            <div class="row review_container">
                <x-orchester-review-canceled-component :review="$review"/>
            </div>
            <div class="d-flex justify-content-center">
                {!! $review->links() !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="module">
        $(document).ready(function(){
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                autoUpdateInput: false,
                "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Zatwierdź",
        "cancelLabel": "Anuluj",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "nie",
            "pon",
            "wto",
            "śro",
            "czw",
            "pią",
            "sob"
        ],
        "monthNames": [
            "Styczeń",
            "Luty",
            "Marzec",
            "Kwiecień",
            "Maj",
            "Czerwiec",
            "Lipiec",
            "Sierpień",
            "Wrzesień",
            "Październik",
            "Listopad",
            "Grudzień"
        ],
        "firstDay": 1
    },
    
            opens: 'left'
            }, function(start, end, label) {
            //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            var dataFrom = start.format('YYYY-MM-DD');
            var dataTo = end.format('YYYY-MM-DD');
                $(".review_container").html("");
                $.ajax({ 
                url: '{{ route('dateFiltercanceled') }}',
                type: 'POST',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    data: { "dataFrom": dataFrom , "dataTo": dataTo, canceledreview:true },
                },
                success: function(data){
                if(data){
                    $(".review_container").html(data);
                    }
                }
                })
            });
            $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});
        });

    });
</script>
@endpush
