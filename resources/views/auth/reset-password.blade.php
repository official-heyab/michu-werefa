<x-guest-layout>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                        </div>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" class="user" action="{{ route('password.update') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div class="form-group">
                                <x-input id="email" class="form-control form-control-user"
                                type="email" name="email" :value="old('email', $request->email)"
                                placeholder="Enter Email Address..." required autofocus />
                            </div>

                            <div class="form-group row">
                                <!-- Password -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <x-input id="password" class="form-control form-control-user"
                                    type="password" name="password" placeholder="Password" required />
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-sm-6">
                                    <x-input id="password_confirmation" class="form-control form-control-user"
                                    type="password" placeholder="Confirm Password" name="password_confirmation" required />
                                </div>
                            </div>

                            <x-button  class="btn btn-primary btn-user btn-block">
                                {{ __('Reset Password') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
