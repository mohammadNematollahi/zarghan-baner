<div class="status">
    <span>وضعیت پست بر روی وب سایت :</span>
    @if ($status == 0)
        <button class="btn btn-success waves-effect waves-light" wire:click="status('{{$job->id}}')">فعال</button>
    @else
        <button class="btn btn-warning waves-effect waves-light" wire:click="status('{{$job->id}}')">غیرفعال</button>
    @endif
</div>