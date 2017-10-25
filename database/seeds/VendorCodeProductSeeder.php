<?php

use App\DatabaseModels\Product;
use Illuminate\Database\Seeder;

class VendorCodeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::chunk(500, function($products) {
            foreach ($products as $product)
            {
                $product->vendor_code = str_random(10); 
                $product->save();
            }
        });
    }
}
