<?php

namespace App\Http\Controllers\Dashboard\MyADS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function showMarket()
    {
        return view("dashboard.my-ads.market");
    }
}
