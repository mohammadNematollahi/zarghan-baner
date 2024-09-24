@extends('app.layouts.app')
@section('head-tag')
    <link href="{{asset('assets/css/market.css')}}" rel="stylesheet" />
    <title>اطلاع خطا در وب سایت</title>
@endsection
@section('content')
<section id="app" class="pb-4 col-12">
    <section id="container" class="container p-0 p-md-5 h-auto rounded d-flex align-items-center justify-content-center">
        <div class="p-0 m-0 col-12 h-auto p-3 shadow-sm rounded">
            {{-- form --}}
                <livewire:dashboard.ticket.create />
            {{-- form --}}
        </div>
    </section>
  </section>
@endsection
