<?php

use App\DatabaseModels\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Payment::truncate();
        $this->command->info('[payments] table truncated...');
        
        DB::beginTransaction();
        $this->seed();
        DB::commit();

        $this->command->info('[payments] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    
    public function seed()
    {
        $payments = [
            0 => [
                'name_uk' => 'Безготівковий розрахунок',
                'name_ru' => 'Безналичный расчет',
                'name_slug' => 'bezhotivkovyj_rozrahunok',
            ],
            1 => [
                'name_uk' => 'Накладений платіж',
                'name_ru' => 'Наложенный платеж',
                'name_slug' => 'nakladeniy_platizh',
            ],
            2 => [
                'name_uk' => 'Готівкою',
                'name_ru' => 'Наличными',
                'name_slug' => 'hotivkoyu',
            ]
        ];

        foreach ($payments as $key => $payment)
        {
            $model = new Payment();
            $model->name_uk = $payment['name_uk'];
            $model->name_ru = $payment['name_ru'];
            $model->name_slug = $payment['name_slug'];
            $model->save();
        }
    }
}
