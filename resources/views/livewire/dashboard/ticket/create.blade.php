<form wire:submit.prevent='store'>

    <div class="form-row col-12 d-flex flex-wrap justify-content-around align-items-start">

        <div class="col-12 col-lg-5 mb-2">
            <label for="title">عنوان :</label>
            <input type="text" class="form-control shadow-none border-2" id="title" wire:model.lazy="title">
            @error('title')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="col-12 col-lg-5 mb-2">
            <label for="last-name">نوع تیکت</label>
            <select class="form-control form-select border-2" aria-label="Default select example"
                wire:model.lazy="type">
                <option value="0">معمولی</option>
                <option value="1">مهم</option>
            </select>
            @error('type')
                <p class="text-danger mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="col-12 mb-2">
            <input type="hidden" id="descriptionInput" wire:model.lazy="description">
            <label for="description">توضیحات</label>
            <div wire:ignore>
                <textarea class="form-control border-2" id="ckedit"></textarea>
            </div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/translations/fa.js"></script>
    <script>
        // Wait for CKEditor instance to be ready
        ClassicEditor
            .create(document.querySelector('#ckedit') , {
                language: 'fa',
                ckfinder:{
                    uploadUrl: "{{ route('ckeditor.upload' , ['_token' => csrf_token()]) }}",
                }
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    var value = editor.getData();
                    $("#descriptionInput").val(value);
                    @this.set('description', value);
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
