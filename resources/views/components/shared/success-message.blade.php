@if (session()->has('success'))
    <div
        class="alert alert-success alert-dismissible fade show"
        role="alert"
    >
        {{ session('success') }}
        <button
            class="btn-close"
            data-bs-dismiss="alert"
            type="button"
            aria-label="Close"
        ></button>
    </div>
@endif
