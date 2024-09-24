<?php

namespace App\Http\Livewire\Dashboard\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $description;
    public $type = 0;
    public function render()
    {
        return view('livewire.dashboard.ticket.create');
    }

    protected $rules = [
        "title" => "required|max:190|max:250",
        "description" => "required",
        "type" => "required|in:0,1"
    ];

    public function updated($name , $value)
    {
        $this->validateOnly($name);
    }

    public function store()
    {
        $this->validate();
        $inputs = $this->all();
        $inputs["user_id"] = 1;
        Ticket::create($inputs);
        return redirect()->route("dashboard.home");
    }

}
