<table class="table zero-configuration">
    <thead>
    <tr>
        <th>#</th>
        <th>عنوان شغل</th>
        <th>نام شرکت / مغازه</th>
        <th>شماره تماس</th>
        <th>نویسنده</th>
        <th class="text-center">تنظیمات</th>
    </tr>
    </thead>
    <tbody>
    
        @php
            $id = 1;
        @endphp
        @foreach ($jobs as $item)
            <tr role="row" class="odd">
                <td class="sorting_1">{{$id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->company_or_shop_name}}</td>
                <td>{{$item->phone[0]}}</td>
                <td>{{$item->admin == null ? "کاربر" : "ادمین"  }}</td>
                <td style="min-width: 16rem; text-align: left;">

                    @if ($item->status == 0)
                        <button class="btn btn-success waves-effect waves-light" wire:click="status('{{$item->id}}')">فعال</button>
                    @else
                        <button class="btn btn-warning waves-effect waves-light" wire:click="status('{{$item->id}}')">غیرفعال</button>
                    @endif

                    <a href="{{route("admin.check.article.job.edit" , $item->slug)}}" class="btn btn-info waves-effect waves-light">مشاهده</a>
                    <button class="btn btn-danger waves-effect waves-light" wire:click="destroy('{{$item->id}}')">حذف</button>
                </td>
            </tr>
            @php
                $id++;
            @endphp
        @endforeach

    </tbody>
</table>
