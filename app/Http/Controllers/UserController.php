<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

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

        foreach($users as $user){
            $roles = $user->getRoleNames();

            if($roles->isEmpty()){
                $user->role = "Ninguno";
            }else{
                $user->role = $roles->implode("");
            }

        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles= Role::all()->pluck('name');
        return view('users.create', compact('roles'));
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
            'run' => 'required|unique:users,run|regex:/^\d{7,8}-[0-9K]$/',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'tipo_de_cuenta' => 'nullable',
            'role' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,bmp,gif|max:2048'
        ]);
        if($image = $request->file('image')){
            $rutaGuardarImg = 'imagen/';
            $imagenUser = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($rutaGuardarImg,$imagenUser);
        }
        $user = new User([
            'run' => $request->get('run'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'tipo_de_cuenta' => $request->get('tipo_de_cuenta'),
            'image' => $imagenUser
        ]);

        $user->save();
        $user->assignRole($request->role);

        return redirect('admin/users')->with('success', 'Usuario creado exitosamente!');
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
        $user = User::find($id);
        $roles= Role::all()->pluck('name');
        $role_get = $user->getRoleNames();
        $current_role = $role_get->implode("");

        return view('users.edit', compact('user', 'roles', 'current_role'));
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
        $request->validate([
            'run' => 'required|unique:users,run|regex:/^\d{7,8}-[0-9K]$/',
            'name' => 'required',
            'email' => 'required',
            'tipo_de_cuenta' => 'nullable',
            'role' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,bmp,gif|max:2048'
        ]);

        $user = User::find($id);
        $user->run = $request->get('run');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->tipo_de_cuenta = $request->get('tipo_de_cuenta');
        if($image = $request->file('image')){
            $rutaGuardarImg = 'imagen/';
            $imagenUser = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($rutaGuardarImg,$imagenUser);
            $user->image = $imagenUser;
        }else{
            unset($user->image);
        }
        $user->save();
        $user->syncRoles([$request->role]);

        return redirect('admin/users')->with('success', 'Usuario actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['success' => true]);

    }
}
