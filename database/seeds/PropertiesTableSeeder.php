<?php

use App\DatabaseModels\Property;
use App\DatabaseModels\Product;
use App\DatabaseModels\PropertyName;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Property::truncate();
        $this->command->info('[properties] table truncated...');

        $this->seed();

        $this->command->info('[properties] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    
    public function seed()
    {
        $products = Product::select('id')->get();
        $propertyNames = PropertyName::select('id')->get();
        foreach ($products as $product)
        {
            foreach ($propertyNames as $propertyName)
            {
                $model = new Property();
                $model->product_id = $product->id;
                $model->property_name_id = $propertyName->id;
                $model->property_value_id = rand(1, 13);
                $model->save();
            }
        }
    }
}
