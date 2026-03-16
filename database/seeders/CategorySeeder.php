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
            ['name' => 'Toys', 'slug' => 'toys', 'description' => 'Children toys and games', 'status' => true],
            ['name' => 'Beauty', 'slug' => 'beauty', 'description' => 'Cosmetics and beauty products', 'status' => true],
            ['name' => 'Automotive', 'slug' => 'automotive', 'description' => 'Car parts and accessories', 'status' => true],
            ['name' => 'Health', 'slug' => 'health', 'description' => 'Health and wellness products', 'status' => true],
            ['name' => 'Food & Grocery', 'slug' => 'food-grocery', 'description' => 'Food items and groceries', 'status' => true],
            ['name' => 'Pet Supplies', 'slug' => 'pet-supplies', 'description' => 'Pet food and supplies', 'status' => true],
            ['name' => 'Office Supplies', 'slug' => 'office-supplies', 'description' => 'Stationery and office materials', 'status' => true],
            ['name' => 'Jewelry', 'slug' => 'jewelry', 'description' => 'Accessories and jewelry', 'status' => true],
            ['name' => 'Baby Products', 'slug' => 'baby-products', 'description' => 'Products for infants and toddlers', 'status' => true],
            ['name' => 'Art & Collectibles', 'slug' => 'art-collectibles', 'description' => 'Artwork and collectible items', 'status' => true],
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
