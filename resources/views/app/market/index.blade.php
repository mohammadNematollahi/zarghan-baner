@extends('app.layouts.app')
@section('head-tag')
    <livewire:styles />
@endsection

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('assets/css/market.css') }}">
@endsection

@section('content')
    <livewire:app.market.index />
@endsection


@section('script')
    <livewire:scripts />
    <script src="{{ asset('assets/js/market.js') }}"></script>
@endsection
