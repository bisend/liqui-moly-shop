<?php

use App\DatabaseModels\Product;
use App\DatabaseModels\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Review::truncate();
        $this->command->info('[reviews] table truncated...');
        
        DB::beginTransaction();
        $this->seed();
        DB::commit();

        $this->command->info('[reviews] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
        $faker = Faker\Factory::create();

        Product::chunk(500, function($products) use($faker) {
            foreach ($products as $product)
            {
                for ($i = 0; $i < 10; $i++)
                {
                    $model = new Review();
                    $model->product_id = $product->id;
                    $model->review = $faker->text();
                    $model->username = $faker->userName;
                    $model->email = $faker->email;
                    $model->is_moderated = true;
                    $model->rating = rand(1, 5);
                    $model->save();
                }
            }
        });
    }
}
