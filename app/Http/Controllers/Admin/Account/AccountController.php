<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function edit()
    {
        return view('admin.account.edit');
    }
    public function changePassword()
    {
        return view("admin.account.change-password");
    }
}
