<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Author;

class AdminController extends Controller 
{

	public function getLogin()
	{
		return view('admin.login');
	}

	public function getDashboard()
	{
		$authors = Author::all();
		return view('admin.admin',['authors'=>$authors]);
	}

	public function postLogin(Request $request)
	{
		$this->validate($request,[
			'name' => 'required',
			'password' => 'required'
		]);

		if(!Auth::attempt(['name'=>$request['name'],'password'=> $request['password']])){
			return redirect()->back()->with(['fail'=>'Could not login']);
		}
		return redirect()->route('admin.dashboard');
	}
}