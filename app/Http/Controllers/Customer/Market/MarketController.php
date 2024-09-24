<?php

namespace App\Http\Controllers\Customer\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        return view("app.market.index");
    }

    public function show(Market $market)
    {
        return view("app.market.show" , compact("market"));
    }
}
