@extends('admin.layouts.app')
@section('head-tag')
    <title>مشاهده ی پست ها</title>
@endsection
@section('content')
<nav aria-label="breadcrumb" class="bg-white mb-1">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">خانه</a></li>
      <li class="breadcrumb-item"><a href="#">مورد بررسی</a></li>
      <li class="breadcrumb-item"><a href="#">بازار</a></li>
      <li class="breadcrumb-item active" aria-current="page">مشاهده ی پست</li>
    </ol>
</nav>
<!-- Zero configuration table -->
<section id="title" class="mb-2 p-4 rounded border border-1">

  <header class="text-center text-dark pb-2">
      <h3>
        <b>
          {{$job->title}}
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
            <td><span>{{$job->company_or_shop_name}}</span></td>
            <td><span>{{$job->rights}}</span></td>
            <td> @if ($job->gender == 0) فرفی ندارد  @elseif($job->gender == 1) مرد  @else خانوم @endif </td>
          </tr>
        </tbody>
      </table>

    </div>

</section>

  <section id="description" class="h-auto mb-4 mt-2 p-3 rounded  border border-1">

    <header>
      <h3 class="text-center text-dark"><b>درباره ی شغل</b></h3>
      <p class="text-dark p-3">{{$job->description}}</p>
    </header>

    <div id="info" class="col-12">

        <header>
          <h4 class="text-dark"><b>اطلاعات</b></h4>
        </header>

        <div id="phone">
          <ul class="list-unstyled p-1">
            <li>
                <li class="pb-1"><i class="ri-phone-line font-middle-size"></i> شماره تماس : 
                    @foreach ($job->phone as $phone)
                      <span>{{$phone . " -"}}</span>
                    @endforeach
                </li>
            </li>
            <li class="pt-1"><i class="ri-shopping-bag-2-line"></i> آدرس : {{$job->address}}</li>
        </ul>
        </div>

        <div id="benefits" class="mt-2">
          <h4><b>مزایا</b></h4>
            <ul class="list-unstyled p-1">
                @foreach (explode( ",", $job->advantages) as $item)
                  <li><i class="ri-checkbox-circle-line text-success p-1"></i>{{$item}}</li>
                @endforeach
            </ul>
        </div>


        <livewire:admin.check-article.unverified.job.show :job="$job" />

      </div>
    
  </section>
<!--/ Zero configuration table -->
@endsection
