<?php

namespace App\Http\Controllers\Customer;

use App\Models\Admin\Job;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->limit(4)->get();
        $markets = Market::latest()->limit(4)->get();
        return view('app.index', compact("jobs", "markets"));
    }
}
