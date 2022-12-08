<x-guest-layout>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    <p id="capsWarning">WARNING! Caps lock is ON.</p>
                                </div>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form method="POST" id="loginForm"  class="user" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="form-group">
                                        <label>Email Address: </label>
                                        <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" required autofocus />
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label>Password: </label>
                                        <x-input id="password" class="form-control form-control-user"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="remember_me"  name="remember">
                                            <label class="custom-control-label" for="remember_me">{{ __('Remember me') }}</label>
                                        </div>
                                    </div>

                                    <x-button class="btn btn-primary btn-user btn-block">
                                        {{ __('Log in') }}
                                    </x-button>
                                </form>
                                <hr>

                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                        <a class="small" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
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
        <style>
            #capsWarning {display:none;color:red}
        </style>

        <script>
            // Get the fields
            var text = document.getElementById("capsWarning");
            var form = document.getElementById("loginForm");

            // When the user presses any key on the keyboard, run the function
            form.addEventListener("keyup", function(event) {
            // If "caps lock" is pressed, display the warning text
                if (event.getModifierState("CapsLock")) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none"
                }
            });
        </script>



</x-guest-layout>
