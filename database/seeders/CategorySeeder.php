<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics', 'description' => 'Electronic devices and accessories', 'status' => true],
            ['name' => 'Clothing', 'slug' => 'clothing', 'description' => 'Fashion and apparel', 'status' => true],
            ['name' => 'Books', 'slug' => 'books', 'description' => 'Books and literature', 'status' => true],
            ['name' => 'Home & Garden', 'slug' => 'home-garden', 'description' => 'Home and garden supplies', 'status' => true],
            ['name' => 'Sports', 'slug' => 'sports', 'description' => 'Sports equipment and gear', 'status' => true],
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
