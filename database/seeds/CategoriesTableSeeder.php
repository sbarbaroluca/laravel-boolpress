<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Lifestyle',
            'Sport',
            'Cinema',
            'Music',
            'Wild',
            'Food'
        ];

        foreach($categories as $category) {

            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->slug = Str::slug($newCategory->name, '-');

            $newCategory->save();
        }
    }
}
