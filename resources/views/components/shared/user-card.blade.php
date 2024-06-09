<div class="card">
    <div class="px-3 pb-2 pt-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img
                    class="avatar-sm rounded-circle me-3"
                    src="{{ $user->getImageURL() }}"
                    alt="Mario Avatar"
                    style="width:150px"
                >
                <div>
                    <h3 class="card-title mb-0"><a href="#">{{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            <div>
                @if (auth()->id() === $user->id)
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                @endif
            </div>
        </div>
        <div class="mt-4 px-2">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>

            <div class="d-flex justify-content-start">
                <a
                    class="fw-light nav-link fs-6 me-3"
                    href="#"
                > <span class="fas fa-user me-1">
                    </span> 0 Followers </a>
                <a
                    class="fw-light nav-link fs-6 me-3"
                    href="#"
                > <span class="fas fa-brain me-1">
                    </span> {{ $user->ideas()->count() }} </a>
                <a
                    class="fw-light nav-link fs-6"
                    href="#"
                > <span class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count() }} </a>
            </div>
            @if (auth()->id() !== $user->id)
                <div class="mt-3">
                    @if (auth()->user()->follows($user))
                        <form
                            action="{{ route('user.unfollow', $user->id) }}"
                            method="post"
                        >
                            @csrf
                            <button class="btn btn-primary btn-sm"> UnFollow </button>
                        </form>
                    @else
                        <form
                            action="{{ route('user.follow', $user->id) }}"
                            method="post"
                        >
                            @csrf
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
