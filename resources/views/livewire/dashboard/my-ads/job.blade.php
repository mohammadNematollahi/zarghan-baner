<section id="container-boxs" class="p-0">
    <!-- ======= Body ======= -->
    <section class="p-0 py-4 d-flex justify-content-around flex-wrap">

        @foreach ($userJobs->jobs as $item)
            <div class="col-11 col-lg-5 m-3">
                <div class="card mb-2 rounded gradient-border border-0">
                    @if ($item->status == 1)
                        <span class="badge bg-success position-absolute p-2 shadow-lg">تایید شده</span>
                    @else
                        <span class="badge bg-danger position-absolute p-2 shadow-lg">تایید نشده</span>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h5 class="card-title p-0 m-0"><b>{{ $item->title }}</b></h5>
                            <a href="">
                                <i class="ri-bookmark-line font-middle-size text-dark-emphasis"></i>
                                <i class="ri-bookmark-fill font-middle-size text-dark-emphasis d-none"></i>
                            </a>
                        </div>
                        <div class="mb-1">
                            <p class="text-light-emphasis font-siz-small mb-2">{{ $item->company_or_shop_name }}</p>
                            <p class="font-siz-small text-dark w-100">
                                {{ $item->address }}
                            </p>
                            <span class="font-siz-small orange-red">{{ persianNumber($item->rights) }}
                                میلیون
                                تومان</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="container-click-show">
                                <a href="{{ route('home.job.show', $item->id) }}" class="btn btn-primary">مشاهده</a>
                                <a href="{{ route("dashboard.job.edit" , $item->id) }}" class="btn btn-success">بروز رسانی</a>
                                <a href="" class="btn btn-danger">حذف</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section><!-- ======= End Body ======= -->
</section>
