<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }

    public function profile(){
        return view('User.profile',array('user' => Auth::user()));
    }
    public function update_avatar(Request $request){
        //handel the user avatar upload
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            $filename=time().'.'.$avatar->getClientOriginalExtension();
            Image::Make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
            $user=Auth::user();
            $user->avatar_user = $filename;
            $user->save();
        }
        return view('User.profile',array('user'=>Auth::user()));
    }
    public function index()
    {
        $users=User::all();
        return view('users.index')->withUsers($users);
    }
    public function show($id)
    {
        $users =User::find($id);
        return view('users.show')->withUser($users);
    }



}
