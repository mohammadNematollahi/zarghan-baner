<?php

namespace App\Http\Requests\Admin\CheckArticle\Job;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            "title" => "required|max:250",
            "description" => "required",
            "address" => "required",
            "rights" => "numeric",
            "company_or_shop_name" => "required|max:250",
            "phone" => "required",
            "gender" => "required|in:0,1,2",
            "status" => "required|in:0,1"
        ];
    }
}
