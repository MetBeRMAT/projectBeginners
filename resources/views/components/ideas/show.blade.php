<x-layouts.app>
    <div class="card">
        <div class="px-3 pb-2 pt-4">

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img
                        class="avatar-sm rounded-circle me-2"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario"
                        alt="Mario Avatar"
                        style="width:50px"
                    >
                    <div>
                        <h5 class="card-title mb-0"><a href="#"> Mario
                            </a></h5>
                    </div>
                    <form
                        action="{{ route('ideas.destroy', ['idea' => $idea->id]) }}"
                        method="post"
                    >
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
                <form
                    action="{{ route('ideas.update', ['idea' => $idea->id]) }}"
                    method="post"
                >
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea
                            class="form-control"
                            id="idea"
                            name="idea"
                            rows="3"
                        >{{ $idea->content }}</textarea>
                        @error('idea')
                            <x-alert.error-message :message="$message" />
                        @enderror
                    </div>
                    <div class="">
                        <button
                            class="btn btn-dark"
                            type="submit"
                        > Update </button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->content }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <a
                        class="fw-light nav-link fs-6"
                        href="#"
                    > <span class="fas fa-heart me-1">
                        </span> {{ $idea->likes }} </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at }} </span>
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <textarea
                        class="fs-6 form-control"
                        rows="1"
                    ></textarea>
                </div>
                <div>
                    <button class="btn btn-primary btn-sm"> Post Comment </button>
                </div>

                <hr>
                <div class="d-flex align-items-start">
                    <img
                        class="avatar-sm rounded-circle me-2"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi"
                        alt="Luigi Avatar"
                        style="width:35px"
                    >
                    <div class="w-100">
                        <div class="d-flex justify-content-between">
                            <h6 class="">Luigi
                            </h6>
                            <small class="fs-6 fw-light text-muted"> 3 hour
                                ago</small>
                        </div>
                        <p class="fs-6 fw-light mt-3">
                            and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                            Evil)
                            by
                            Cicero, written in 45 BC. This book is a treatise on the theory of
                            ethics,
                            very
                            popular during the Renaissan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
