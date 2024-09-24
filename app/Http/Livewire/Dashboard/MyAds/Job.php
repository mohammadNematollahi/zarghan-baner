<?php

namespace App\Http\Livewire\Dashboard\MyAds;

use Livewire\Component;

class Job extends Component
{
    public function render()
    {
        $userJobs = auth()->user() == null ? auth()->guard("admin")->user()->load("jobs") : auth()->user()->load("jobs");
        return view('livewire.dashboard.my-ads.job' , compact("userJobs"));
    }
}
