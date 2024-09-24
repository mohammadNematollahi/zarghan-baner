<?php

namespace App\Http\Livewire\App\Market;

use Livewire\Component;
use App\Models\Admin\Market;
use Illuminate\Http\Request;

class Index extends Component
{

    public $search;
    public $category;

    protected $queryString = ["search"];
    public function render()
    {

        $markets = Market::where("company_or_shop_name", "like", "%" . $this->search . "%");

        switch ($this->category) {
            case 1:
                $markets = $markets->latest()->paginate(10);
                break;
            case 2:
                $markets = $markets->orderBy("view" , "desc")->paginate(10);
                break;
            case 3:
                $markets = $markets->oldest()->paginate(10);
                break;
            default:
                $markets = $markets->paginate(10);
                break;
        }

        return view('livewire.app.market.index', compact("markets"));
    }

    public function orderBy($category)
    {
        $this->category = $category;
    }
}
