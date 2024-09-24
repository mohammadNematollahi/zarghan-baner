<?php

namespace App\Http\Livewire\Admin\CheckArticle\Unverified\Job;

use App\Models\Admin\Job;
use Livewire\Component;

class Show extends Component
{
    public $job;
    public $status;
    public function mount()
    {
        $this->status = $this->job->status;
    }
    public function render()
    {
        return view('livewire.admin.check-article.unverified.job.show');
    }

    public function status($id)
    {
        $job = Job::find($id);
        $status = $job->status == 1 ? 0 : 1;
        $job->status = $status;
        $job->save();
        $this->status = $job->status;
    }
}
