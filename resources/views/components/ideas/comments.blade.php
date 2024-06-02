<div>
    <form action="{{ route('ideas.comments.store', ['idea' => $idea->id]) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($idea->comments as $comment)
    <div class="d-flex align-items-start">
        <img class="avatar-sm rounded-circle me-2" src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi"
            alt="Luigi Avatar" style="width:35px">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">Luigi
                </h6>
                <small class="fs-6 fw-light text-muted">{{ $comment->created_at}}</small>
            </div>
            <p class="fs-6 fw-light mt-3">
                {{ $comment->content}}
            </p>
        </div>
    </div>
    @endforeach
</div>
