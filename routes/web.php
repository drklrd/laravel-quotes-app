<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'do'],function(){
	Route::get('/greet/{name?}',function($name = null){
		return view('actions.greet',['name' => $name]);
	})->name('greet');


	Route::get('/hi',function(){
		return view('actions.hi');
	})->name('hi');


	Route::get('/hello',function(){
		return view('actions.hello');
	})->name('hello');

	Route::post('/',function(\Illuminate\Http\Request $request){
		if (isset($request['action']) && $request['name']){
			if(strlen($request['name']) > 0){
				return view('actions.nice',['action' => $request['action'],'name'=> $request['name']]);
			}
			return redirect()->back();
		}
		return redirect()->back();

	})->name('formsubmit');
});

