<x-layouts.app>
    <div class="card">
        <div class="px-3 pb-2 pt-4">

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img class="avatar-sm rounded-circle me-2"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar"
                        style="width:50px">
                    <div>
                        <h5 class="card-title mb-0"><a href="#"> Mario
                            </a></h5>
                    </div>
                    <form action="{{ route('ideas.destroy', ['idea' => $idea->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button>X</button>
                        <a href="{{ route('ideas.show', ['idea' => $idea->id]) }}">Views</a>
                        <a href="{{ route('ideas.edit', ['idea' => $idea->id]) }}">Edit</a>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if ($editing ?? false)
            <x-alert.success-message />
            <form action="{{ route('ideas.update', ['idea' => $idea->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="idea" name="idea" rows="3">{{ $idea->content }}</textarea>
                    @error('idea')
                    <x-alert.error-message :message="$message" />
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark" type="submit"> Update </button>
                </div>
            </form>
            @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <a class="fw-light nav-link fs-6" href="#"> <span class="fas fa-heart me-1">
                        </span> {{ $idea->likes }} </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at }} </span>
                </div>
            </div>
            <x-ideas.comments :idea="$idea" />
        </div>
    </div>

</x-layouts.app>
