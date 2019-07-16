<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create permissions
        Permission::create(['name' => 'Administer roles & permissions']);
        Permission::create(['name' => 'Create Post']);
        Permission::create(['name' => 'Edit Post']);
        Permission::create(['name' => 'Delete Post']);
        // Create roles and assign existing permissions
        $writerRole = Role::create(['name' => 'Writer']);
        $writerRole->givePermissionTo('Create Post');
        $writerRole->givePermissionTo('Edit Post');
        $writerRole->givePermissionTo('Delete Post');
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo('Administer roles & permissions');
        // Create admin and writer users
        // you can reset default password in login dialog
        $admin = Factory(App\User::class)->create([
            'name' => 'John The Admin',
            'email' => 'john@example.com',
        ]);
        $admin->assignRole($adminRole);
        $writer = Factory(App\User::class)->create([
            'name' => 'Mary The Writer',
            'email' => 'mary@example.com',
        ]);
        $writer->assignRole($writerRole);
    }
}
