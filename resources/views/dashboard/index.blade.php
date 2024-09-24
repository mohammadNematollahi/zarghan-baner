@extends('app.layouts.app')
@section('head-tag')
    <link href="{{ asset('assets/css/panel-usre.css') }}" rel="stylesheet" />
    <title>داشبورد</title>
@endsection
@section('content')
    <section id="app" class="h-auto d-flex justify-content-center align-items-center">
        <div class="col-10 p-2 mt-5 shadow rounded bg-white">

            <!-- ======= User ======= -->
            <div id="user" class="col-12 p-2 border-bottom border-3 border-success shadow-sm">
                <a href="update-user.html" class="col-12 d-block link-dark">
                    <div class="col-12 d-flex justify-content-between">
                        <ul class="p-0 m-0 list-unstyled">
                            <li><i class="ri-user-received-2-fill p-1"></i>{{ auth()->user() == null ? auth()->guard("admin")->user()->username : auth()->user()->username }}</li>
                            <li class="text-dark-emphasis font-siz-small">{{ auth()->user() == null ? auth()->guard("admin")->user()->email : auth()->user()->email }}</li>
                        </ul>
                        <i class="ri-arrow-left-s-line font-15-rem text-dark"></i>
                    </div>
                </a>
            </div>
            <!-- ======= End User ======= -->


            <!-- ======= Category User ======= -->
            <div class="col-12 p-2">
                <ul class="list-unstyled p-0 pb-3 border-bottom border-1 col-12 m-0">
                    <li>
                        <a href="{{ route('dashboard.job.create') }}" class="attribute-user d-block mt-3 text-dark">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-pass-valid-line font-15-rem p-1 "></i>درخواست نیروی کار
                                </span>
                                <i class="ri-arrow-left-s-line font-15-rem text-dark p-1"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.market.create') }}" class="attribute-user d-block text-dark mt-3">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-store-3-line font-15-rem p-1"></i>بارگذاری مغازه خود
                                </span>
                                <i class="ri-arrow-left-s-line font-15-rem text-dark p-1"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="attribute-user d-block text-dark mt-3">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-bookmark-3-line font-15-rem p-1"></i>دخیره های من
                                </span>
                                <i class="ri-arrow-left-s-line font-15-rem text-dark p-1"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.my-ads.showMarket') }}" class="attribute-user d-block text-dark mt-3">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-archive-stack-line font-15-rem p-1"></i> اگهی های من
                                </span>
                                <i class="ri-arrow-left-s-line font-15-rem text-dark p-1"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="attribute-user d-block text-dark mt-3">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-question-answer-line font-15-rem p-1"></i>نظرات من
                                </span>
                                <i class="ri-arrow-left-s-line font-15-rem text-dark p-1"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="attribute-user d-block text-dark mt-3">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-smartphone-line font-15-rem p-1"></i>تغییر شماره تلفن
                                </span>
                                <i class="ri-arrow-left-s-line font-15-rem text-dark p-1"></i>
                            </div>
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled p-0 col-12 m-0">
                    <li>
                        <a href="" class="attribute-user d-block mt-3 text-dark"
                            style="border-right: 3px solid skyblue">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-group-line font-15-rem p-1"></i>ارتباط با ما
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.ticket.create') }}" class="attribute-user d-block mt-3 text-dark"
                            style="border-right: 3px solid skyblue">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-bug-line font-15-rem p-1"></i>اطلاع خطا در وب سایت
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="attribute-user d-block mt-3 text-dark" style="border-right: 3px solid red">
                            <div class="col-12 d-flex justify-content-between">
                                <span>
                                    <i class="ri-logout-circle-r-line font-15-rem p-1"></i>خروج
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- ======= End Category User ======= -->

        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".attribute-user").hover(
                function() {
                    $(this).addClass("shadow-sm p-3");
                },
                function() {
                    $(this).removeClass("shadow-sm p-3");
                }
            );
        });
    </script>
@endsection
