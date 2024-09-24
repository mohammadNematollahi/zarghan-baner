<?php

namespace App\Http\Livewire\Admin\CheckArticle\Unverified\Market;

use App\Models\Admin\Market;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $markets = Market::where("status" , 0)->latest()->get(["id" , "company_or_shop_name" , "slug" , "phone" , "user_id" , "image" , "status" , "user_id" , "admin_id"]);
        return view('livewire.admin.check-article.unverified.market.index' , compact("markets"));
    }

    public function status($id)
    {
        $market = Market::find($id);
        $status = $market->status == 1 ? 0 : 1;
        $market->status = $status;
        $market->save();
    }
}
