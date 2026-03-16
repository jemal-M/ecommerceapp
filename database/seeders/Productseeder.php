<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id'=>1,
            'name'=>'product1',
            'slug'=>Str::slug('iphone'),
            'description'=>'this is product1',
            'price'=>1000,
            'stock'=>100,
            'sku'=>'IP15-001',
            'status'=>'active'
        ]);
         Product::create([
            'category_id'=>2,
            'name'=>'product2',
            'slug'=>Str::slug('macbook'),
            'description'=>'this is product2',
            'price'=>2000,
            'stock'=>200,
            'sku'=>'MBP-001',
            'status'=>'active'
        ]);
        Product::create([
            'category_id'=>3,
            'name'=>'product3',
            'slug'=>Str::slug('ipad'),
            'description'=>'this is product3',
            'price'=>3000,
            'stock'=>300,
            'sku'=>'IP15-003',
            'status'=>'inactive'
        ]);
        Product::create([
            'category_id'=>4,
            'name'=>'product4',
            'slug'=>Str::slug('apple watch'),
            'description'=>'this is product4',
            'price'=>4000,
            'stock'=>400,
            'sku'=>'AW-001',
            'status'=>'active'
        ]);
           
        Product::factory()->count(20)->create();
    }
}
