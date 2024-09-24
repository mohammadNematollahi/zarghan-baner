<?php

namespace App\Http\Livewire\Admin\CheckArticle\Unverified\Job;

use Livewire\Component;
use App\Models\Admin\Job;

class Index extends Component
{
    public function render()
    {
        $jobs = Job::where("status" , 0)->latest()->get([ "id", "title", "slug" , "company_or_shop_name" , "phone" , "rights" , "status" , "user_id", "admin_id"]);
        return view('livewire.admin.check-article.unverified.job.index' , compact("jobs"));
    }

    public function destroy($id)
    {
        Job::find($id)->delete();
    }

    public function status($id)
    {
        $job = Job::find($id);
        $status = $job->status == 1 ? 0 : 1;
        $job->status = $status;
        $job->save();
    }
}
