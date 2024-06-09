<nav
    class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark"
>
    <div class="container">
        <a
            class="navbar-brand fw-light"
            href="/"
        ><span class="fas fa-brain me-1"> </span>Ideas</a>
        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            type="button"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="navbar-collapse justify-content-end collapse"
            id="navbarNav"
        >
            <ul class="navbar-nav">
                @if (auth()->guest())
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            href="{{ route('login') }}"
                            aria-current="page"
                        >Login</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('register') }}"
                        >Register</a>
                    </li>
                @else
                    @if (auth()->user()->is_admin)
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ route('admin.dashboard') }}"
                            >Admin Dashboard</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('profile') }}"
                        >{{ auth()->user()->email }}</a>
                    </li>
                    <form
                        action="{{ route('logout') }}"
                        method="get"
                    ></form>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="/logout"
                        >Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
