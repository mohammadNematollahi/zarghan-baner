<form wire:submit.prevent="store" class="needs-validation col-12">
    <div class="form-row col-12 d-flex flex-wrap justify-content-around align-items-start">


        <div class="col-12 mb-2">
            <label for="company_or_shop_name">نام مغازه / شرکت :</label>
            <input type="text" class="form-control shadow-none border-2" id="company_or_shop_name" wire:model.lazy="market.company_or_shop_name">
            @error('market.company_or_shop_name')
            <p class="text-danger mt-1">
                {{$message}}
            </p>
            @enderror
        </div>
    
        <div class="col-12 mb-2">
            <label for="address">آدرس :</label>
            <input type="text" class="form-control shadow-none border-2" id="address" wire:model.lazy="market.address">
            @error('market.address')
            <p class="text-danger mt-1">
                {{$message}}
            </p>
            @enderror
        </div>
    
        <div class="col-12 mb-2">
            <label for="exampleFormControlTextarea1">توضیحات :</label>
            <textarea class="form-control border-2 " id="exampleFormControlTextarea1" rows="3" wire:model.lazy="market.description"></textarea>
            @error('market.description')
            <p class="text-danger mt-1">
                {{$message}}
            </p>
            @enderror
        </div>
    
        <div class="col-12 mb-2 d-flex flex-wrap">

            <div class="col-12 col-md-4 mb-1">
                <label for="phone-one">شماره تماس اول :</label>
                <input type="text" class="form-control shadow-none border-2" id="phone-one" wire:model.lazy="market.phone.0">
            </div>
            <div class="col-12 col-md-4 mb-1">
                <label for="phone-two">شماره تماس دوم :</label>
                <input type="text" class="form-control shadow-none border-2" id="phone-two" wire:model.lazy="market.phone.1">
            </div>
            <div class="col-12 col-md-4 mb-1">
                <label for="phone-three">شماره تماس سوم :</label>
                <input type="text" class="form-control shadow-none border-2" id="phone-three" wire:model.lazy="market.phone.2">
            </div>

            @error('market.phone.*')
                <p class="text-danger mt-1">
                    {{$message}}
                </p>
            @enderror
    
        </div>
    
        <span class="mb-1">عکس های خود را بارگذاری کنید</span>
        <div class="col-12 d-flex flex-wrap justify-content-center align-items-center mb-1">

            <div class="position-relative m-1 mt-2 m-lg-1 mt-lg-1">
                <input type="file" id="image" hidden wire:model.lazy="image">
                <span class="border border-1 d-block position-relative box-image rounded">

                    @if (!$errors->has('image') && isset($image) || isset($imagePath))
                        <div>
                            <img src="{{$image != null && is_string($image->temporaryUrl()) ? $image->temporaryUrl() : asset($imagePath) ;}}" class="w-100 h-100 position-absolute show-input-image rounded" id="show-image">
                        </div>
                    @endif
                    <span class="d-block position-absolute bg-primary text-white w-100 text-center rounded-bottom p-1"
                        style="pointer-events: none ; bottom:0px!important;">تصویر اصلی
                    </span>
                    <label for="image" class="w-100 h-100"></label>

                </span>
                <div class="position-absolute w-100 h-100 loading d-flex justify-content-center align-items-center">
                    <div class="spinner-border text-primary" role="status" style="z-index: 100" wire:loading
                        wire:target="image" wire:ignore></div>
                </div>
            </div>

            @php
                $count = 4 ;
            @endphp
    
            @for ($i = 0; $i < $count; $i++)

                @if ($i == 0)
                    @if (isset($image) || isset($imagePath))
                        <div class="position-relative mx-1">

                            <input type="file" id="image-{{ $i }}" hidden
                                wire:model.lazy="images.{{ $i }}">
                            <span class="border border-1 d-block position-relative rounded box-image">

                                @if (isset($images[$i]) || !$errors->has("images.{{$i}}") && !empty($imagesPath[$i]))
                                    <div>
                                        <img src="{{isset($images[$i]) && is_string($images[$i]->temporaryUrl()) ? $images[$i]->temporaryUrl() : asset($imagesPath[$i]) ;}}" class="w-100 h-100 position-absolute show-input-image rounded" id="show-image">
                                        <span
                                            class="d-block position-absolute p-1 bg-primary text-white w-100 text-center rounded-bottom cursor-pointer"
                                            style="bottom:0px!important;"
                                            wire:click='destoryImage({{ $i }})'>حذف
                                        </span>
                                    </div>
                                @endif

                                <label for="image-{{ $i }}" class="w-100 h-100"></label>

                            </span>
                            <div
                                class="position-absolute w-100 h-100 loading d-flex justify-content-center align-items-center">
                                <div class="spinner-border text-primary" role="status" style="z-index: 100"
                                    wire:loading wire:target="images.{{ $i }}" wire:ignore></div>
                            </div>
                        </div>
                    @endif
                @endif

                @if ($i > 0)
                    
                    @if (isset($images[$i - 1]) || isset($imagesPath[$i - 1]))
                        <div class="position-relative mx-1">

                            <input type="file" id="image-{{ $i }}" hidden
                                wire:model.lazy="images.{{ $i }}">
                            <span class="border border-1 d-block position-relative rounded box-image">

                                @if (isset($images[$i]) || !$errors->has("images.{{$i}}") && !empty($imagesPath[$i]))
                                    <div>
                                        <img src="{{isset($images[$i]) && is_string($images[$i]->temporaryUrl()) ? $images[$i]->temporaryUrl() : asset($imagesPath[$i]) ;}}" class="w-100 h-100 position-absolute show-input-image rounded" id="show-image">
                                        <span
                                            class="d-block position-absolute p-1 bg-primary text-white w-100 text-center rounded-bottom cursor-pointer"
                                            style="bottom:0px!important;"
                                            wire:click='destoryImage({{ $i }})'>حذف
                                        </span>
                                    </div>
                                @endif

                                <label for="image-{{ $i }}" class="w-100 h-100"></label>

                            </span>
                            <div
                                class="position-absolute w-100 h-100 loading d-flex justify-content-center align-items-center">
                                <div class="spinner-border text-primary" role="status" style="z-index: 100"
                                    wire:loading wire:target="images.{{ $i }}" wire:ignore></div>
                            </div>
                        </div>
                    @endif

                @endif

            @endfor
    
            <div class="mt-1 col-12">
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
                <select class="form-control" wire:model.lazy="market.status">
                    <option value="0" {{$market->status == 0 ? "selected" : ""}}>غیر فعال</option>
                    <option value="1" {{$market->status == 0 ? "selected" : ""}}>فعال</option>
                </select>
            </div>
    
            <div class="col-12 col-md-5 m-1">
                <label for="">ایا میخواهید کامنت ها برای این پست باز باشد ؟</label>
                <select class="form-control" wire:model.lazy="market.commentable">
                    <option value="0" {{$market->commentable == 0 ? "selected" : ""}}>بستن کامنت ها</option>
                    <option value="1" {{$market->commentable == 0 ? "selected" : ""}}>باز کردن کامنت ها</option>
                </select>
            </div>
    
        </div>

        @error('market.status')
            <p class="text-danger mt-1">
                {{$message}}
            </p>
        @enderror

        @error('market.commentable')
            <p class="text-danger mt-1">
                {{$message}}
            </p>
        @enderror
    
    </div>
    <button class="btn btn-success" type="submit" id="form">ثبت اطلاعات</button>
</form>