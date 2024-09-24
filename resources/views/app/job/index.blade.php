@extends('app.layouts.app')

@section('head-tag')
    <link href="{{ asset('assets/css/category.css') }}" rel="stylesheet">
    <livewire:styles>
    @endsection

    @section('content')

            <livewire:app.job.index />

        </div>
    @endsection

    @push('script')
        <livewire:scripts>
        @endpush
