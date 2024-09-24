<div class="">
    <table class="table zero-configuration">
        <thead>
        <tr>
            <th>#</th>
            <th>نویسنده</th>
            <th>نظر کاربر</th>
            <th class="text-center">تنظیمات</th>
        </tr>
        </thead>
        <tbody>                    
            
            @php
                $id = 1;
            @endphp

            @foreach ($comments as $item)
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$id}}</td>
                    <td>{{$item->user_id}}</td>
                    <td>{{$item->comment}}</td>
                    <td style="min-width: 16rem; text-align: left;">
                    @if ($item->status == 0)
                        <button class="btn btn-success waves-effect waves-light" wire:click="status('{{$item->id}}')">تایید نشده</button>
                    @else
                        <button class="btn btn-warning waves-effect waves-light" wire:click="status('{{$item->id}}')">تایید شده</button>
                    @endif

                    <a href="{{route("admin.check.article.comment.show" , $item->id)}}" class="btn btn-info waves-effect waves-light">مشاهده</a>
                    <button class="btn btn-danger waves-effect waves-light" wire:click="destroy('{{$item->id}}')">حذف</button>

                    </td>
                </tr>
                @php
                    $id++;
                @endphp
            @endforeach

        </tbody>
    </table>
</div>