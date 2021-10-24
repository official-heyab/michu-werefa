<x-guest-layout>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" class="user" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Name: </label>
                                    <x-input type="text" class="form-control form-control-user" id="name"
                                    name="name" :value="old('name')" required />
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone: </label>
                                    <x-input type="text" class="form-control form-control-user" id="phone"
                                    name="phone" :value="old('phone')" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email: </label>
                                <x-input type="email" class="form-control form-control-user" id="email"
                                type="email" name="email" :value="old('email')" required />
                            </div>
                            <div class="form-group row">
                                <!-- Password -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Password: </label>
                                    <x-input type="password" class="form-control form-control-user"
                                        autocomplete="new-password" name="password" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Repeat Password: </label>
                                    <x-input type="password" class="form-control form-control-user"
                                        name="password_confirmation" required/>
                                </div>
                            </div>
                            <x-button class="btn btn-primary btn-user btn-block">
                                {{ __('Register Account') }}
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
</x-guest-layout>
