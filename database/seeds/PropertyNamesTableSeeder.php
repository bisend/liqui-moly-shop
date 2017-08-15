<?php

use App\DatabaseModels\PropertyName;
use App\Helpers\URLify;
use Illuminate\Database\Seeder;

class PropertyNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        PropertyName::truncate();
        $this->command->info('[property_names] table truncated...');

        $this->seed();

        $this->command->info('[property_names] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
        $propertyNames = $this->getDataArray();

        foreach ($propertyNames as $propertyName) {
            $model = new PropertyName();
            $model->name_uk = $propertyName['name_uk'];
            $model->name_ru = $propertyName['name_ru'];
            $model->name_slug = $propertyName['name_slug'];
            $model->save();
        }
    }
    
    public function getDataArray()
    {
        return [
            [
                'name_uk' => "Об'єм",
                'name_ru' => 'Объем',
                'name_slug' => URLify::filter ("Об'єм")
            ],
            [
                'name_uk' => 'Колір',
                'name_ru' => 'Цвет',
                'name_slug' => URLify::filter ('Колір')
            ],
            [
                'name_uk' => "В'язкість при 40° C, ММ2/С",
                'name_ru' => "Вязкость при 40° C, ММ2/С",
                'name_slug' => URLify::filter ("В'язкість при 40° C, ММ2/С")
            ],
            [
                'name_uk' => "В'язкість при 100° C, ММ2/С",
                'name_ru' => "Вязкость при 100° C, ММ2/С",
                'name_slug' => URLify::filter ("В'язкість при 100° C, ММ2/С")
            ],
            [
                'name_uk' => "Густина при 15° C",
                'name_ru' => "Плотность при 15° C",
                'name_slug' => URLify::filter ("Густина при 15° C")
            ],
            [
                'name_uk' => "Індекс в'язкості",
                'name_ru' => "Индекс вязкости",
                'name_slug' => URLify::filter ("Індекс в'язкості")
            ],
            [
                'name_uk' => "Температура спалаху",
                'name_ru' => "Температура вспышки",
                'name_slug' => URLify::filter ("Температура спалаху")
            ],
            [
                'name_uk' => "Температура застигання",
                'name_ru' => "Температура застывания",
                'name_slug' => URLify::filter ("Температура застигання")
            ],
        ];
    }
}
