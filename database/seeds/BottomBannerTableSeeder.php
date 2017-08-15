<?php

use App\DatabaseModels\BottomBanner;
use Illuminate\Database\Seeder;

class BottomBannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        BottomBanner::truncate();
        $this->command->info('[bottom_banner] table truncated...');

        $this->seed();

        $this->command->info('[bottom_banner] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
        $model = new BottomBanner();

        $model->image_id = 25;

        $model->big_text_uk = 'СУПЕР ЦІНА!';
        $model->medium_text_uk = 'ПРИСАДКИ ВСЬОГО 399 ГРН';
        $model->url_uk = url_home('uk');

        $model->big_text_ru = 'СУПЕР ЦЕНА!';
        $model->medium_text_ru = 'ПРИСАДКИ ВСЕГО ЗА 399 ГРН';
        $model->url_ru = url_home('ru');

        $model->save();
    }
}
