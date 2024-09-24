@extends('admin.layouts.app')
@section('head-tag')
    <title>ساخت پست جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="bg-white mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">مورد بررسی</a></li>
            <li class="breadcrumb-item"><a href="#">مغازه ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ساخت مغازه جدید</li>
        </ol>
    </nav>
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ساخت مغازه جدید</h4>
                        <span><a href="#" class="btn btn-success">بازگشت</a></span>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                            <livewire:admin.check-article.job.create />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
@endsection

@section('scripts')
    <script>


        $("#my-decimal-number").keyup(function (e) { 
            const thisElement = e.target;
            let thisElementValue = thisElement.value;
            thisElementValue = thisElementValue.replace(/,/g, "");

            let separatedNumber = thisElementValue.toString();
            separatedNumber = separatedNumber.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            thisElement.value = separatedNumber;
        });

    </script>
@endsection
