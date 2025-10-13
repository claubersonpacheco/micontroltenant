<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Traits\GenerateAutomaticCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use GenerateAutomaticCode;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $category = Category::first();

        Product::create([
            'code' => $this->generateCode(Product::class),
            'name' => 'Pintar Salon',
            'category_id' => $category->id,
            'price' => 10.00,
            'product_type' => 'metro',
            'description' => 'Pintar Salon general',
        ]);
    }
}
