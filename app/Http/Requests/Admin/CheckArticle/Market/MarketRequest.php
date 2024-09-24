<?php

namespace App\Http\Requests\Admin\CheckArticle\Market;

use Illuminate\Foundation\Http\FormRequest;

class MarketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "company_or_shop_name" => "required|persian_alpha|max:150",
            "address" => "required|address|max:250",
            "description" => "required",
            "phone.0" => "required|iran_mobile",
            "phone.*" => "nullable|iran_mobile",
            "status" => "required|in:0,1",
            "commentable" => "required|in:0,1",
            "image" => "required|image|mimes:jpg,png,pjp,jfif,svg",
            "images.*" => "nullable|image|mimes:jpg,png,pjp,jfif,svg|max:6144"
        ];
    }
}
