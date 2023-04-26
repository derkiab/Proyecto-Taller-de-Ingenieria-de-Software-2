<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $permission1 = Permission::create(['name' => 'vista admin']);
        $role1->givePermissionTo($permission1);
        $role2 = Role::create(['name' => 'analista']);
        $permission2 = Permission::create(['name' => 'vista analista']);
        $role2->givePermissionTo($permission2);
        $role3 = Role::create(['name' => 'trabajador']);
        $permission3 = Permission::create(['name' => 'vista trabajador']);
        $role3->givePermissionTo($permission3);

        $user = new User();
            $user->run              = '18456852-5';
            $user->name             = 'admin demo';
            $user->email            = 'admin@test.cl';
            $user->password         = bcrypt('asdf1234');
            $user->image            = 'admin_profile.png';
            $user->tipo_de_cuenta   = 1;
        $user->save();
        $user->assignRole($role1);

        $user = new User();
            $user->run              = '20214563-1';
            $user->name             = 'analista demo';
            $user->email            = 'analista@test.cl';
            $user->password         = bcrypt('asdf1234');
            $user->image            = 'analyst_profile.png';
            $user->tipo_de_cuenta   = 2;
        $user->save();
        $user->assignRole($role2);

        $user = new User();
            $user->run              = '12235412-K';
            $user->name             = 'trabajador demo';
            $user->email            = 'trabajador@test.cl';
            $user->password         = bcrypt('asdf1234');
            $user->image            = 'user_profile.png';
            $user->tipo_de_cuenta   = 3;
        $user->save();
        $user->assignRole($role3);

    }
}
