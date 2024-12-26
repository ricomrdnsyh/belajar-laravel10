<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin'
            ],
            ['name' => 'admin']
        );
        $role_writer = Role::updateOrCreate(
            [
                'name' => 'writer'
            ],
            ['name' => 'writer']
        );
        $role_guest = Role::updateOrCreate(
            [
                'name' => 'guest'
            ],
            ['name' => 'guest']
        );
        $permission = Permission::updateorCreate(
            [
                'name' => 'view_dashboard'
            ],
            ['name' => 'view_dashboard']
        );
        $permission2 = Permission::updateorCreate(
            [
                'name' => 'view_multimedia'
            ],
            ['name' => 'view_multimedia']
        );
        $permission3 = Permission::updateorCreate(
            [
                'name' => 'view_user'
            ],
            ['name' => 'view_user']
        );

        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_admin->givePermissionTo($permission3);
        $role_writer->givePermissionTo($permission);
        $role_writer->givePermissionTo($permission2);

        $user = User::find(1);
        $user2 = User::find(14);

        $user->assignRole('admin');
        $user2->assignRole('writer');
    }
}
