<?php

use App\Models\User;
use App\Models\Atestat;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(2);
        $user->atestate()->create([
            'name' => $user->name,
            'address' => 'adresa producator atestat',
            'serie_id' => 13,
            'number'=> '1234567',
            'valid_year'=> '2020',
            'region_id' => 13,
            'place_id' => 61265,
            'created_by_id' => $user->id,
        ]);

        $subcategories = Subcategory::all();

        foreach($subcategories as $subcategory) {
            Product::create([
                'title' => 'Vand '.$subcategory->name,
                'slug' => Str::slug('vand '.$subcategory->name),
                'category_id' => $subcategory->category_id,
                'description' => 'Cras euismod justo vel neque lobortis tristique. Pellentesque vel dui placerat sem ullamcorper ultricies. Mauris eleifend pulvinar urna, eu mollis massa cursus vitae. Nullam eget semper lectus, eu gravida tortor. Ut scelerisque, sem nec tristique viverra, elit nunc cursus massa, ac imperdiet augue sem sagittis nisl. Cras nulla ante, mattis molestie justo ac, rutrum laoreet nunc. Aliquam nec lobortis sem. Etiam nec faucibus massa.',
                'subcategory_id' => $subcategory->id,
                'price_starts' => rand(3, 8),
                'price_ends' => rand(8, 15),
                'region_id' => $user->atestate->first()->region_id,
                'place_id' => $user->atestate->first()->place_id,
                'created_by_id' => $user->id,
            ]);
        }
    }
}
