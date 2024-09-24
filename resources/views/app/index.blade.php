@extends('app.layouts.app')

@section('content')
    <section id="hero" class="d-flex align-items-center flex-wrap">
        <div class="container position-relative text-center" data-aos="fade-up" data-aos-delay="100">
            <div>
                <div class="col-xl-7-9 tex col-lgt-center">
                    <h1 class="text-dark">
                        <span class="bg-orange-red text-white p-2 rounded">زرقان بنر</span>
                        بگرد , انتخاب کن ,شاغل شو , تبلیغ کن , استخدام کن
                    </h1>
                </div>
            </div>

            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials-job" class="testimonials">
                <div class="m-0 w-100 p-0" data-aos="fade-up">
                    <div class="text-center pb-4">
                        <h2><b>تازه ترین های شغل یابی</b></h2>
                    </div>

                    <div class="pb-4 col-12 text-center pb-5">
                        <a href="{{ route('home.job.index') }}" class="btn btn-outline-primary">
                            مشاهده ی همه
                        </a>
                    </div>

                    <div class="testimonials-slider swiper bg-lih px-2" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper p-1">
                            <!-- ======= testimonial item ======= -->

                            @foreach ($jobs as $item)
                                <div class="swiper-slide">
                                    <div>
                                        <div class="card rounded gradient-border">
                                            <div class="card-body mx-2">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <h5 class="card-title p-0 m-0">
                                                        <b>{{ $item->title }}</b>
                                                    </h5>
                                                    <a href="">
                                                        <i class="ri-bookmark-line font-middle-size text-dark-emphasis"></i>
                                                        <i
                                                            class="ri-bookmark-fill font-middle-size text-dark-emphasis d-none"></i>
                                                    </a>
                                                </div>
                                                <div class="">
                                                    <p
                                                        class="text-light-emphasis font-siz-small mb-2 d-flex justify-content-start">
                                                        {{ $item->company_or_shop_name }}
                                                    </p>
                                                    <span
                                                        class="font-siz-small text-dark d-flex justify-content-start mb-1">
                                                        {{ $item->address }}
                                                    </span>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <span
                                                        class="font-siz-small px-2 orange-red">{{ persianNumber($item->rights) }}
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
                                </div>
                            @endforeach

                            <!-- ======= End testimonial item ======= -->
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
            <!-- ======= End Testimonials Section ======= -->
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div>
                <div class="text-center text-dark pb-4">
                    <h2><b>تازه ترین های بازار</b></h2>
                </div>

                <div class="pb-4 col-12 text-center pb-5">
                    <a href="{{ route('home.market.index') }}" class="btn btn-light"> مشاهده ی همه </a>
                </div>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100" style="height: fit-content;">
                <div class="swiper-wrapper">

                    @foreach ($markets as $item)

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title my-3">
                                        <b>{{ $item->company_or_shop_name }}</b>
                                    </h5>
                                    <p class="card-text">
                                        {{ $item->description }}
                                    </p>
                                    <a href="{{ route('home.market.show', $item->id) }}"
                                        class="btn btn-primary w-100">مشاهده</a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
@endsection
