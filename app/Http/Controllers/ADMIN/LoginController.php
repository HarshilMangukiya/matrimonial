<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;


class LoginController extends Controller
{
    public function index() 
	{
		if (Auth::guard('admin')->check()) {
			return redirect()->route('admin.dashboard');
		} else {
			return view('admin.login.index');
		}
	}

    //- admin login page
	public function login()
	{
		return view('admin.login.index');
	}

    //- admin do login 
    public function loginProcess(Request $request)
	{
        $validator = Validator::make($request->all(), [
			"username" => "required",
			"password" => "required",
		]);

		if ($validator->fails()) {

			$response = array();
			$response = errorRes("Please fill the blanks");
			$response['data'] = $validator->errors();

		}else{

			if (!Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {

				$response = array();
				$response = errorRes("Username or password incorrect");

			}else{

				$admin = Auth::guard('admin')->user();
				$response = array();
				$response = successRes("Login successfull");;
			}

        }
        return response()->json($response)->header('Content-Type', 'application/json');
    }

	//- admin logout
	public function logout(Request $request)
	{

		Auth::guard('admin')->logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('admin.login')->with("success", "Successfully logout");
        
	}

    //- admin redirect to dashboard after login success
	public function dashboard()
	{
		$data['title'] = "Dashboard";
		return view('admin.dashboard.index',compact('data'));
	}
}
