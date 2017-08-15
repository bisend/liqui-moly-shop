<?php

use App\Helpers\URLify;
use App\DatabaseModels\PropertyValue;
use Illuminate\Database\Seeder;

class PropertyValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        PropertyValue::truncate();
        $this->command->info('[property_values] table truncated...');

        $this->seed();

        $this->command->info('[property_values] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
        $propertyValues = $this->getDataArray();

        foreach ($propertyValues as $propertyValue) {
            $model = new PropertyValue();
            $model->value_uk = $propertyValue['value_uk'];
            $model->value_ru = $propertyValue['value_ru'];
            $model->value_slug = $propertyValue['value_slug'];
            $model->save();
        }
    }

    public function getDataArray()
    {
        return [
            [
                'value_uk' => "0.5л",
                'value_ru' => '0.5л',
                'value_slug' => URLify::filter ("0.5л")
            ],
            [
                'value_uk' => "1л",
                'value_ru' => '1л',
                'value_slug' => URLify::filter ("1л")
            ],
            [
                'value_uk' => "4л",
                'value_ru' => '4л',
                'value_slug' => URLify::filter ("4л")
            ],
            [
                'value_uk' => "20л",
                'value_ru' => '20л',
                'value_slug' => URLify::filter ("20л")
            ],
            [
                'value_uk' => "60л",
                'value_ru' => '60л',
                'value_slug' => URLify::filter ("60л")
            ],
            [
                'value_uk' => "208л",
                'value_ru' => '208л',
                'value_slug' => URLify::filter ("208л")
            ],
            [
                'value_uk' => "Червоний",
                'value_ru' => 'Красный',
                'value_slug' => URLify::filter ("Червоний")
            ],
            [
                'value_uk' => "36",
                'value_ru' => '36',
                'value_slug' => URLify::filter ("36")
            ],
            [
                'value_uk' => "7.7",
                'value_ru' => '7.7',
                'value_slug' => URLify::filter ("7.7")
            ],
            [
                'value_uk' => "0.885",
                'value_ru' => '0.885',
                'value_slug' => URLify::filter ("0.885")
            ],
            [
                'value_uk' => "191",
                'value_ru' => '191',
                'value_slug' => URLify::filter ("191")
            ],
            [
                'value_uk' => "200",
                'value_ru' => '200',
                'value_slug' => URLify::filter ("200")
            ],
            [
                'value_uk' => "-46",
                'value_ru' => '-46',
                'value_slug' => URLify::filter ("-46")
            ],
        ];
    }
}
