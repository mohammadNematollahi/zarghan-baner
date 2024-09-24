<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            "username" => "required|regex:/^[0-9A-z_]*$/",
            "password" => "required|min:8",
            'g-recaptcha-response' => 'recaptcha'
        ]);

        $admin = Admin::where('username' , $request->username)->get()->first();

        if (Auth::guard('admin')->attempt(["username" => $request->username , 'password' => $request->password . $admin->salt], $request->get('remember'))) {
            return redirect()->route('admin.home');
        }
        return back()->withInput($request->only('email', 'remember'))->with("error" , "نام کاربری یا پسورد شما اشتباه است لطفا ان را بررسی کنید");
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }
}
