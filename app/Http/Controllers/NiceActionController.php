<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\NiceAction;



class NiceActionController extends Controller 
{

	public function getHome()
	{
		$actions = NiceAction::all();
		return view('home',['actions'=>$actions]);
	}


	public function getNiceAction($action , $name = null)
	{
		return view('actions.nice', [ 'action'=> $action ,'name' => $name === null ? 'you' : $name ]);
	}

	public function postNiceAction(Request $request)
	{
		$this->validate($request,[
			'action' => 'required',
			'name' => 'required|alpha'
		]);
		return view('actions.nice',['action' => $request['action'],'name'=> $this->transformName($request['name']) ]) ;
	}

	private function transformName($name)
	{
		$prefix = "Master ";
		return $prefix . strtoupper($name);
	}

	public function postInsertNiceAction(Request $request){

		$this->validate($request,[
			'name' => 'required|alpha|unique:nice_actions',
			'niceness' => 'required|numeric'
		]);

		$action = new NiceAction();
		$action->name = ucfirst(strtolower($request['name']));
		$action->niceness = $request['niceness'] ;
		$action->save(); 
		$actions = NiceAction::all();

		return redirect()->route('home');

	}
}