<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\Email\SendMail;
use App\Http\Controllers\Controller;
use App\Services\Email\EmailService;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\Admin\ResetPasswordRequest;
use App\Http\Requests\Auth\Admin\ChangePasswordRequest;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view("auth.admin.reset-password");
    }

    public function sendMail(ResetPasswordRequest $resetPasswordRequest)
    {
        $request = $resetPasswordRequest->all();
        $token = Str::random(60);
        $admin = Admin::where("email" , $request["email"])->first();
        $admin->token = $token;
        $admin->expire_token = now()->addMinutes(10);
        $admin->save();
        $details = [
            "title" => 'بازیابی رمز عبور',
            "link" => route("login.admin.reset.password.change.password" , ["token" => $token])
        ];
        SendMail::setDetails($details);
        SendMail::setTo($request["email"]);
        SendMail::setFrom("noreply@example.com" , "zarghanbaner");
        $result =  SendMail::send();
        return $result ? redirect()->route("login.admin.reset.password.successful.mail") : back();
    }
    public function successfulEmail()
    {
        return view('auth.admin.successful-email');
    }
    public function changePassword(Request $request)
    {
        $admin = Admin::where("token" , $request['token'])->first();
        if($admin && $admin->expire_token >= now()){
            return view("auth.admin.change-password" , ['id' => $admin->id]);
        }
        return abort(404);
    }
    public function store(ChangePasswordRequest $changePasswordRequest , Admin $admin)
    {
        $password = $changePasswordRequest->input("password");
        $salt = Hash::make(Str::random(20));
        $newPassword = Hash::make($password . $salt);
        $admin->salt = $salt;
        $admin->password = $newPassword;
        $admin->save();
        return redirect()->route("login.admin");
    }
}
