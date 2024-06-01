<h4> Share yours ideas </h4>
<div class="row">
    <form
        action="{{ route('ideas.store') }}"
        method="post"
    >
        @csrf
        <div class="mb-3">
            <textarea
                class="form-control"
                id="idea"
                name="idea"
                rows="3"
            ></textarea>
            @error('idea')
                <x-alert.error-message :message="$message" />
            @enderror
        </div>
        <div class="">
            <button
                class="btn btn-dark"
                type="submit"
            > Share </button>
        </div>
    </form>
</div>