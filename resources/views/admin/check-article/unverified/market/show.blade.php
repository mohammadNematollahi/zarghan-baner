@extends('admin.layouts.app')
@section('head-tag')
    <title>پست های بازار</title>
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
<section id="container" class="col-12 h-auto p-3 m-0 d-flex justify-content-center flex-wrap">
    <section class="position-relative d-flex justify-content-center flex-wrap p-0">
      <section id="slide" class="col-12 col-md-11 rounded-top rounded-5 shadow mb-3 p-0 d-flex">
        <div>
          @if (isset($market->image))
            <img src="{{asset($market->image)}}" alt="" class="w-auto h-100">
          @endif
        </div>
        @if (!empty($market->images))
          @foreach ($market->images as $image)
            <div>
              <img src="{{asset($image)}}" alt="" class="w-auto h-100">
            </div>
          @endforeach
        @endif
      </section>

      <div id="click-slide" class="position-absolute col-10 d-flex justify-content-between text-white">
        <button class="border border-0 btn text-dark opacity-75">
          <span id="next" class="ri-skip-right-line font-15-rem bg-white p-2 rounded rounded-5" onclick="next()"></span>
        </button>
        <button class="border border-0 btn opacity-75 text-dark">
        <span id="prev" class="ri-skip-left-line font-15-rem bg-white p-2 rounded rounded-5" onclick="prev()"></span>
        </button>
      </div>
    </section>

    {{-- show description --}}

      <livewire:admin.check-article.unverified.market.show :market="$market" />

    {{-- end show description --}}

    <section id="show-comment" class="col-12 p-0 mt-5">
    </section>

</section>
@endsection

@section('scripts')
    <script>
      const slide = document.getElementById("slide");

      function prev() {
        return (slide.scrollLeft -= 550);
      }

      function next() {
        return (slide.scrollLeft += 550);
      }
    </script>
@endsection
