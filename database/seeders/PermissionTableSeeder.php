<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'profile-list',
           'profile-create',
           'profile-edit',
           'profile-delete',
           'client-list',
           'client-create',
           'client-edit',
           'client-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

 
        $adminRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(\Spatie\Permission\Models\Permission::all());

        $user = \App\Models\User::find(1);
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}