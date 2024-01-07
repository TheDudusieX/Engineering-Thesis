{{-- <div class="container w-100">
    <div class="toast-container">
      @if (session('success'))
        @if(is_array(session('success')))
          @foreach (session('success') as $message)
            <div class="mb-4 alert alert-success" type="success">
              {{ $message }}
            </div>
          @endforeach
        @else
          <div class="mb-4 alert alert-success" type="success">
            {{ session('success') }}
          </div>
        @endif
      @endif
      @if (session('warning'))
        @if(is_array(session('warning')))
          @foreach (session('warning') as $message)
            <div class="mb-4 alert alert-warning" type="warning">
              {{ $message }}
            </div>
          @endforeach
        @else
          <div class="mb-4 alert alert-warning" type="warning">
            {{ session('warning') }}
          </div>
        @endif
      @endif   
      @if (session('danger'))
        @if(is_array(session('danger')))
          @foreach (session('danger') as $message)
            <div class="mb-4 alert alert-danger" type="danger">
              {{ $message }}
            </div>
          @endforeach
        @else
          <div class="mb-4 alert alert-danger" type="danger">
            {{ session('danger') }}
          </div>
        @endif
      @endif   
    </div>
  </div> --}}

<div class="toast-container position-absolute top-0 end-0 p-3 z-10 mt-5">
  @if (session('success'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fa-solid fa-check me-2 rounded-md text-success"></i>
                    <strong class="me-auto text-success fw-bold">System</strong>
                    <a data-bs-dismiss="toast"> <i class="fa-solid fa-circle-xmark fa-xl" style="cursor: pointer;"></i></a>
                </div>
                @if (is_array(session('success')))
                    @foreach (session('success') as $message)
                        <div class="toast-body fw-bold">
                            {{ $message }}
                        </div>
                    @endforeach
                @else
                    <div class="toast-body fw-bold">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        @endif
        @if (session('warning'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                  <i class="fa-solid fa-exclamation"></i>
                    <strong class="me-auto text-warning fw-bold">System</strong>
                    <a data-bs-dismiss="toast"> <i class="fa-solid fa-circle-xmark fa-xl" style="cursor: pointer;"></i></a>
                </div>
                @if (is_array(session('warning')))
                    @foreach (session('warning') as $message)
                        <div class="toast-body fw-bold">
                            {{ $message }}
                        </div>
                    @endforeach
                @else
                    <div class="toast-body fw-bold">
                        {{ session('warning') }}
                    </div>
                @endif
            </div>
        @endif
        @if (session('danger'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fa-solid fa-check me-2 rounded-md text-danger"></i>
                    <strong class="me-auto text-danger fw-bold">System</strong>
                    <a data-bs-dismiss="toast"> <i class="fa-solid fa-circle-xmark fa-xl" style="cursor: pointer;"></i></a>
                </div>
                @if (is_array(session('danger')))
                    @foreach (session('danger') as $message)
                        <div class="toast-body fw-bold">
                            {{ $message }}
                        </div>
                    @endforeach
                @else
                    <div class="toast-body fw-bold">
                        {{ session('danger') }}
                    </div>
                @endif
            </div>
        @endif
</div>