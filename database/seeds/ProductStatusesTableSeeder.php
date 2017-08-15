<?php

use App\DatabaseModels\ProductStatus;
use App\Helpers\URLify;
use Illuminate\Database\Seeder;

class ProductStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        ProductStatus::truncate();
        $this->command->info('[product_statuses] table truncated...');

        $this->seed();

        $this->command->info('[product_statuses] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    
    public function seed()
    {
        $productStatuses = $this->getDataArray();
        
        foreach ($productStatuses as $productStatus)
        {
            $model = new ProductStatus();
            $model->name_uk = $productStatus['name_uk'];
            $model->name_ru = $productStatus['name_ru'];
            $model->name_slug = $productStatus['name_slug'];
            $model->save();
        }
    }
    
    public function getDataArray()
    {
        return [
            [
                'name_uk' => 'Новинки',
                'name_ru' => 'Новинки',
                'name_slug' => URLify::filter('Новинки'),
            ],
            [
                'name_uk' => 'Топ продаж',
                'name_ru' => 'Топ продаж',
                'name_slug' => URLify::filter('Топ продаж'),
            ],
            [
                'name_uk' => 'Сезонні товари',
                'name_ru' => 'Сезонные товары',
                'name_slug' => URLify::filter('Сезонні товари'),
            ],
            [
                'name_uk' => 'Акція',
                'name_ru' => 'Акция',
                'name_slug' => URLify::filter('Акція'),
            ],
        ];
    }
}
