<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        App\Models\Product::create([
            'name' => 'giay adidas',
            'code_product' => 'SP001',
            'desc' => 'san pham adidas chinh hang tu tau khua',
            'image' => ''
        ]);
    }
}
