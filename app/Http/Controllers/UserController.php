<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Auth;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $groups = Group::all();
        return view('user.create', compact('user', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string', 'max:255','unique:users'],
            'avatar' => ['mimes:jpeg,bmp,png,jpg'],
            'password' => ['required', 'string', 'max:255','min:8'],
            'password_confirmation' => ['required','same:password'],
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->group_id = $request->group_id;
        $user->password = bcrypt($request->password);

        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save( public_path('avatars\avatars' . $filename) );
            $user->avatar = 'avatars\avatars' . $filename;
        }

        $user->save();
        return redirect('users')->with('success', 'Данные сохранены');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $groups = Group::all();
        return view('user.edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'login' => ['required', 'string', 'max:255','unique:users,login,'.$user->id],
            'avatar' => ['mimes:jpeg,bmp,png,jpg'],
        ]);

        $user->login = $request->login;
        $user->group_id = $request->group_id;

        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save( public_path('avatars\avatars' . $filename) );
            $user->avatar = 'avatars/avatars' . $filename;
        }

        $user->save();
        return redirect('users')->with('success', 'Данные сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }
}
