@extends('app.layouts.app')

@section('head-tag')
    <link href="{{ asset('assets/css/category.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="app" class="container d-flex justify-content-center h-100 pt-5">
        <!--main start-->
        <main class="col-12 col-lg-10 d-none d-lg-block h-auto mt-5">

            <section id="title" class="mb-2 p-4 rounded border border-1">

                <header class="text-center text-dark pb-2">
                    <h3>
                        <b>
                            {{ $job->title }}

                        </b>
                    </h3>
                </header>

                <div class="d-flex justify-content-around flex-wrap text-light-emphasis font-middle-size pt-2">

                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col">نام شرکت / مغازه :</td>
                                <td scope="col">میزان حقوق : تومان</td>
                                <td scope="col">جنسیت :</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span>
                                        {{ $job->company_or_shop_name }}
                                    </span></td>
                                <td><span>
                                        {{ persianNumber($job->rights) }}

                                    </span></td>
                                <td>
                                    <span>
                                        {{ $job->genderstatus }}

                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div id="share" class="d-flex justify-content-between">
                    <a href="" class="">
                        <i class="ri-heart-line"></i>
                        <i class="ri-heart-fill d-none"></i>
                    </a>

                    <a href="">
                        <i class="ri-share-line"></i>
                    </a>
                </div>

            </section>

            <section id="description" class="h-auto mb-4 mt-4 p-3 rounded  border border-1">

                <header>
                    <h3 class="text-center text-dark"><b>درباره ی شغل</b></h3>
                    <div>
                        <p class="text-dark p-3">

                            {{ $job->description }}

                        </p>
                    </div>
                </header>

                <div id="info" class="col-12">

                    <header>
                        <h4 class="text-dark"><b>اطلاعات</b></h4>
                    </header>

                    <div id="phone">
                        <ul class="list-unstyled p-3 pt-2">
                            <li>
                                <i class="ri-phone-line font-middle-size"></i>
                                شماره تماس :

                                @foreach ($job['phone'] as $item)
                                    {{ $item . ' , ' }}
                                @endforeach

                            </li>
                        </ul>
                    </div>

                    @if ($job['advantages'])
                        <div id="benefits" class="mt-4">
                            <h4><b>مزایا</b></h4>
                            <ul class="list-unstyled p-3 pt-2">
                                @foreach (explode(',', $job['advantages']) as $item)
                                    <li><i class="ri-checkbox-circle-line text-success p-1"></i>{{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div id="address" class="text-center p-0 m-0">
                        <h6 class="text-dark"><b>آدرس</b></h6>
                        <span class="text-dark-emphasis w-5">
                            {{ $job->address }}
                        </span>
                    </div>

                </div>

            </section>

            <section class="prople d-flex flex-wrap align-items-center justify-content-around rounded py-5 m-0">

                <div class="mb-4 col-12 text-center">
                    <h4>
                        پیشنهادی ها
                    </h4>
                </div>

                @foreach ($jobs as $item)
                    <div class="col-12 col-md-5 mb-2">
                        <div class="card mb-3 mb-md-2 rounded gradient-border border-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h5 class="card-title p-0 m-0"><b>{{ $item->title }}</b></h5>
                                    <a href="">
                                        <i class="ri-bookmark-line font-middle-size text-dark-emphasis"></i>
                                        <i class="ri-bookmark-fill font-middle-size text-dark-emphasis d-none"></i>
                                    </a>
                                </div>
                                <div>
                                    <p class="text-light-emphasis font-siz-small mb-2">
                                        {{ $item->company_or_shop_name }}</p>
                                    <span class="font-siz-small text-dark mb-1">{{ $item->address }} </span>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="font-siz-small px-2 orange-red">{{ persianNumber($item->rights) }}
                                        میلیون
                                        تومان</span>
                                    <div class="container-click-show">
                                        <a href="{{ route('home.job.show', $item->id) }}"
                                            class="d-none d-lg-block orange-red">مشاهده<i
                                                class="ri-arrow-left-line text-primary p-1 orange-red"></i></a>
                                        <a href="{{ route('home.job.show', $item->id) }}"
                                            class="d-lg-none orange-red">مشاهده<i
                                                class="ri-arrow-left-line text-primary p-1 orange-red"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </section>

        </main> <!-- end main -->

    </div>
@endsection
