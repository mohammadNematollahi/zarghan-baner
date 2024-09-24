<?php

namespace App\Http\Livewire\Admin\Account;

use Livewire\Component;

class Edit extends Component
{
    public $username;
    public $email;
    public $user;

    protected $rules = [
        "user.username" => "required|regex:/^[0-9A-zآ-ی_]*$/",
        "user.email" => "required|email",
    ];
    public function mount()
    {
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.admin.account.edit');
    }

    public function updated($name , $value)
    {
        $this->validateOnly($name);
    }

    public function update()
    {
        $this->validate();
        $this->user->save();
    }
}