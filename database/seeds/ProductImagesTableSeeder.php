<?php

use App\DatabaseModels\Product;
use App\DatabaseModels\ProductImage;
use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        ProductImage::truncate();
        $this->command->info('[product_images] table truncated...');

        $this->seed();

        $this->command->info('[product_images] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
        $products = Product::select('id')->get();
        
        foreach ($products as $product)
        {
            $model = new ProductImage();
            $model->product_id = $product->id;
            $model->image_id = rand(1, 19);
            $model->save();
            if ($product->id == 15)
            {
                $model = new ProductImage();
                $model->product_id = $product->id;
                $model->image_id = 2;
                $model->save();
            }
        }
    }
}
