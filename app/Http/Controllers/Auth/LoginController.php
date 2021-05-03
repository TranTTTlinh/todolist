<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// lấy dữ liệu khi nhập vào
use Illuminate\Http\Request;
// tham chiếu đến database
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

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
    }

    public function login() { 
        return view('auth.login');
    }

    public function signin(Request $request) {
        $username = $request->Username;
        $password = md5($request->Password);
        
        $result = DB::table('account')->where('Username', $username)->where('Password', $password)->first();
       
        if($result) {
            Session::put('permit', $result->IdPermission);
            Session::put('username', $result->Username);
            Session::put('image', $result->image);
            Session::put('id', $result->id);
            return Redirect::to("/home-task");
        } else {
            return Redirect::to("/");
        }
    }


    public function logout() {
        Session::put('permit', null);
        Session::put('username', null);
        Session::put('image', null);
        Session::put('id', null);
        return Redirect::to("/");
    }
}