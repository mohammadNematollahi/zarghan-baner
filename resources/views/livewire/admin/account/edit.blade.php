<section class="col-12 bg-white p-3 d-flex justify-content-around align-items-center">
<form wire:submit.prevent='update' class="col-12 d-flex justify-content-center align-content-center flex-wrap" style="box-sizing: border-box">
    <div class="col-5">
        <label for="usernmae">نام کاربری :</label>
        <input type="text" class="border-bottom border-top-0 border-left-0 border-right-0 p-1 col-9" wire:model.lazy='user.username' style="outline: none">
        @error('user.username')
            <span class="mt-1">{{$message}}</span>
        @enderror
    </div>
    <div class="col-5">
        <label for="usernmae">ایمیل :</label>
        <input type="email" class="border-bottom border-top-0 border-left-0 border-right-0 p-1 col-9" wire:model.lazy='user.email' style="outline: none">
        @error('user.email')
            <span class="mt-1">{{$message}}</span>
        @enderror
    </div>

    <div>
        <input type="submit" class="btn btn-success d-flex justify-content-center align-content-center" value="ثبت تغییرات">
    </div>

    <div wire:loading wire:target="update" class="text-cente mt-5">
        <div class="spinner-border text-success" role="status"></div>
        <span>در حال ذخیره ...</span>
    </div>
</form>

</section>