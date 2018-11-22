<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

    	$users = User::all();

    	return view('user.listing', ['list' => $users]);
    }

    public function edit($id){
    	$user = User::find($id);
    	return view('user.formEdit', ['user' => $user]);
    }

    public function editStore(Request $request, $id){
    	$rules = User::$rules;
    	$rules['email'] = $rules['email'] . ',' . $id;
    	$request->validate($rules);
    	$formData = $request->except(['_token', '_method']);
    	$user = User::find($id);

    	if(!$formData['password']){
    		unset($formData['password']);
    	} else {
    		$formData['password'] = Hash::make($formData['password']);
    	}
    	
    	$user->fill($formData);

			$user->save();

			return redirect()
				->route('user.index')
				->with('message', 'El usuario <b>' . $formData['name'] . "</b> se editó exitosamente!");
    }

    public function delete(){
    	$user = User::find($id);
    	$user->delete();

    	return redirect()
    			->route('user.index')
    			->with('message', 'El usuario <b>' . $user->name . "</b> fue eliminado exitosamente");
    }

    public function restore(){
    	$user = User::withTrashed()->whereId($id);
    	$user->restore();

    	return redirect()
    			->route('user.index')
    			->with('message', 'El usuario <b>' . $user->name . "</b> fue restaurado exitosamente");
    }
}
