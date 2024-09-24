<table class="table zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>نام مغازه</th>
            <th>اسلاگ</th>
            <th>شماره تماس</th>
            <th>نویسنده</th>
            <th>تصویر</th>
            <th class="text-center">تنظیمات</th>
        </tr>
    </thead>
    <tbody>
        @php
        $id = 1;
    @endphp
    @foreach ($markets as $item)
        <tr>
            <td class="sorting_1">{{ $id }}</td>
            <td>{{ $item->company_or_shop_name }}</td>
            <td> {{ $item->slug }}</td>
            <td>{{ $item->phone[0] }}</td>
            <td>{{ $item->admin ==  null ? "ادمین" : "کاربر" }}</td>>
            <td><img style="width: 90px;" src="{{ asset($item->image) }}" alt=""></td>
            <td style="min-width: 16rem; text-align: left;">

                @if ($item->status == 0)
                    <button class="btn btn-success waves-effect waves-light" wire:click="status('{{$item->id}}')">فعال</button>
                @else
                    <button class="btn btn-warning waves-effect waves-light" wire:click="status('{{$item->id}}')">غیرفعال</button>
                @endif

                <a href="{{route("admin.check.article.market.edit" , $item->slug)}}" class="btn btn-info waves-effect waves-light">مشاهده</a>
                <button class="btn btn-danger" wire:click="destroy('{{ $item->id }}')">حذف</button>
            </td>
    
            @php
                $id++;
            @endphp
        <tr>
    @endforeach
    
    </tbody>
</table>