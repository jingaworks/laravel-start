<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RegionsTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call([
            UsersTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
            CategoryTableSeeder::class,
            SubcategoryTableSeeder::class,
            ProductsTableSeeder::class,
        ]);
    }
}