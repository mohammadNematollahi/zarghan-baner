<?php

namespace App\Http\Livewire\Admin\Account;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $password;
    public $newPassword;
    public $passwordConfirmation;
    public $user;

    protected $rules = [
        "password" => "required|min:8|max:230",
        "newPassword" => "required|min:8|max:230",
        "passwordConfirmation" => "required|same:newPassword|max:230"
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.admin.account.change-password');
    }

    public function updated($name , $value)
    {
        $this->validateOnly($name);
    }

    public function update()
    {
        $this->validate();
        $check =  Hash::check($this->password . $this->user->salt , $this->user->password);
        if(!$check){
            session()->flash("password" , "رمز شما صحیح نمیباشد");
        }else{
            $salt = Hash::make(Str::random(10));
            $password = Hash::make($this->newPassword . $salt);
            $this->user->salt  = $salt;
            $this->user->password = $password;
            $result = $this->user->save();
            if($result)
                return redirect()->route("admin.home");
        }

    }
}
