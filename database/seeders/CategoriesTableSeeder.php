<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

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
            'gaming pcs', 'gaming laptops', 'gaming consoles', 'keyboards', 'mouses', 'headsets', 'pc components', 'accessories', 'merchandise'
        ];
    
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
    }
}
}
