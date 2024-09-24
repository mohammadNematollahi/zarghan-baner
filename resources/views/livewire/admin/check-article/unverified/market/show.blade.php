<section id="content" class="col-12 col-md-10 mt-4 p-5 shadow rounded rounded-3" wire:init='loadInfo'>

    @if ($readyToLoad)
        <header>
            <h3 class="text-center"><b>{{$market->company_or_shop_name}}</b></h3>
            <p class="text-dark mt-5">{{$market->description}}</p>
        </header>
        <div class="body mt-4">
    
            <div id="info" class="col-12">
    
            <header>
                <h4 class="text-dark"><b>اطلاعات</b></h4>
            </header>
    
            <div id="phone">
                <ul class="list-unstyled p-1">
                    <li>
                        <li class="pb-1"><i class="ri-phone-line font-middle-size"></i> شماره تماس : 
                                @foreach ($market->phone as $phone)
                                    <span>{{$phone . " -"}}</span>
                                @endforeach
                        </li>
                    </li>
                    <li class="pt-1"><i class="ri-shopping-bag-2-line"></i> آدرس : {{$market->address}}</li>
                </ul>
            </div>

        </div>

        <div class="status">
            <span>وضعیت پست بر روی وب سایت :</span>
            @if ($status == 0)
                <button class="btn btn-success waves-effect waves-light" wire:click="status('{{$market->id}}')">فعال</button>
            @else
                <button class="btn btn-warning waves-effect waves-light" wire:click="status('{{$market->id}}')">غیرفعال</button>
            @endif
        </div>

    @else
        <div wire:load class="text-center">
            <div class="spinner-border text-primary" role="status"></div>
        </div>
    @endif

</section>