<form wire:submit.prevent='store'>
    <div class="form-row col-12 d-flex flex-wrap justify-content-around align-items-start">

         <div class="col-12 col-lg-12 mb-2">
            <label for="title">عنوان</label>
            <input type="text" class="form-control shadow-none border-2" id="title" wire:model.lazy="title"
                placeholder="مثلا : راننده تراکتور">
            @error('title')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

         <div class="col-12 col-lg-4 mb-2">
            <label for="last-name">نام شرکت / مغازه</label>
            <input type="text" class="form-control shadow-none border-2" id="last-name"
                wire:model.lazy="company_or_shop_name">
            @error('company_or_shop_name')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

         <div class="col-12 col-lg-4 mb-2">
            <label for="last-name">میزان حقوق</label>
            <input type="text" class="form-control shadow-none border-2" id="my-decimal-number">
            <input type="text" hidden class="form-control shadow-none border-2" wire:model.lazy="rights">
            @error('rights')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        
        <div class="col-12 col-lg-3 mb-2">
            <label for="last-name">جنسیت</label>
            <select class="form-control form-select border-2" aria-label="Default select example"
                wire:model.lazy="gender">
                <option value="0">فرقی ندارد</option>
                <option value="1">مرد</option>
                <option value="2">خانوم</option>
            </select>
            @error('gender')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        
        <div class="col-12 col-lg-8 mb-2 d-flex flex-wrap justify-content-between">
            <div class="col-12 col-lg-5 mb-1 mb-md-0">
                <label for="phone-one">شماره تماس اول :</label>
                <input type="number" class="form-control shadow-none border-2" id="phone-one"
                    wire:model.lazy="phone.0">
                @error('phone.0')
                    <p class="text-danger mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-12 col-lg-5 mb-1 mb-md-0">
                <label for="phone-two">شماره تماس دوم :</label>
                <input type="number" class="form-control shadow-none border-2" id="phone-two"
                    wire:model.lazy="phone.1">
                @error('phone.1')
                    <p class="text-danger mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>


        <div class="col-12">
            <div class="form-group" wire:ignore>
                <label for="tags">مزیت ها :</label>
                <input type="text" hidden class="form-control" id="tags" wire:model.lazy="advantages">
                <select class="select2 form-control" id="select_tags" multiple wire:ignore></select>
            </div>
            @error('advantages')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="col-12 mb-2">
            <label for="last-name">آدرس</label>
            <input type="text" class="form-control shadow-none border-2" id="last-name" wire:model.lazy="address">
            @error('address')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="col-12 mb-2">
            <label for="exampleFormControlTextarea1">درباره شغل ( شرایط شغل و نیاز هایی که از کارجو دارید را توضیح بدهید
                )</label>
            <textarea class="form-control border-2" id="exampleFormControlTextarea1" wire:model.lazy="description"></textarea>
            @error('description')
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
                @this.set('advantages', default_data)
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
                    @this.set('advantages', selectedSource);
                }
            })


            $("#my-decimal-number").change(function (e) { 
                let value = $("#my-decimal-number").val();
                @this.set("rights" , value);
            });

        })
    </script>
@endpush
