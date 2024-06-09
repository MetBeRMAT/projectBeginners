<div class="card">
    <form
        action="{{ route('users.update', $user->id) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')
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
                        <input
                            name='name'
                            type="text"
                            value={{ $user->name }}
                        >
                        @error('name')
                            <span class="text-danger d-block fs-6 mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    @if (auth()->id() === $user->id)
                        <a href="{{ route('users.show', $user->id) }}">View</a>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <label for="">Profile Picture</label>
                <input
                    class="form-control"
                    name='image'
                    type="file"
                ></input>
                @error('image')
                    <span class="text-danger d-block fs-6 mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4 px-2">
                <h5 class="fs-5"> Bio : </h5>
                <textarea
                    class="form-control"
                    id="bio"
                    name="bio"
                    rows="3"
                >{{ $user->bio }}</textarea>
                @error('bio')
                    <x-shared.error-message :message="$message" />
                @enderror

                <button>Save</button>

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
            </div>
        </div>
    </form>
</div>
