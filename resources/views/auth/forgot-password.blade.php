<x-guest-layout>

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">
                                        {{ __('Forgot your password? No problem.
                                        Just let us know your email address and we will email you
                                        a password reset link that will allow you to choose a new one.') }}
                                    </p>
                                </div>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form method="POST" class="user" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <x-input type="email" class="form-control form-control-user"
                                        name="email" :value="old('email')" required
                                            placeholder="Enter Email Address..." />
                                    </div>
                                    <x-button class="btn btn-primary btn-user btn-block">
                                        {{ __('Email Password Reset Link') }}
                                    </x-button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('home') }}">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</x-guest-layout>
