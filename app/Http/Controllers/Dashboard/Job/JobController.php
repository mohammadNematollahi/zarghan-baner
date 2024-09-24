<?php

namespace App\Http\Controllers\Dashboard\Job;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create()
    {
        return view("dashboard.job.create");
    }

    public function edit(Job $job)
    {
        return view("dashboard.job.edit" , compact("job"));
    }
}
