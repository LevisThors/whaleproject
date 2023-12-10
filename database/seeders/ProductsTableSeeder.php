<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = Category::all();

        for($i = 0; $i < 50; $i++) {
            $product = Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'details' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 0, 10000),
                'image' => $faker->imageUrl(),
                'category_id' => $categories->random()['id']
            ]);

        }
    }
}
