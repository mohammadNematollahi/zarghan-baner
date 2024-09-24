<div id="app" class="container-fluid d-flex justify-content-between h-100 pt-5">
    <aside class="col-4 mt-5 p-1">

        @foreach ($jobs->get() as $item)
            <div class="col-11 mb-3" wire:click="showInfo({{ $item->id }})" style="cursor: pointer">
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
                            <p class="text-light-emphasis font-siz-small mb-2">{{ $item->company_or_shop_name }}</p>
                            <span class="font-siz-small text-dark mb-1">{{ $item->address }} </span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="font-siz-small px-2 orange-red">{{ persianNumber($item->rights) }} میلیون
                                تومان</span>
                            <div class="container-click-show">
                                <button class="d-none btn d-lg-block"
                                    wire:click="showInfo({{ $item->id }})">مشاهده<i
                                        class="ri-arrow-left-line text-primary p-1"></i></button>
                                <button class="d-lg-none" wire:click='showInfo({{ $item->id }})'>مشاهده<i
                                        class="ri-arrow-left-line text-primary p-1"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </aside>


    @if ($info)
        <!--main start-->
        <main class="col-8 d-none d-lg-block h-auto mt-5">

            <section id="title" class="mb-2 p-4 rounded border border-1">

                <header class="text-center text-dark pb-2">
                    <h3>
                        <b>
                            @if ($info)
                                {{ $info->title }}
                            @endif
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
                                        @if ($info)
                                            {{ $info->company_or_shop_name }}
                                        @endif
                                    </span></td>
                                <td><span>
                                        @if ($info)
                                            {{ persianNumber($info->rights) }}
                                        @endif
                                    </span></td>
                                <td>
                                    <span>
                                        @if ($info)
                                            {{ $info->genderstatus }}
                                        @endif
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
                            @if ($info)
                                {{ $info->description }}
                            @endif
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
                                @if ($info)
                                    @foreach ($info['phone'] as $item)
                                        {{ $item . ' , ' }}
                                    @endforeach
                                @endif
                            </li>
                        </ul>
                    </div>

                    @if ($info['advantages'])
                        <div id="benefits" class="mt-4">
                            <h4><b>مزایا</b></h4>
                            <ul class="list-unstyled p-3 pt-2">
                                @foreach (explode(',', $info['advantages']) as $item)
                                    <li><i class="ri-checkbox-circle-line text-success p-1"></i>{{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div id="address" class="text-center p-0 m-0">
                        <h6 class="text-dark"><b>آدرس</b></h6>
                        <span class="text-dark-emphasis w-5">
                            @if ($info)
                                {{ $info->address }}
                            @endif
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

                @foreach ($jobs->limit(4)->get() as $item)
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
    @else
        <main class="col-8 d-none d-lg-block h-auto mt-5">
            <div class="col-12 text-center h-100 d-flex justify-content-center align-items-center">
                <h2>
                    <b>
                        آیتمی انتخاب نشده است ..!
                    </b>
                </h2>
            </div>
        </main>

    @endif


    <div wire:loading class="alert alert-info position-fixed zindex-1" style="right: 45%; bottom:5px;" role="alert">
        در حال پردازش اطلاعات لطفا صبور باشید ...
    </div>


</div>
