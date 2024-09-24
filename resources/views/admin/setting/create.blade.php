@extends('admin.layouts.app')
@section('head-tag')
    <title>تنظیمات</title>
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
                        <form wire:submit.prevent="store" class="needs-validation col-12">
                            <div class="form-row col-12 d-flex flex-wrap justify-content-around align-items-start">
                        
                                <div class="col-12 mb-2">
                                    <label for="company_or_shop_name">نام مغازه / شرکت :</label>
                                    <input type="text" class="form-control shadow-none border-2" id="company_or_shop_name" wire:model.lazy="company_or_shop_name">
                                    @error('company_or_shop_name')
                                    <p class="text-danger mt-1">
                                        {{$message}}
                                    </p>
                                    @enderror
                                </div>
                            
                                <div class="col-12 mb-2">
                                    <label for="address">آدرس :</label>
                                    <input type="text" class="form-control shadow-none border-2" id="address" wire:model.lazy="address">
                                    @error('address')
                                    <p class="text-danger mt-1">
                                        {{$message}}
                                    </p>
                                    @enderror
                                </div>
                            
                                <div class="col-12 mb-2">
                                    <label for="exampleFormControlTextarea1">توضیحات :</label>
                                    <textarea class="form-control border-2 " id="exampleFormControlTextarea1" rows="3" wire:model.lazy="description"></textarea>
                                    @error('description')
                                    <p class="text-danger mt-1">
                                        {{$message}}
                                    </p>
                                    @enderror
                                </div>
                            
                                <div class="col-12 mb-2 d-flex flex-wrap">
                        
                                    <div class="col-12 col-md-4 mb-1">
                                        <label for="phone-one">شماره تماس اول :</label>
                                        <input type="text" class="form-control shadow-none border-2" id="phone-one" wire:model.lazy="phone.0">
                                    </div>
                                    <div class="col-12 col-md-4 mb-1">
                                        <label for="phone-two">شماره تماس دوم :</label>
                                        <input type="text" class="form-control shadow-none border-2" id="phone-two" wire:model.lazy="phone.1">
                                    </div>
                                    <div class="col-12 col-md-4 mb-1">
                                        <label for="phone-three">شماره تماس سوم :</label>
                                        <input type="text" class="form-control shadow-none border-2" id="phone-three" wire:model.lazy="phone.2">
                                    </div>
                        
                                    @error('phone.*')
                                        <p class="text-danger mt-1">
                                            {{$message}}
                                        </p>
                                    @enderror
                            
                                </div>
                            
                                <span class="mb-1">عکس های خود را بارگذاری کنید</span>
                                <div class="col-12 d-flex flex-wrap justify-content-center align-items-center mb-1">
                        
                                    <div class="position-relative">
                                        <input type="file" id="image" hidden wire:model.lazy="image">
                                        <span class="border border-1 d-block position-relative box-image">
                        
                                            @if (isset($image) && !$errors->has("image"))
                                                <img src="{{$image != null && is_string($image->temporaryUrl()) ? $image->temporaryUrl() : "" ;}}" class="w-100 h-100 position-absolute show-input-image" id="show-image">
                                            @endif
                                            <span
                                                class="d-block position-absolute bg-primary text-white w-100 text-center rounded-bottom"
                                                style="pointer-events: none ; bottom:0px!important;">تصویر اصلی</span>
                                            <label for="image" class="w-100 h-100"></label>
                        
                                        </span>
                                        <div class="position-absolute w-100 h-100 loading d-flex justify-content-center align-items-center" >
                                            <div class="spinner-border text-primary" role="status" style="z-index: 100" wire:loading wire:target="image" wire:ignore></div>
                                        </div>
                                    </div>
                        
                                    @php
                                        $count = 4 ;
                                    @endphp
                            
                                    @for ($i = 0; $i < $count; $i++)
                        
                                        @if ($i == 0)
                                            @if (isset($image) && isset($imagePath))
                                                <div class="position-relative mx-1">
                                                    <input type="file" id="image-{{$i}}" hidden wire:model.lazy="images.{{$i}}">
                                                    <span class="border border-1 d-block position-relative box-image">
                        
                                                        @if (isset($images[$i]) && !$errors->has("images." . $i))
                                                            <img src="{{$images[$i] != null && is_string($images[$i]->temporaryUrl()) ? $images[$i]->temporaryUrl() : "" ;}}" class="w-100 h-100 position-absolute show-input-image" id="show-image">
                                                        @endif
                                                        <label for="image-{{$i}}" class="w-100 h-100"></label>
                        
                                                    </span>
                                                    <div class="position-absolute w-100 h-100 loading d-flex justify-content-center align-items-center" >
                                                        <div class="spinner-border text-primary" role="status" style="z-index: 100" wire:loading wire:target="images.{{$i}}" wire:ignore></div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                        
                                        @if ($i > 0)
                                            
                                            @if (isset($images[$i - 1]) && isset($imagesPath[$i - 1]))
                                                    <div class="position-relative mx-1">
                                                        <input type="file" id="image-{{$i}}" hidden wire:model.lazy="images.{{$i}}">
                                                        <span class="border border-1 d-block position-relative box-image">
                        
                                                            @if (isset($images[$i]) && !$errors->has("images." . $i))
                                                                <img src="{{$images[$i] != null && is_string($images[$i]->temporaryUrl()) ? $images[$i]->temporaryUrl() : "" ;}}" class="w-100 h-100 position-absolute show-input-image" id="show-image">
                                                            @endif
                                                            <label for="image-{{$i}}" class="w-100 h-100"></label>
                        
                                                        </span>
                                                        <div class="position-absolute w-100 h-100 loading d-flex justify-content-center align-items-center" >
                                                            <div class="spinner-border text-primary" role="status" style="z-index: 100" wire:loading wire:target="images.{{$i}}" wire:ignore></div>
                                                        </div>
                                                    </div>
                                            @endif
                        
                                        @endif
                        
                                    @endfor
                            
                                    <div class="mt-1">
                                        @error('images.*')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                        
                                        @error('image')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                        
                                </div>
                        
                                <div class="messages">
                        
                                    <div wire:loading wire:target="image" wire:ignore>
                                        <p class="text-primary">
                                            درحال اپلود عکس لطفا صبر کنید ...
                                        </p>
                                    </div>
                        
                                    @for ($i = 0; $i < $count; $i++)
                                        <div wire:loading wire:target="images.{{$i}}" wire:ignore>
                                            <p class="text-primary">
                                                درحال اپلود عکس لطفا صبر کنید ...
                                            </p>
                                        </div>
                                    @endfor
                        
                                </div>
                            
                                <div class="col-12 d-flex flex-wrap justify-content-center mb-2">
                            
                                    <div class="col-12 col-md-5 m-1">
                                        <label for="">بارگذاری این پست بر روی وب سایت</label>
                                        <select class="form-control" wire:model.lazy="status">
                                            <option value="0">غیر فعال</option>
                                            <option value="1">فعال</option>
                                        </select>
                                    </div>
                            
                                    <div class="col-12 col-md-5 m-1">
                                        <label for="">ایا میخواهید کامنت ها برای این پست باز باشد ؟</label>
                                        <select class="form-control" wire:model.lazy="commentable">
                                            <option value="0">بستن کامنت ها</option>
                                            <option value="1">باز کردن کامنت ها</option>
                                        </select>
                                    </div>
                            
                                </div>
                            
                            </div>
                            <button class="btn btn-success" type="submit" id="form">ثبت اطلاعات</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Zero configuration table -->
@endsection
