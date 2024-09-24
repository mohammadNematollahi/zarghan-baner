<?php

namespace App\Http\Livewire\Admin\CheckArticle\Job;

use Livewire\Component;


class Edit extends Component
{
    public $job;
    protected $rules = [
        "job.title" => "required|max:190|not_regex:/[;.\/'\":?!-_)(*^%$@~`+×÷><=]/|max:250",
        "job.description" => "required|not_regex:/[;-_&^%$#~`+×÷]/",
        "job.address" => "required|address",
        "job.rights" => "required|regex:/^[0-9,]*$/",
        "job.company_or_shop_name" => "required|max:150",
        "job.phone.0" => "required|iran_mobile",
        "job.phone.*" => "nullable|iran_mobile",
        "job.advantages" => "nullable|max:250",
        "job.gender" => "required|in:0,1,2",
        "job.status" => "required|in:0,1"
    ]; 
    public function render()
    {
        return view('livewire.admin.check-article.job.edit');
    }
    public function updated($name , $value) 
    {
        $this->validateOnly($name);
    }
    public function update()
    {
        $this->validate();
        $this->job->save();
        return redirect()->route("admin.check.article.job.index");
    }
}
