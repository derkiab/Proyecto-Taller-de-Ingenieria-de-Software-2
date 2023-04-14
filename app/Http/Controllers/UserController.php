<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'run' => 'required|unique:users,run',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'tipo_de_cuenta' => 'nullable',
        ]);

        $user = new User([
            'run' => $request->get('run'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'tipo_de_cuenta' => $request->get('tipo_de_cuenta'),
        ]);

        $user->save();

        return redirect('/users')->with('success', 'Usuario creado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $run
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $run
     * @return \Illuminate\Http\Response
     */
    public function edit($run)
    {
        $user = User::find($run);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $run
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $run)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'tipo_de_cuenta' => 'nullable',
        ]);

        $user = User::find($run);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->tipo_de_cuenta = $request->get('tipo_de_cuenta');
        $user->save();

        return redirect('/users')->with('success', 'Usuario actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $run
     * @return \Illuminate\Http\Response
     */
    public function destroy($run)
    {
        $user = User::find($run);
        $user->delete();

        return redirect('/users')->with('success', 'Usuario eliminado exitosamente!');

    }
}