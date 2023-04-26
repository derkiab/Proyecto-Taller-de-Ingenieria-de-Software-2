<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class permissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        // foreach($permissions as $permission){

        //     $user_amount = User::role($role->name)->get();
        //     $role->role_count= $user_amount->count();

        // }


        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'role_type' => 'nullable'
        ]);

        $permission = Permission::create(['name' => $request->name]);

        // switch($request->role_type){
        //     case 1:
        //         $base_permission= Permission::findOrFail(1);
        //         $roles = $base_permission->getRoleNames();
        //         foreach($roles as $role){
        //             $role->givePermissionTo($permission);
        //         }
        //         break;
        //     case 2:
        //         $base_permission= Permission::findOrFail(2);
        //         $roles = $base_permission->getRoleNames();
        //         foreach($roles as $role){
        //             $role->givePermissionTo($permission);
        //         }
        //         break;
        //     case 3:
        //         $base_permission= Permission::findOrFail(3);
        //         $roles = $base_permission->getRoleNames();
        //         foreach($roles as $role){
        //             $role->givePermissionTo($permission);
        //         }
        //         break;
        //     default:
        // }

        return redirect('/admin/permissions')->with('success', 'Permiso creado exitosamente!');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);


        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();

        // switch($request->role_type){
        //     case 1:
        //         $role->syncPermissions(['vista admin']);
        //         break;
        //     case 2:
        //         $role->syncPermissions(['vista analista']);
        //         break;
        //     case 3:
        //         $role->syncPermissions(['vista trabajador']);
        //         break;
        //     default:
        // }


        return redirect('/admin/permissions')->with('success', 'Permiso actualizado exitosamente!');
    }



    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return redirect('/admin/permissions')->with('success', 'Permiso eliminado exitosamente!');

    }
}
