<?php

use App\DatabaseModels\Image;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Image::truncate();
        $this->command->info('[images] table truncated...');
        
        DB::beginTransaction();
        $this->seed();
        DB::commit();

        $this->command->info('[images] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
//        $limit = 1000;
//        for ($i = 0; $i < $limit; $i++)
//        {
//            $model = new Image();
//            $model->big = '/img/products/big/no_photo.jpg';
//            $model->medium = '/img/products/medium/no_photo.jpg';
//            $model->small = '/img/products/small/no_photo.jpg';
//            $model->save();
//        }
        
        
        for ($i = 1; $i <= 19; $i++)
        {
            $model = new Image();
            $model->original = "/img/products/original/$i.jpg";
            $model->big = "/img/products/big/$i.jpg";
            $model->medium = "/img/products/medium/$i.jpg";
            $model->small = "/img/products/small/$i.jpg";
            $model->save();
        }

        //id: 20
        $model = new Image();
        $model->main_slider = '/img/main-slider/1.jpg';
        $model->save();

        //id: 21
        $model = new Image();
        $model->main_slider = '/img/main-slider/2.jpg';
        $model->save();

        //id: 22
        $model = new Image();
        $model->main_slider = '/img/main-slider/3.jpg';
        $model->save();

        //id: 23
        $model = new Image();
        $model->main_slider = '/img/main-slider/4.jpg';
        $model->save();

        //id: 24
        $model = new Image();
        $model->main_slider = '/img/main-slider/5.jpg';
        $model->save();

        //id: 25
        $model = new Image();
        $model->top_banner = '/img/top-banner/csm_Vollsoertiment_1140x770_63ec45d371.jpg';
        $model->save();

        //id: 26
        $model = new Image();
        $model->bottom_banner = '/img/bottom-banner/csm_Vollsoertiment_1140x770_63ec45d371.jpg';
        $model->save();
    }
}
