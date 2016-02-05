<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\UserRequest;
use App\Newsletter\NewsletterList;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth',
            [
                'except' => ['show', 'showByUsername']
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param $username
     * @return \Illuminate\Http\Response
     */
    public function showByUsername($username)
    {
        $user = User::whereUsername($username)->first();
        return view('frontend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();

        return view('frontend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UserRequest $request)
    {
        $user = auth()->user();

        $user->updateCredentials($request->all());

        alert()->success('Tus datos han sido actualizados con éxito.', '¡Yoohoo!');

        return redirect(route('users.edit'));
    }
}