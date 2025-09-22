<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PleadsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'title' => 'pleads_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'pleads_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'pleads_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'pleads_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'pleads_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'plead_category_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'plead_category_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'plead_category_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'plead_category_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'plead_category_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_category_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_category_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_category_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_category_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'muslim_fortress_category_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['title' => $permission['title']],
                $permission
            );
        }

        // Assign pleads permissions to admin role (role ID 1)
        $adminRole = \App\Models\Role::find(1);
        if ($adminRole) {
            $pleadsPermissions = Permission::whereIn('title', [
                'pleads_access',
                'pleads_create',
                'pleads_edit',
                'pleads_show',
                'pleads_delete',
                'plead_category_access',
                'plead_category_create',
                'plead_category_edit',
                'plead_category_show',
                'plead_category_delete',
                'muslim_fortress_access',
                'muslim_fortress_create',
                'muslim_fortress_edit',
                'muslim_fortress_show',
                'muslim_fortress_delete',
                'muslim_fortress_category_access',
                'muslim_fortress_category_create',
                'muslim_fortress_category_edit',
                'muslim_fortress_category_show',
                'muslim_fortress_category_delete'
            ])->pluck('id');
            
            $adminRole->permissions()->syncWithoutDetaching($pleadsPermissions);
        }


    }
}