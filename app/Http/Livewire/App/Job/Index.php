<?php

namespace App\Http\Livewire\App\Job;

use Livewire\Component;
use App\Models\Admin\Job;

class Index extends Component
{
    public $job;

    public function render()
    {
        $jobs = Job::latest();
        return view('livewire.app.job.index' , ["jobs" => $jobs , "info" => $this->job]);
    }

    public function showInfo(Job $job)
    {
        $this->job = $job;
    }
}
