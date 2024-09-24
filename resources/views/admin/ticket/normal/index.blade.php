@extends('admin.layouts.app')
@section('head-tag')
    <title>تیک ها</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="bg-white mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">تیکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">معمولی</li>
        </ol>
    </nav>
    <!-- Zero configuration table -->
    <section id="basic-datatable" class="p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pt-0">
                        <h4 class="card-title"><b>نظرها</b></h4>
                        <span class="pt-1"><a href="#" class="btn btn-success disabled ">ایجاد</a></span>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                            <div class="">
                                {{-- table --}}
                                <livewire:admin.ticket.normal.index />
                                {{-- table end --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
