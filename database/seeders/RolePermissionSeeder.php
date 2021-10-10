<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionNames = [
            'view-categories','create-category','edit-category','destroy-category',
            'view-suppliers','create-supplier','edit-supplier','destroy-supplier',
            'view-purchases','create-purchase','edit-purchase','destroy-purchase',
            'view-products','create-product','edit-product','destroy-product',
            'view-sales','create-sale','edit-sale','destroy-sale',
            'view-customers','create-customer','edit-customer','destroy-customer',
            'view-backups','create-backup','download-backup','destroy-backup',
            'access-control',
            'view-users','create-user','edit-user','destroy-user',
            'view-roles','create-role','edit-role','destroy-role',
            'view-permissions','create-permission','edit-permission','destroy-permission',
            'view-reports',
          ];
         $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
             return ['name' => $permission, 'guard_name' => 'web'];
         });
  
        Permission::insert($permissions->toArray());
  
        // create roles and assign permissions
        $sales = Role::create(['name' => 'sales']);
        $sales->givePermissionTo(['view-sales','view-products','create-product','edit-product', 'view-reports','create-sales']);
        
        $admin = Role::create(['name' => 'super-admin']);
        $admin->givePermissionTo(Permission::all());
    }
}
