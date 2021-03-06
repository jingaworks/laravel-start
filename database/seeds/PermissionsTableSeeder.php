<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'profile_create',
            ],
            [
                'id'    => 18,
                'title' => 'profile_edit',
            ],
            [
                'id'    => 19,
                'title' => 'profile_show',
            ],
            [
                'id'    => 20,
                'title' => 'profile_delete',
            ],
            [
                'id'    => 21,
                'title' => 'profile_access',
            ],
            [
                'id'    => 22,
                'title' => 'region_edit',
            ],
            [
                'id'    => 23,
                'title' => 'region_show',
            ],
            [
                'id'    => 24,
                'title' => 'region_delete',
            ],
            [
                'id'    => 25,
                'title' => 'region_access',
            ],
            [
                'id'    => 26,
                'title' => 'place_edit',
            ],
            [
                'id'    => 27,
                'title' => 'place_show',
            ],
            [
                'id'    => 28,
                'title' => 'place_delete',
            ],
            [
                'id'    => 29,
                'title' => 'place_access',
            ],
            [
                'id'    => 30,
                'title' => 'category_create',
            ],
            [
                'id'    => 31,
                'title' => 'category_edit',
            ],
            [
                'id'    => 32,
                'title' => 'category_show',
            ],
            [
                'id'    => 33,
                'title' => 'category_delete',
            ],
            [
                'id'    => 34,
                'title' => 'category_access',
            ],
            [
                'id'    => 35,
                'title' => 'subcategory_create',
            ],
            [
                'id'    => 36,
                'title' => 'subcategory_edit',
            ],
            [
                'id'    => 37,
                'title' => 'subcategory_show',
            ],
            [
                'id'    => 38,
                'title' => 'subcategory_delete',
            ],
            [
                'id'    => 39,
                'title' => 'subcategory_access',
            ],
            [
                'id'    => 40,
                'title' => 'product_create',
            ],
            [
                'id'    => 41,
                'title' => 'product_edit',
            ],
            [
                'id'    => 42,
                'title' => 'product_show',
            ],
            [
                'id'    => 43,
                'title' => 'product_delete',
            ],
            [
                'id'    => 44,
                'title' => 'product_access',
            ],
            [
                'id'    => 45,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}