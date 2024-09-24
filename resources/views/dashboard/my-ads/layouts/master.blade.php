@extends('app.layouts.app')
@section('head-tag')
    <link href="{{ asset('assets/css/panel-usre.css') }}" rel="stylesheet" />
    <title>داشبورد</title>
@endsection
@section('content')
    <section class="container">
        <section class="p-3 border-bottom border-2 mt-3">
            <h2>@yield('h2')</h2>
        </section>

        <section class="p-0 m-0 mt-1">
            <a href="{{ route('dashboard.my-ads.showMarket') }}" class="btn text-success">بازار</a>
            <a href="{{ route('dashboard.my-ads.showJob') }}" class="btn text-primary">درخواست های نیروی کار</a>
        </section>

        @yield('body')

    </section>
@endsection
