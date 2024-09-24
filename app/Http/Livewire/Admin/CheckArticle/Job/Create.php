<?php

namespace App\Http\Livewire\Admin\CheckArticle\Job;

use App\Models\Admin\Job;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $rights;
    public $value;
    public $company_or_shop_name;
    public $gender = 0;
    public $status = 0;
    public $phone = [];
    public $advantages = [];
    public $address;
    public $description;
    protected $rules = [
        "title" => "required|max:190|not_regex:/[;.\/'\":?!-_)(*&^%$#@~`+×÷><=]/|max:250",
        "description" => "required|not_regex:/[;-_&^%$#~`+×÷]/",
        "address" => "required|address",
        "rights" => "required|regex:/^[0-9,]*$/",
        "company_or_shop_name" => "required|max:150",
        "phone.0" => "required|iran_mobile",
        "phone.*" => "nullable|iran_mobile",
        "advantages" => "nullable|max:250",
        "gender" => "required|in:0,1,2",
        "status" => "required|in:0,1"
    ];
    public function render()
    {
        return view('livewire.admin.check-article.job.create');
    }
    public function updated($name , $value)
    {
        $this->validateOnly($name);
    }
    public function store()
    {
        $this->validate();
        $inputs = $this->all();
        $inputs["admin_id"] = auth()->user()->id;
        Job::create($inputs);
        return redirect()->route("admin.check.article.job.index");
    }
}
