<form wire:submit.prevent='update' class="col-12 d-flex justify-content-center align-content-center flex-wrap">

    <div class="col-12 my-1">
        <div>
            <i class="ri-eye-close-line cursor-pointer mx-1" id="close-eye-current-password"></i>
            <i class="ri-eye-2-line cursor-pointer mx-1 d-none" id="eye-current-password"></i>
            <label for="current-password">رمز عبور فعلی :</label>
            <i class="ri-git-repository-private-line"></i>
        </div>
        <input type="password" id="current-password"
        class="border-bottom border-top-0 border-left-0 border-right-0 p-1 col-12" wire:model.lazy='password'
        style="outline: none">
        @error('password')
        <span class="mt-1 text-danger">{{ $message }}</span>
        @enderror
        @if (session("password"))
            <span class="mt-1 text-danger">{{ session("password") }}</span>
        @endif
    </div>

    <div class="col-12">
        <div>
            <i class="ri-eye-close-line cursor-pointer mx-1" id="close-eye-new-password"></i>
            <i class="ri-eye-2-line cursor-pointer mx-1 d-none" id="eye-new-password"></i>
            <label for="new-password">رمز عبور جدید : </label>
            <i class="ri-git-repository-private-line"></i>
        </div>
        <input type="password" id="new-password"
        class="border-bottom border-top-0 border-left-0 border-right-0 p-1 col-12" wire:model.lazy='newPassword'
        style="outline: none">
        @error('newPassword')
        <span class="mt-1  text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 mt-1">
        <div>
            <i class="ri-eye-close-line cursor-pointer mx-1" id="close-eye-confirm-password"></i>
            <i class="ri-eye-2-line cursor-pointer mx-1 d-none" id="eye-confirm-password"></i>
            <label for="passwordConfirmation">رمز عبور جدید را دوباره وارد کنید :</label>
            <i class="ri-git-repository-private-line"></i>
        </div>
        <input type="password" id="passwordConfirmation"
            class="border-bottom border-top-0 border-left-0 border-right-0 p-1 col-12" style="outline: none"
            wire:model.lazy='passwordConfirmation'>
        @error('passwordConfirmation')
            <span class="mt-1  text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 mt-3 text-left">
        <a href="{{route("login.admin.reset.password.index")}}">رمز عبور را فراموش کرده اید ؟</a>
    </div>

    <div class="col-12 d-flex justify-content-end mt-2">
        <input type="submit" class="btn btn-success d-flex justify-content-center align-content-center"
            value="ثبت تغییرات">
    </div>

</form>

@push('scripts')
    <script>
        $("#close-eye-new-password").on("click", function () {
            $("#new-password").attr("type", "text");
            $("#close-eye-new-password").addClass("d-none");
            $("#eye-new-password").removeClass("d-none");
        });

        $("#eye-new-password").on("click", function () {
            $("#new-password").attr("type", "password");
            $("#eye-new-password").addClass("d-none");
            $("#close-eye-new-password").removeClass("d-none");
        });

        $("#close-eye-current-password").on("click", function () {
            $("#current-password").attr("type", "text");
            $("#close-eye-current-password").addClass("d-none");
            $("#eye-current-password").removeClass("d-none");
        });

        $("#eye-current-password").on("click", function () {
            $("#current-password").attr("type", "password");
            $("#eye-current-password").addClass("d-none");
            $("#close-eye-current-password").removeClass("d-none");
        });

        $("#close-eye-confirm-password").on("click", function () {
            $("#passwordConfirmation").attr("type", "text");
            $("#close-eye-confirm-password").addClass("d-none");
            $("#eye-confirm-password").removeClass("d-none");
        });

        $("#eye-confirm-password").on("click", function () {
            $("#passwordConfirmation").attr("type", "password");
            $("#eye-confirm-password").addClass("d-none");
            $("#close-eye-confirm-password").removeClass("d-none");
        });

    </script>
@endpush
