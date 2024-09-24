<?php

namespace App\Http\Controllers\Customer\Job;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view("app.job.index");
    }

    public function show(Job $job)
    {
        $jobs = Job::latest()->get();
        return view("app.job.show" , compact("job" , "jobs"));
    }
}