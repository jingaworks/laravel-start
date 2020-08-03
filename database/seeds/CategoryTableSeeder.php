<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie = [
            [
                'id'    => 1,
                'name' => 'Legume',
                'slug' => 'legume',
                'added_by_id' => 1,
                'approved' => 1,
                'approved_by_id' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'Fructe',
                'slug' => 'fructe',
                'added_by_id' => 1,
                'approved' => 1,
                'approved_by_id' => 1,
            ],
            [
                'id'    => 3,
                'name' => 'Lactate',
                'slug' => 'lactate',
                'added_by_id' => 1,
                'approved' => 1,
                'approved_by_id' => 1,
            ],
        ];

        Category::insert($categorie);
    }
}
