<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        $admin = User::create([
            "name"=> "Admin",
            "email"=> "admin@gmail.com",
            "password"=> Hash::make("12345"),
            "role" => 'Administrator'
        ]);



        $Adminrole = Role::create(['name' => 'Administrator']);
        $Managerrole = Role::create(['name' => 'Manager']);
        $Userrole = Role::create(['name' => 'User']);
        $admin->assignRole($Adminrole);


        $Userpermission = Permission::create(['name' => 'User Manager']);
        $Jobpermission = Permission::create(['name' => 'Job Manager']);
        $Taskpermission = Permission::create(['name' => 'Task Manager']);

        $Adminrole->givePermissionTo([$Jobpermission, $Taskpermission,$Userpermission]);
        $Managerrole->givePermissionTo([$Jobpermission, $Taskpermission,$Userpermission]);
        $Userrole->givePermissionTo([$Jobpermission, $Taskpermission]);
        // $permission->assignRole($Adminrole);
    }
}
