<?php

namespace App\Http\Livewire\Dashboard\MyAds;

use App\Models\Admin\Market as AdminMarket;
use Livewire\Component;

class Market extends Component
{
    public function render()
    {
        $UserMarkets = auth()->user() == null ? auth()->guard("admin")->user()->load("markets") : auth()->user()->load("markets");
        return view('livewire.dashboard.my-ads.market' , compact("UserMarkets"));
    }

    public function delete(Market $market)
    {
        dd($market);
    }
}
