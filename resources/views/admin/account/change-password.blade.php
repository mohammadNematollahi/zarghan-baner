@extends('admin.layouts.app')
@section('head-tag')
    <title>تنظیمات حساب کاربری</title>
@endsection
@section('content')
<section class="col-12 bg-white p-3 d-flex justify-content-around align-items-center">
    <livewire:admin.account.change-password />
</section>
@endsection
