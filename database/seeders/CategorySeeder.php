<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['легкий', 'хрупкий', 'тяжелый'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
