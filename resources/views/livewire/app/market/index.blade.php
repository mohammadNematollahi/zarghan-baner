<div class="container mt-5 p-3 shadow mb-3">

    <!-- ======= Search Box ======= -->
    <div class="mt-5 p-2 d-flex flex-wrap" id="search-box">
        <div class="d-flex col-12 col-lg-6">
            <input type="text" class="form-control shadow-none" id="search" wire:model='search'
                placeholder="جست و جو کنید">
        </div>
        <div class="col-12 mt-3">
            <button class="btn" wire:click='orderBy(1)'>جدید ترین ها</button>
            <a class="btn" wire:click='orderBy(2)'>پر بازدید ترین ها</a>
            <button class="btn" wire:click='orderBy(3)'>قدیمی</button>
        </div>
    </div><!-- ======= End Search Box ======= -->

    <!-- ======= Content Box ======= -->
    <section class="mt-4 h-auto p-0">

        <!-- ======= Bander ======= -->
        <section class="p-1 rounded rounded-3 gradient-border mb-3" style="height: 200px;">
            <section class="mt-0 w-100 h-100 bg-white rounded"></section>
        </section>
        <!-- ======= End Bander ======= -->

        <!-- ======= Body ======= -->
        <section class="mt-4 p-0 pb-1 d-flex justify-content-around flex-wrap">

            @if (!$markets->isEmpty())
                @foreach ($markets as $item)
                    <div class="card col-12 col-md-6 col-lg-3 m-2 shadow">
                        <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title my-3"><b>{{ $item->company_or_shop_name }} </b></h5>
                            <p class="card-text">{{ $item->description }} </p>
                            <a href="{{ route('home.market.show', $item->id) }}"
                                class="btn btn-primary w-100">مشاهده</a>
                        </div>
                    </div>
                @endforeach

                <div id="pagination" class="col-12 d-flex justify-content-center mt-3 p-0" dir="ltr">

                    {{ $markets->links() }}

                </div>
            @else

                <div class="col-12 h-100 text-center p-5">
                    <h3>
                        چیزی یافت نشد ..!
                    </h3>
                </div>

            @endif

        </section><!-- ======= End Body ======= -->

    </section><!-- ======= Content Box ======= -->

    <div wire:loading class="alert alert-info position-fixed zindex-1" style="right: 40%; bottom:5px;" role="alert">
        در حال پردازش اطلاعات لطفا صبور باشید ...
    </div>

</div>
