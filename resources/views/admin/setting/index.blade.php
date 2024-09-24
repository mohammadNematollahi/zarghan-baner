@extends('admin.layouts.app')
@section('head-tag')
    <title>تنظیمات</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="bg-white mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item">تنظیمات</li>
        </ol>
    </nav>
    <!-- Zero configuration table -->
    <section id="basic-datatable" class="p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pt-0">
                        <h4 class="card-title"><b>نظرها</b></h4>
                        <span class="pt-1"><a href="{{route("admin.setting.create")}}" class="btn btn-success">ایجاد</a></span>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                            <div class="">
                                {{-- table --}}
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ارتباط با ما</th>
                                        <th>فضای مجازی</th>
                                        <th>لوگو</th>
                                        <th class="text-center">تنظیمات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>09903268212</td>
                                            <td>https://telegram.com</td>
                                            <td><img style="width: 90px;" src="../../../admin-assets/images/elements/apple-watch.png" alt=""></td>
                                            <td style="min-width: 16rem;" class="text-center">
                                                <a href="#" class="btn btn-info waves-effect waves-light">بروز رسانی</a>
                                            </td>
                                        </tr>                                                        

                                    </tbody>
                                </table>>
                                {{-- table end --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
