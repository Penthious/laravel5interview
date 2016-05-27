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
    public function __construct()
    {
        $this->middleware('account');
    }

    public function create(){
        return view('users.create');
    }

    public function index(Request $request)
    {
        $tableHead = [
            'User',
            'Email',
            'Role',
            'Edit account',
            'Delete account'
        ];

        return view('users.index', [
            'users' => User::all(),
            'tableHead' => $tableHead
        ]);
    }

    public function show(Request $request, $id)
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
        Auth::logout();

        return redirect()->action('HomeController@index');
    }

    public function adminDestroyer(Request $request, $id)
    {
        $user = $this->userIsnull($id);
        $user->delete();

        return back();
    }

    public function editPassword(Request $request, $id)
    {
        $user = $this->userIsNull($id);
		return view('users.changePassword',[
			'user' => User::find($id),
		]);
    }

    public function storePassword(Request $request, $id)
    {
        $user = $this->userIsNull($id);
        $user->password = $request->get('password');
        $user->save();
        $request->session()->flash('successMessage', 'Your password was successfully update.');

        return redirect()->action('UserController@show', $id);
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
            if ($request->role) {
                $user->role = $request->get('role');
            }elseif ($request->password) {
                $user->password = $request->get('password');
            }
            $user->name = $request->get('name');
			$user->email = $request->get('email');
			$user->save();
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
