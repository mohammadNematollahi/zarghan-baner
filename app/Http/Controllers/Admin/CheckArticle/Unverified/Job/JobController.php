<?php

namespace App\Http\Controllers\Admin\CheckArticle\Unverified\Job;

use App\Models\Admin\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CheckArticle\Job\JobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.check-article.unverified.job.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view("admin.check-article.unverified.job.show" , compact("job"));
    }
}
