<?php

namespace App\Http\Livewire\Dashboard\Job;

use Livewire\Component;
use App\Models\Admin\Job;

class Create extends Component
{
    public $title;
    public $rights;
    public $value;
    public $company_or_shop_name;
    public $gender = 0;
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
        "gender" => "required|in:0,1,2"
    ];
    public function render()
    {
        return view('livewire.dashboard.job.create');
    }
    public function updated($name , $value)
    {
        $this->validateOnly($name);
    }
    public function store()
    {
        $this->validate();
        $inputs = $this->all();
        $inputs["user_id"] = auth()->user()->id ?? null ;
        $inputs["admin_id"] = $inputs["user_id"] == null ? auth()->guard("admin")->user()->id : null;
        Job::create($inputs);
        return redirect()->route("dashboard.home");
    }
}
