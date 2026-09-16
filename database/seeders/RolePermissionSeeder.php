<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $admin      = Role::firstOrCreate(['name' => 'admin']);
        $editor     = Role::firstOrCreate(['name' => 'editor']);
        $member     = Role::firstOrCreate(['name' => 'member']);

        // Permissions
        $permissions = [
            'manage-members',
            'manage-events',
            'manage-news',
            'manage-gallery',
            'manage-messages',
            'manage-users',
            'manage-roles',
            'manage-settings',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to super-admin
        $superAdmin->givePermissionTo(Permission::all());

        // Admin gets most, not role/user management
        $admin->givePermissionTo([
            'manage-members',
            'manage-events',
            'manage-news',
            'manage-gallery',
            'manage-messages',
        ]);

        // Editor gets content only
        $editor->givePermissionTo([
            'manage-events',
            'manage-news',
            'manage-gallery',
        ]);
    }
}
