<?php

use App\DatabaseModels\Category;
use App\DatabaseModels\Product;
use Illuminate\Database\Seeder;

class ProductsCategoryPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed();
    }
    
    public function seed()
    {
        Product::chunk(500, function($products) {
            foreach ($products as $product)
            {
                $product->category_path = "." . $product->category_id . ".";
                $product->save();

                $currentCategory = Category::whereId($product->category_id)->first();

                if ($currentCategory->parent_id)
                {
                    $product->category_path .= $currentCategory->parent_id . ".";
                    $product->save();

                    $currentCategory = Category::whereId($currentCategory->parent_id)->first();

                    if ($currentCategory->parent_id)
                    {
                        $product->category_path .= $currentCategory->parent_id . ".";
                        $product->save();
                    }
                }
            }
        });
    }
}
