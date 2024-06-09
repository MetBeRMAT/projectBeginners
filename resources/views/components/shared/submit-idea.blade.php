@if (auth()->user())
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
                    id="content"
                    name="content"
                    rows="3"
                ></textarea>
                @error('content')
                    <x-shared.error-message :message="$message" />
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
@else
    <h4>Login to view the ideas</h4>
@endif
