<?php

namespace App\Http\Controllers\Dashboard\Market;

use App\Models\Admin\Market;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarketController extends Controller
{
    public function create()
    {
        return view("dashboard.market.create");
    }

    public function edit(Market $market)
    {
        return view("dashboard.market.edit" , compact("market"));
    }
}
