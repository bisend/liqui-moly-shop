<?php

use App\DatabaseModels\MainSlider;
use Illuminate\Database\Seeder;

class MainSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        MainSlider::truncate();
        $this->command->info('[main_slider] table truncated...');
        
        DB::beginTransaction();
        $this->seed();
        DB::commit();

        $this->command->info('[main_slider] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    
    public function seed()
    {
//        $limit = 5;
        for ($i = 20; $i <= 24; $i++)
        {
            $model = new MainSlider();
            $model->image_id = $i;

            $model->big_text_uk = 'НОВИНКА! ' . $i;
            $model->medium_text_uk = 'НОВА АВТОКОСМЕТИКА';
            $model->small_text_uk = 'ЗАРЕЄСТРОВАНИМ КОРИСТУВАЧАМ ЗНИЖКА 5%';
            $model->button_text_uk = 'Переглянути';
            $model->url_uk = url_home('uk');

            $model->big_text_ru = 'НОВИНКА! ' . $i;
            $model->medium_text_ru = 'НОВАЯ АВТОКОСМЕТИКА';
            $model->small_text_ru = 'ЗАРЕГЕСТРИРОВАНЫМ ПОЛЬЗОВАТЕЛЯМ СКИДКА 5%';
            $model->button_text_ru = 'Посмотреть';
            $model->url_ru = url_home('ru');

            $model->save();
        }
    }
}
