<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="fs-5 text-danger">
            {{ __('auth.something_went_wrong') }}
        </div>
        <ul class="mt-3 text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif