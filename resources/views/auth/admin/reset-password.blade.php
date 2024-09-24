@extends('auth.admin.layouts.app')
@section('content')
<section class="d-flex h-100 justify-content-center align-items-center" id="container">
    <div class="col-11 col-md-6 col-lg-4 d-flex flex-column flex-wrap p-5 shadow rounded">
        <form method="POST" action="{{ route('login.admin.reset.password.send.mail') }}">
            @csrf
            @method('post')
            <div class="form-outline mb-4">
                <label class="form-label" for="email">ایمیل :</label>
                <input type="email" id="email" class="form-control" name="email"
                    value="{{ old('email') }}" />
                @error('email')
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