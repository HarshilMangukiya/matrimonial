<?php

namespace App\Http\Controllers\USER;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() 
	{
		if (Auth::check()) {
			return redirect()->route('user.dashboard');
		} else {
			return view('user.login.index');
		}
	}

	//- user can register
	public function register()
	{
		return view('user.register.index');
	}

    //- user login page
	public function login()
	{
		return view('user.login.index');
	}

    //- user do login 
    public function loginProcess(Request $request)
	{
        $validator = Validator::make($request->all(), [
			"email" => "required",
			"password" => "required",
		]);

		if ($validator->fails()) {

			$response = array();
			$response = errorRes("Please fill the blanks");
			$response['data'] = $validator->errors();

		}else{

			if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

				$response = array();
				$response = errorRes("Email or password incorrect");

			}else{
				$user = Auth::user();
				$response = array();
				$response = successRes("Login successfull");;
			}
        }
        return response()->json($response)->header('Content-Type', 'application/json');
    }

	//- user logout
	public function logout(Request $request) 
	{

		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('user.login')->with("success", "Successfully logout");

	}

	//- user redirect to dashboard after login success
	public function dashboard()
	{
		$data['title'] = "Dashboard";
		return view('user.dashboard.index',compact('data'));
	}
}
