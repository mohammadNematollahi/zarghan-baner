@extends('app.layouts.app')
@section('head-tag')
    <link href="{{ asset('assets/css/market.css') }}" rel="stylesheet" />
    <title>بارگذاری موقغیت کاری</title>
@endsection
@section('content')
    <section id="app" class="pb-4 col-12">
        <section id="container" class="container p-0 p-md-5 h-auto rounded d-flex align-items-center justify-content-center">
            <div class="p-0 m-0 col-12 h-auto p-3 shadow-sm rounded">
                {{-- form --}}
                <livewire:dashboard.job.edit :job="$job"/>
                {{-- form --}}
            </div>
        </section>
    </section>
@endsection
@section('scripts')
    <script>
        $("#my-decimal-number").keyup(function(e) {
            const thisElement = e.target;
            let thisElementValue = thisElement.value;
            thisElementValue = thisElementValue.replace(/,/g, "");

            let separatedNumber = thisElementValue.toString();
            separatedNumber = separatedNumber.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            thisElement.value = separatedNumber;
        });
    </script>
@endsection
