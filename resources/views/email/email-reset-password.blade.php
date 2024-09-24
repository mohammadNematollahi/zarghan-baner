@extends('email.layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center h-100">
    <h2 class="text-center text-info my-2">
        {{$details["title"]}}
    </h2>

    <p>
        برای تغییر رمز لطفا بر روی لینک کلیک کنید
    </p>

    <a href="{{$details["link"]}}">کلیک کنید</a>

</div>
@endsection