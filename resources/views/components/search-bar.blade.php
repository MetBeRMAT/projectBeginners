<div class="card">

    <div class="card-header border-0 pb-0">
        <h5 class="">Search</h5>
    </div>

    <form
        action={{ route('home') }}
        method="get"
    >
        <div class="card-body">
            <input
                class="form-control w-100"
                name="search"
                type="text"
                placeholder="..."
            >
            <button class="btn btn-dark mt-2"> Search</button>
        </div>
    </form>
</div>
