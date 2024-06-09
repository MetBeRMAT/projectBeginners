<x-layout.layout>
    <form
        action="{{ route('register.store') }}"
        method="post"
    >
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-6">
                    <form
                        class="form mt-5"
                        action=""
                        method="post"
                    >
                        <h3 class="text-dark text-center">Register</h3>
                        <div class="form-group">
                            <label
                                class="text-dark"
                                for="name"
                            >Name:</label><br>
                            <input
                                class="form-control"
                                id="name"
                                name="name"
                                type="text"
                            >
                        </div>
                        @error('name')
                            <x-shared.error-message :message="$message" />
                        @enderror
                        <div class="form-group mt-3">
                            <label
                                class="text-dark"
                                for="email"
                            >Email:</label><br>
                            <input
                                class="form-control"
                                id="email"
                                name="email"
                                type="email"
                            >
                        </div>
                        @error('email')
                            <x-shared.error-message :message="$message" />
                        @enderror
                        <div class="form-group mt-3">
                            <label
                                class="text-dark"
                                for="password"
                            >Password:</label><br>
                            <input
                                class="form-control"
                                id="password"
                                name="password"
                                type="password"
                            >
                        </div>
                        @error('password')
                            <x-shared.error-message :message="$message" />
                        @enderror
                        <div class="form-group mt-3">
                            <label
                                class="text-dark"
                                for="password_confirmation"
                            >Confirm Password:</label><br>
                            <input
                                class="form-control"
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                            >
                        </div>
                        @error('password_confirmation')
                            <x-shared.error-message :message="$message" />
                        @enderror
                        <div class="form-group">
                            <label
                                class="text-dark"
                                for="remember-me"
                            ></label><br>
                            <input
                                class="btn btn-dark btn-md"
                                name="submit"
                                type="submit"
                                value="submit"
                            >
                        </div>
                        <div class="mt-2 text-right">
                            <a
                                class="text-dark"
                                href="/login"
                            >Login here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</x-layout.layout>
