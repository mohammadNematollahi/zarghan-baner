@extends('admin.layouts.app')
@section('head-tag')
    <title>بروز رسانی پست </title>
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="bg-white mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">مورد بررسی</a></li>
            <li class="breadcrumb-item"><a href="#">مغازه ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">بروز رسانی پست</li>
        </ol>
    </nav>
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">بروز رسانی پست</h4>
                        <span><a href="#" class="btn btn-success">بازگشت</a></span>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <livewire:admin.check-article.market.edit :market="$market" />
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
        document.addEventListener("livewire-upload-start", () => {
            $("#box-progress-bar").removeClass("d-none");
        })
        document.addEventListener("livewire-upload-finish", () => {
            $("#box-progress-bar").addClass("d-none");
            $("#progress-bar").css("width", "0%");
        })
        document.addEventListener("livewire-upload-progress", () => {
            $("#progress-bar").css("width", `${event.detail.progress}%`);
        })
        document.addEventListener("livewire-upload-error", () => {
            $("#box-progress-bar").addClass("d-none");
            $("#progress-bar").css("width", "0%");
        })
    </script>
@endsection
