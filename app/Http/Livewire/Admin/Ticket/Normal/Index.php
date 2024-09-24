<?php

namespace App\Http\Livewire\Admin\Ticket\Normal;

use App\Models\Ticket;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $tickets = Ticket::where("type", 0 )->latest()->get([ "id", "title", "user_id" , "description" , "slug"]);
        return view('livewire.admin.ticket.normal.index' , compact("tickets"));
    }

    public function destroy($id)
    {
        Ticket::find($id)->delete();
    }
}
