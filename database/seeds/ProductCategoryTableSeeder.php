<?php

use App\DatabaseModels\Category;
use App\DatabaseModels\Product;
use App\DatabaseModels\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        ProductCategory::truncate();
        $this->command->info('[product_category] table truncated...');

        $this->seed();

        $this->command->info('[product_category] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    
    public function seed()
    {
        Product::chunk(500, function($products) {
            foreach ($products as $product)
            {
                $model = new ProductCategory();
                $model->product_id = $product->id;
                $model->category_id = $product->category_id;
                $model->save();

                $currentCategory = Category::whereId($product->category_id)->first();

                if ($currentCategory->parent_id)
                {
                    $model = new ProductCategory();
                    $model->product_id = $product->id;
                    $model->category_id = $currentCategory->parent_id;
                    $model->save();

                    $currentCategory = Category::whereId($currentCategory->parent_id)->first();

                    if ($currentCategory->parent_id)
                    {
                        $model = new ProductCategory();
                        $model->product_id = $product->id;
                        $model->category_id = $currentCategory->parent_id;
                        $model->save();
                    }
                }
            }
        });
    }
}
