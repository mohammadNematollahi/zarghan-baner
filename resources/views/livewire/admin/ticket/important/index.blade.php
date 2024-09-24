<table class="table zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>نویسنده</th>
            <th>عنوان</th>
            <th class="text-center">تنظیمات</th>
        </tr>
    </thead>
    <tbody>

        @php
            $id = 1;
        @endphp

        @foreach ($tickets as $item)
            <tr role="row" class="odd">
                <td class="sorting_1">{{$id}}</td>
                <td>{{$item->user->phone}}</td>
                <td>{{$item->title}}</td>
                <td style="min-width: 16rem; text-align: left;">
                    <a href="{{route("admin.ticket.important.show" , $item->slug)}}" class="btn btn-info waves-effect waves-light">مشاهده</a>
                    <button class="btn btn-danger waves-effect waves-light" wire:click="destroy('{{$item->id}}')">حذف</button>
                </td>
            </tr>
            @php
                $id++;
            @endphp
        @endforeach

    </tbody>
</table>