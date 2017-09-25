<?php

use App\DatabaseModels\Promotion;
use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Promotion::truncate();
        $this->command->info('[promotions] table truncated...');

        $this->seed();

        $this->command->info('[promotions] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
        //top sales
        for ($i = 1; $i <= 4; $i++)
        {
            $model = new Promotion();
            $model->product_id = $i;
            $model->product_status_id = 2;
            $model->save();
        }

        //novelty
        for ($i = 5; $i <= 8; $i++)
        {
            $model = new Promotion();
            $model->product_id = $i;
            $model->product_status_id = 1;
            $model->save();
        }

        //seasonal goods
        for ($i = 9; $i <= 15; $i++)
        {
            $model = new Promotion();
            $model->product_id = $i;
            $model->product_status_id = 3;
            $model->save();
        }

        //recommended prods
        for ($i = 16; $i <= 18; $i++)
        {
            $model = new Promotion();
            $model->product_id = $i;
            $model->product_status_id = 4;
            $model->save();
        }

        //best prices
        for ($i = 19; $i <= 21; $i++)
        {
            $model = new Promotion();
            $model->product_id = $i;
            $model->product_status_id = 5;
            $model->save();
        }
    }
}
