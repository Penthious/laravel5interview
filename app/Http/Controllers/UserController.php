<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Validator;
use Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('users.index', [
            'users' =>User::all()
        ]);
    }
    public function show($id)
    {
        $user = $this->userIsNull($id);
        return view('users.account', [
            'user' => User::find($id)
        ]);
    }

    public function edit($id)
	{
		$user = $this->userIsNull($id);
		return view('users.edit',[
			'user' => User::find($id),
			'edit' => true
		]);
	}

    public function update(Request $request, $id)
    {
        $user = $this->userIsNull($id);
		return $this->validation($user, $request);
    }

    public function destroy(Request $request, $id)
    {
        $user = $this->userIsnull($id);
        $user->delete();
    

        return redirect()->action('HomeController@index');
    }

    public function validation($user, $request)
	{
		$validator = Validator::make($request->all(), User::$rules);

		// attempt validation
		if ($validator->fails()) {
			$request->session()->flash('errorMessage', 'Unable to save user.');
			return back()->withInput()->withErrors($validator);
		} else {
			$request->session()->flash('successMessage', 'The user was successfully update.');
			$user->create($request->all());
			return redirect()->action('UserController@edit',$user->id);
		}
	}

    public function userIsNull($id){
		$user = User::find($id);
		if (is_null($user)) {
			abort(404);
		}
		return $user;
	}
}
