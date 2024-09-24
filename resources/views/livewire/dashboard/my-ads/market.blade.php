<section id="container-boxs" class="p-0">
    <!-- ======= Body ======= -->
    <section class="p-0 py-4 d-flex justify-content-around flex-wrap">

        @foreach ($UserMarkets->markets as $item)
            <div class="card col-12 col-md-6 col-lg-3 m-3 shadow position-relative">
                @if ($item->status == 1)
                    <span class="badge bg-success position-absolute p-2 shadow-lg">تایید شده</span>
                @else
                    <span class="badge bg-danger position-absolute p-2 shadow-lg">تایید نشده</span>
                @endif
                <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><b>{{ $item->company_or_shop_name }}</b></h5>
                    <p class="card-text">{{ substr($item->description , 0 , 30) . " ..." }}</p>
                    <a href="{{ route("home.market.show" , $item->id) }}" class="btn btn-primary">مشاهده</a>
                    <a href="{{ route("dashboard.market.edit" , $item->id) }}" class="btn btn-success">بروز رسانی</a>
                    <button class="btn btn-danger">حذف</button>
                </div>
            </div>
        @endforeach

    </section><!-- ======= End Body ======= -->
</section>
