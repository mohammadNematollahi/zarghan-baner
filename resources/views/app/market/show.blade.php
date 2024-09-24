@extends('app.layouts.app')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('assets/css/market.css') }}">
@endsection


@section('content')
    <section id="app" class="w-100 h-auto d-flex justify-content-center align-items-center">
        <section id="container" class="col-12 col-md-9 h-auto p-3 m-0 d-flex justify-content-center flex-wrap">

            <section class="position-relative d-flex justify-content-center flex-wrap p-0">
                <section id="slide" class="col-12 col-md-11 rounded-top rounded-5 shadow mb-3 p-0 d-flex">

                    <div>
                        <img src="{{ asset($market->image) }}" alt="" class="w-auto h-100">
                    </div>

                    @foreach ($market['images'] as $item)
                        <div>
                            <img src="{{ asset($item) }}" alt="" class="w-auto h-100">
                        </div>
                    @endforeach

                </section>

                <div id="click-slide" class="position-absolute col-10 d-flex justify-content-between text-white">
                    <button class="border border-0 btn text-dark opacity-75">
                        <span id="next" class="ri-skip-right-line font-15-rem bg-white p-2 rounded rounded-5"
                            onclick="next()"></span>
                    </button>
                    <button class="border border-0 btn opacity-75 text-dark">
                        <span id="prev" class="ri-skip-left-line font-15-rem bg-white p-2 rounded rounded-5"
                            onclick="prev()"></span>
                    </button>
                </div>
            </section>

            <section id="content" class="col-12 col-md-10 mt-4 p-5 shadow rounded rounded-3">
                <header>
                    <h3 class="text-center"><b>مغازه میر احمد جان</b></h3>
                    <p class="text-dark mt-5">ما در اختیار شما عزیزان هستیم هر گونه درخواست شما د ر</p>
                </header>
                <div class="body mt-4">

                    <div id="info" class="col-12">

                        <header>
                            <h4 class="text-dark"><b>اطلاعات</b></h4>
                        </header>

                        <div id="phone">
                            <ul class="list-unstyled p-3 pt-2">
                                <li>
                                    <i class="ri-phone-line font-middle-size"></i>
                                    شماره تماس :

                                    @foreach ($market['phone'] as $item)
                                        {{ $item . " , " }}
                                    @endforeach

                                </li>
                            </ul>
                        </div>

                        <div id="address" class="text-center p-0 m-0">
                            <h6 class="text-dark"><b>آدرس</b></h6>
                            <span class="text-dark-emphasis w-5">{{ $market->address }}</span>
                        </div>

                    </div>

                </div>
            </section>


            <section id="show-comment" class="col-12 p-0 mt-5">
            </section>

        </section>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/js/market.js') }}"></script>
    <script src="{{ asset('assets/js/slide.js') }}"></script>
@endsection
