<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 5;
        $arrayUser = User::orderBy('active', 'desc')->orderBy('name', 'asc')->paginate($paginate);
//         dd($arrayUser);
//         dd($arrayUser->links());

        return view('admin.user.index', ['arrayUser' => $arrayUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
//     public function create(Request $request)
    {
        return view('admin.user.create');
//         return view('admin.user.create', compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|string|unique:users',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|max:255|confirmed', // password_confirmation : https://laravel.com/docs/5.1/validation#rule-confirmed  https://laracasts.com/discuss/channels/laravel/laravel-confirm-password-is-not-working
//             'password_confirmation' => 'required',
            'role' => 'required'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        $user->save();

        \Session::flash('flash_message_success','Utilisateur (' . $user->name . ') créé');

        $id = $user->id;

        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $this->validate($request, [
//             'name' => 'required|string|unique:users',
            'email' => 'required|email',
            'password' => 'required|string|max:255|confirmed', // password_confirmation : https://laravel.com/docs/5.1/validation#rule-confirmed  https://laracasts.com/discuss/channels/laravel/laravel-confirm-password-is-not-working
            //             'password_confirmation' => 'required',
            'role' => 'required'
        ]);

//         $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        $user->active = $request->active ?? false;
//         dd($request->active);
//         dd($user->active);

        $user->save();

        \Session::flash('flash_message_success','Utilisateur (' . $user->name . ') modifié');

        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
//         User::destroy($user->id);
        $user->active = false;

        $user->save();

        \Session::flash('flash_message_success','Utilisateur (' . $user->name . ') désactivé');

        return redirect('admin/user');
    }
}
