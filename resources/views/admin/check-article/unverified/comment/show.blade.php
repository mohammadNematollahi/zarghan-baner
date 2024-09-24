@extends('admin.layouts.app')
@section('head-tag')
    <title>نمایش نظر</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="bg-white mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">مورد بررسی</a></li>
            <li class="breadcrumb-item"><a href="#">نظر ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">مشاهده ی پست</li>
        </ol>
    </nav>
    <!-- Zero configuration table -->

    <section class="bg-white p-3 rounded">
        <p class="mb-2">
            بنظر من این مغازه بسیار بد است و رفتن به اونجا را پیشنهاد نمیکنم
        </p>

        <div>
            <form class="d-inline" action="" method="post">
                <a href="#" class="btn btn-warning waves-effect waves-light">غیر فعال</a>
                <a href="#" class="btn btn-success waves-effect waves-light">فعال</a>
            </form>
        </div>
    </section>

    <!--/ Zero configuration table -->
@endsection
