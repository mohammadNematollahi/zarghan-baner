@extends('auth.admin.layouts.app')
@section('content')
    <section class="d-flex h-100 justify-content-center align-items-center" id="container">
        <div class="col-11 col-md-6 col-lg-4 d-flex flex-column flex-wrap p-5 shadow rounded">
            <form method="POST" action="{{ route('login.admin.store') }}">
                @csrf
                @method('post')

                <div class="form-outline mb-4">
                    <label class="form-label" for="username">نام کاربری :</label>
                    <input type="text" id="username" class="form-control" name="username" value="{{ old('username') }}" />
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-2">
                    <div class="mb-1">
                        <i class="ri-eye-close-line cursor-pointer mx-1" id="close-eye-password"></i>
                        <i class="ri-eye-2-line cursor-pointer mx-1 d-none" id="eye-password"></i>
                        <label for="password">رمز عبور :</label>
                        <i class="ri-git-repository-private-line"></i>
                    </div>
                    <input type="password" id="password" class="form-control" name="password" />
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                @if (session('error'))
                    <div class="mb-4">
                        <span class="text-danger">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                            <label class="form-check-label" for="remember">مرا به خاطر بسپار</label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Simple link -->
                        <a href="{{ route('login.admin.reset.password.index') }}">رمز را فراموش کردید ؟</a>
                    </div>
                </div>

                @error('g-recaptcha-response')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-success col-5" value="تایید">
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $("#close-eye-password").on("click", function() {
            $("#password").attr("type", "text");
            $("#close-eye-password").addClass("d-none");
            $("#eye-password").removeClass("d-none");
        });

        $("#eye-password").on("click", function() {
            $("#password").attr("type", "password");
            $("#eye-password").addClass("d-none");
            $("#close-eye-password").removeClass("d-none");
        });
    </script>
@endsection
