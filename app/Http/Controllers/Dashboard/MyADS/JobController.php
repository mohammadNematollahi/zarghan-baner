<?php

namespace App\Http\Controllers\Dashboard\MyADS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function showJob()
    {
        return view("dashboard.my-ads.job");
    }
}
