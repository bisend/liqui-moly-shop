<?php

use App\DatabaseModels\Product;
use Illuminate\Database\Seeder;

class ProductRatingPatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->command->info('[rating] seed started...');

        $this->seed();

        $this->command->info('[rating] seed ended...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
        Product::chunk(500, function($products) {
            foreach ($products as $product)
            {
                $product->avg_rating = mt_rand(1.00, 5.00);
                $product->save();
            }
        });
    }
}
