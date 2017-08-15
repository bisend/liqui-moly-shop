<?php

use App\DatabaseModels\TopBanner;
use Illuminate\Database\Seeder;

class TopBannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        TopBanner::truncate();
        $this->command->info('[top_banner] table truncated...');

        $this->seed();

        $this->command->info('[top_banner] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    
    public function seed()
    {
        $model = new TopBanner();
        
        $model->image_id = 25;
        
        $model->big_text_uk = 'АКЦІЯ!';
        $model->medium_text_uk = 'ЗНИЖКА НА ВСІ АВТОМАСТИЛА 10%';
        $model->url_uk = url_home('uk');
        
        $model->big_text_ru = 'АКЦИЯ!';
        $model->medium_text_ru = 'СКИДКА НА ВСЕ МАСЛА 10%';
        $model->url_ru = url_home('ru');
        
        $model->save();
    }
}
