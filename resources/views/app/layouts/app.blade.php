<html lang="en">

<head>
    @include('app.layouts.head-tag')
    @yield('head-tag')
    <livewire:styles/>
</head>

<body>

    @include('app.layouts.header')

    @yield('content')

    @include('app.layouts.footer')

    <livewire:scripts>
    @stack('script')
    @include('app.layouts.script')

    @yield('script')


</body>

</html>
