<form wire:submit.prevent="update">
    <div class="form-row col-12 d-flex flex-wrap justify-content-around align-items-start">

         <div class="col-12 col-lg-12 mb-2">
            <label for="title">عنوان</label>
            <input type="text" class="form-control shadow-none border-2" id="title" wire:model.lazy="job.title" value="{{ $job->title }}"
                placeholder="مثلا : راننده تراکتور">
            @error('job.title')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

         <div class="col-12 col-lg-4 mb-2">
            <label for="last-name">نام شرکت / مغازه</label>
            <input type="text" class="form-control shadow-none border-2" id="last-name" value="{{ $job->company_or_shop_name }}"
                wire:model.lazy="job.company_or_shop_name">
            @error('job.company_or_shop_name')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

         <div class="col-12 col-lg-4 mb-2">
            <label for="last-name">میزان حقوق</label>
            <input type="text" class="form-control shadow-none border-2" id="my-decimal-number" value="{{ $job->rights }}">
            <input type="text" hidden class="form-control shadow-none border-2" id="rights"
                wire:model.lazy="job.rights">
            @error('job.rights')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="col-12 col-lg-3 mb-2">
            <label for="last-name">جنسیت</label>
            <select class="form-control form-select border-2" aria-label="Default select example"
                wire:model.lazy="job.gender">
                <option value="0" {{ $job->gender == 0 ? 'selected' : '' }}>فرقی ندارد</option>
                <option value="1" {{ $job->gender == 1 ? 'selected' : '' }}>مرد</option>
                <option value="2" {{ $job->gender == 2 ? 'selected' : '' }}>خانوم</option>
            </select>
            @error('job.gender')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <div class="col-12 col-lg-8 mb-2 d-flex flex-wrap justify-content-between">
            <div class="col-12 col-md-5 mb-1 mb-md-0">
                <label for="phone-one">شماره تماس اول :</label>
                <input type="number" class="form-control shadow-none border-2" id="phone-one" value="{{ $job->phone[0] }}"
                    wire:model.lazy="job.phone.0">
                @error('job.phone.0')
                    <p class="text-danger mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-12 col-md-5 mb-1 mb-md-0">
                <label for="phone-two">شماره تماس دوم :</label>
                <input type="number" class="form-control shadow-none border-2" id="phone-two" value="{{ $job->phone[1] ?? "" }}"
                    wire:model.lazy="job.phone.1">
                @error('job.phone.1')
                    <p class="text-danger mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        

        <div class="col-12">
            <div class="form-group" wire:ignore>
                <label for="tags">مزیت ها :</label>
                <input type="text" hidden class="form-control" id="tags" wire:model.lazy="job.advantages" value="{{$job->advantages}}">
                <select class="select2 form-control" id="select_tags" multiple></select>
            </div>
            @error('job.advantages')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="col-12 mb-2">
            <label for="last-name">آدرس</label>
            <input type="text" class="form-control shadow-none border-2" id="last-name" value="{{ $job->address }}"
                wire:model.lazy="job.address">
            @error('job.address')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="col-12 mb-2">
            <label for="exampleFormControlTextarea1">درباره شغل ( شرایط شغل و نیاز هایی که از کارجو دارید را توضیح
                بدهید)</label>
            <textarea class="form-control border-2" id="exampleFormControlTextarea1" wire:model.lazy="job.description">{{ $job->description }}</textarea>
            @error('job.description')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>
    <button class="btn btn-success" type="submit" id="form">ثبت اطلاعات</button>
</form>

@push('script')
    <script>
        $(document).ready(function() {
            //select2
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',')
            }

            select_tags.select2({
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').click(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                    @this.set('job.advantages', selectedSource);
                }
            })

            //format number

            $("#my-decimal-number").change(function(e) {
                let value = $("#my-decimal-number").val();
                @this.set("job.rights", value);
            });

            let rights = $("#rights").val();
            $("#my-decimal-number").val(rights);

        })
    </script>
@endpush
