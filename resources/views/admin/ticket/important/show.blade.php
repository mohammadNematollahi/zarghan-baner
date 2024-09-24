@extends('admin.layouts.app')
@section('head-tag')
    <title>نمایش تیکت</title>
    <style>
        img{
            width: 700px!important;
            height: 500px!important;
            object-fit: cover!important;
        }
    </style>
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="bg-white mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item active" aria-current="page">تیکت ها</li>
            <li class="breadcrumb-item active" aria-current="page">مهم</li>
            <li class="breadcrumb-item active" aria-current="page">مشاهده</li>
        </ol>
    </nav>
    <!-- Zero configuration table -->

    <section class="bg-white p-3 rounded">

        <header class="text-center">
            <h2 class="text-black-50">
                {{$ticket->title}}
            </h2>
        </header>

        <section class="pt-2">

            {!! $ticket->description !!}
            
            <p class="my-2">
                نوع : <span>@if ($ticket->type == 0) معمولی @else مهم @endif</span>
            </p>
        </section>

        <form class="col-12" method="POST">
            <div class="form-row col-12 d-flex flex-wrap justify-content-around align-items-start">
                <div class="col-12 mb-2">
                    <label for="description">پاسخ : </label>
                    <textarea class="form form-control" name="description" id="response"></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="ثبت">
        </form>        

    </section>

    <!--/ Zero configuration table -->
@endsection
