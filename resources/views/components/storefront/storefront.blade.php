<x-layouts.app>
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                <div class="card overflow-hidden">
                    <div class="card-body pt-3">
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item">
                                <a
                                    class="nav-link text-dark"
                                    href="#"
                                >
                                    <span>Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="#"
                                >
                                    <span>Explore</span></a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="#"
                                >
                                    <span>Feed</span></a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href={{ route('terms.index') }}
                                >
                                    <span>Terms</span></a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="#"
                                >
                                    <span>Support</span></a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="#"
                                >
                                    <span>Settings</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer py-2 text-center">
                        <a
                            class="btn btn-link btn-sm"
                            href="#"
                        >View Profile </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <x-alert.success-message />
                <x-storefront.form-idea />
                <hr>
                @foreach ($ideas as $idea)
                    <div class="mt-3">
                        <x-storefront.content :idea="$idea" />
                    </div>
                @endforeach
                {{ $ideas->links() }}
            </div>
            <div class="col-3">
                <x-search-bar />
                <div class="card mt-3">
                    <div class="card-header border-0 pb-0">
                        <h5 class="">Who to follow</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack mb-3 gap-2">
                            <div class="avatar">
                                <a href="#!"><img
                                        class="avatar-img rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario"
                                        alt=""
                                    ></a>
                            </div>
                            <div class="overflow-hidden">
                                <a
                                    class="h6 mb-0"
                                    href="#!"
                                >Mario Brother</a>
                                <p class="small text-truncate mb-0">@Mario</p>
                            </div>
                            <a
                                class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                                href="#"
                            ><i class="fa-solid fa-plus"> </i></a>
                        </div>
                        <div class="hstack mb-3 gap-2">
                            <div class="avatar">
                                <a href="#!"><img
                                        class="avatar-img rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario"
                                        alt=""
                                    ></a>
                            </div>
                            <div class="overflow-hidden">
                                <a
                                    class="h6 mb-0"
                                    href="#!"
                                >Mario Brother</a>
                                <p class="small text-truncate mb-0">@Mario</p>
                            </div>
                            <a
                                class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                                href="#"
                            ><i class="fa-solid fa-plus"> </i></a>
                        </div>
                        <div class="d-grid mt-3">
                            <a
                                class="btn btn-sm btn-primary-soft"
                                href="#!"
                            >Show More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
