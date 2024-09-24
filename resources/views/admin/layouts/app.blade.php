<html lang="en">
<head>

    @include('admin.layouts.head-tag')
    @yield('head-tag')
    <livewire:styles/>

</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: nav bar-->
    @include('admin.layouts.header')
    <!-- END: nav bar-->

    <!-- BEGIN: Main Menu-->
    @include('admin.layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div>
                <div class="content-header row"></div>

                <livewire:admin.check-offline />

                {{-- body content --}}
                @yield('content')
                {{-- body content --}}

            </div>
        </div>
    <!-- END: Content-->
    <div>

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

    </div>

    <livewire:scripts>
    @include('admin.layouts.scripts')
    @yield('scripts')
    @stack('scripts')

</html> 