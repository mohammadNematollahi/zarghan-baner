@extends('auth.admin.layouts.app')
@section('content')
    <section class="d-flex h-100 justify-content-center align-items-center" id="container">
        <div class="col-11 col-md-6 col-lg-4 d-flex flex-column flex-wrap p-5 shadow rounded">
            <form method="POST" action="{{ route('login.admin.reset.password.change.password.store' , $id) }}">
                @csrf
                @method('post')
                
                <div class="form-outline mb-2">
                    <div class="mb-1">
                        <i class="ri-eye-close-line cursor-pointer mx-1" id="close-eye-new-password"></i>
                        <i class="ri-eye-2-line cursor-pointer mx-1 d-none" id="eye-new-password"></i>
                        <label for="new-password">رمز عبور جدید  :</label>
                        <i class="ri-git-repository-private-line"></i>
                    </div>
                    <input type="password" id="new-password" class="form-control" name="password" />
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-outline mb-2">
                    <div class="mb-1">
                        <i class="ri-eye-close-line cursor-pointer mx-1" id="close-eye-confirm-password"></i>
                        <i class="ri-eye-2-line cursor-pointer mx-1 d-none" id="eye-confirm-password"></i>
                        <label for="confirm-password">تکرار رمز عبور :</label>
                        <i class="ri-git-repository-private-line"></i>
                    </div>
                    <input type="password" id="confirm-password" class="form-control" name="confirm_password" />
                    @error('confirm_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
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
        $("#close-eye-new-password").on("click", function() {
            $("#new-password").attr("type", "text");
            $("#close-eye-new-password").addClass("d-none");
            $("#eye-new-password").removeClass("d-none");
        });

        $("#eye-new-password").on("click", function() {
            $("#new-password").attr("type", "password");
            $("#eye-new-password").addClass("d-none");
            $("#close-eye-new-password").removeClass("d-none");
        });

        $("#close-eye-confirm-password").on("click", function() {
            $("#confirm-password").attr("type", "text");
            $("#close-eye-confirm-password").addClass("d-none");
            $("#eye-confirm-password").removeClass("d-none");
        });

        $("#eye-confirm-password").on("click", function() {
            $("#confirm-password").attr("type", "password");
            $("#eye-confirm-password").addClass("d-none");
            $("#close-eye-confirm-password").removeClass("d-none");
        });
    </script>
@endsection
