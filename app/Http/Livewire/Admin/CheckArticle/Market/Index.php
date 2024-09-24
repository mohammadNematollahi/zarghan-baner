<?php

namespace App\Http\Livewire\Admin\CheckArticle\Market;

use Livewire\Component;
use App\Models\Admin\Market;

class Index extends Component
{
    public function render()
    {
        $markets = Market::latest()->get(["id" , "company_or_shop_name" , "slug" , "phone" , "user_id" , "admin_id", "image" , "status"]);
        return view('livewire.admin.check-article.market.index' ,  compact("markets"));
    }

    public function destroy($id)
    {
        Market::find($id)->delete();
    }

    public function status($id)
    {
        $market = Market::find($id);
        $status = $market->status == 1 ? 0 : 1;
        $market->status = $status;
        $market->save();
    }
}
