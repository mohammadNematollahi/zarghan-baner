<?php

namespace App\Http\Livewire\Admin\CheckArticle\Unverified\Market;

use Livewire\Component;
use App\Models\Admin\Market;

class Show extends Component
{
    public $market;
    public $readyToLoad = false;
    public $status;

    public function mount()
    {
        $this->status = $this->market->status;
    }
    public function render()
    {
        return view('livewire.admin.check-article.unverified.market.show' , ["market" => $this->readyToLoad ? $this->market : []]);
    }
    public function loadInfo()
    {
        $this->readyToLoad = true;
    }

    public function status($id)
    {
        $market = Market::find($id);
        $status = $market->status == 1 ? 0 : 1;
        $market->status = $status;
        $market->save();
        $this->status = $market->status;
    }
}
