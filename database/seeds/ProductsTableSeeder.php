<?php

use App\DatabaseModels\Product;
use Illuminate\Database\Seeder;
use App\Helpers\URLify;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Product::truncate();
        $this->command->info('[products] table truncated...');

        $this->seed();

        $this->command->info('[products] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    
    public function seed()
    {
        $limit = 38100;

        $products = $this->getDataArray();

        $counter = 1;
        foreach ($products as $product)
        {
            $model = new Product();
            $model->category_id = $product['category_id'];
            if ($counter <= 4)
            {
                $model->product_status_id = $product['product_status_id'];
            } 
            elseif ($counter >= 5 && $counter <= 8)
            {
                $model->product_status_id = 2;
            } 
            elseif ($counter >= 9 && $counter <= 14)
            {
                $model->product_status_id = 3;
            }
            elseif ($counter == 15)
            {
                $model->product_status_id = 4;
            }
            $model->name_uk = $product['name_uk'];
            $model->name_ru = $product['name_ru'];
            $model->name_slug = $product['name_slug'];
            $model->price = rand(100, 1999);
            $model->old_price = $model->price + rand(50, 300);

            $model->description = $product['description'];
            $model->save();
            

            $counter++;
        }
        
        $cat_id = 40;
        
        for ($i = 1; $i <= $limit; $i++)
        {
            $model = new Product();
            
            if ($i % 300 == 0)
            {
                $model->category_id = $cat_id++;
            }
            else 
            {
                $model->category_id = $cat_id;
            }
            
            $model->name_uk = "Продукт $i";
            $model->name_ru = "Продукт $i";
            $model->name_slug = URLify::filter("Продукт $i");
            $model->price = rand(100, 1999);
            $model->old_price = $model->price + rand(50, 300);

            $model->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt';
            $model->save();
        }
    }

    public function getDataArray()
    {
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt';
        return [
            //category 8
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Top Tec 4100 5W-40 5л.',
                'name_ru' => 'Liqui Moly Top Tec 4100 5W-40 5л.',
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4100 5W-40 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Top Tec 4100 5W-40 4л.',
                'name_ru' => 'Liqui Moly Top Tec 4100 5W-40 4л.',
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4100 5W-40 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Top Tec 4100 5W-40 1л.',
                'name_ru' => 'Liqui Moly Top Tec 4100 5W-40 1л.',
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4100 5W-40 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Top Tec 4200 5W-30 5л.',
                'name_ru' => 'Liqui Moly Top Tec 4200 5W-30 5л.',
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 5W-30 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Top Tec 4200 5W-30 4л.',
                'name_ru' => 'Liqui Moly Top Tec 4200 5W-30 4л.',
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 5W-30 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Top Tec 4200 5W-30 1л.',
                'name_ru' => 'Liqui Moly Top Tec 4200 5W-30 1л.',
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 5W-30 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Diesel Synthoil 5W-40, 5л.',
                'name_ru' => 'Liqui Moly Diesel Synthoil 5W-40, 5л.',
                'name_slug' => URLify::filter("Liqui Moly Diesel Synthoil 5W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Diesel Synthoil 5W-40, 1л.',
                'name_ru' => 'Liqui Moly Diesel Synthoil 5W-40, 1л.',
                'name_slug' => URLify::filter("Liqui Moly Diesel Synthoil 5W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Synthoil High Tech 5W-40, 5л.',
                'name_ru' => 'Liqui Moly Synthoil High Tech 5W-40, 5л.',
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Synthoil High Tech 5W-40, 4л.',
                'name_ru' => 'Liqui Moly Synthoil High Tech 5W-40, 4л.',
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Synthoil High Tech 5W-40, 1л.',
                'name_ru' => 'Liqui Moly Synthoil High Tech 5W-40, 1л.',
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Leichtlauf High Tech 5W-40, 5л.',
                'name_ru' => 'Liqui Moly Leichtlauf High Tech 5W-40, 5л.',
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 5W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Leichtlauf High Tech 5W-40, 4л.',
                'name_ru' => 'Liqui Moly Leichtlauf High Tech 5W-40, 4л.',
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 5W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Leichtlauf High Tech 5W-40, 1л.',
                'name_ru' => 'Liqui Moly Leichtlauf High Tech 5W-40, 1л.',
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 5W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly SPECIAL TEC АА 5W-30 4л.',
                'name_ru' => 'Liqui Moly SPECIAL TEC АА 5W-30 4л.',
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 5W-30 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly SPECIAL TEC АА 5W-30 1л.',
                'name_ru' => 'Liqui Moly SPECIAL TEC АА 5W-30 1л.',
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 5W-30 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly SPECIAL TEC АA 5W-20 4л.',
                'name_ru' => 'Liqui Moly SPECIAL TEC АA 5W-20 4л.',
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АA 5W-20 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly SPECIAL TEC АА 5W-20 1л.',
                'name_ru' => 'Liqui Moly SPECIAL TEC АА 5W-20 1л.',
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 5W-20 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly SPECIAL TEC АА 0W-20 4л.',
                'name_ru' => 'Liqui Moly SPECIAL TEC АА 0W-20 4л.',
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 0W-20 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly SPECIAL TEC АА 0W-20 1л.',
                'name_ru' => 'Liqui Moly SPECIAL TEC АА 0W-20 1л.',
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 0W-20 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Molygen 5W-30, 4л.',
                'name_ru' => 'Liqui Moly Molygen 5W-30, 4л.',
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-30, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Molygen 5W-30, 5л.',
                'name_ru' => 'Liqui Moly Molygen 5W-30, 5л.',
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-30, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Molygen 5W-30, 1л.',
                'name_ru' => 'Liqui Moly Molygen 5W-30, 1л.',
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-30, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Molygen 5W-40, 5л.',
                'name_ru' => 'Liqui Moly Molygen 5W-40, 5л.',
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Molygen 5W-40, 4л.',
                'name_ru' => 'Liqui Moly Molygen 5W-40, 4л.',
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Molygen 5W-40, 1л.',
                'name_ru' => 'Liqui Moly Molygen 5W-40, 1л.',
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => 'Liqui Moly Special Tec LL / OPEL 5W-30 5л.',
                'name_ru' => 'Liqui Moly Special Tec LL / OPEL 5W-30 5л.',
                'name_slug' => URLify::filter("Liqui Moly Special Tec LL / OPEL 5W-30 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec LL / OPEL 5W-30 4л.",
                'name_ru' => "Liqui Moly Special Tec LL / OPEL 5W-30 4л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec LL / OPEL 5W-30 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec LL / OPEL 5W-30 1л.",
                'name_ru' => "Liqui Moly Special Tec LL / OPEL 5W-30 1л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec LL / OPEL 5W-30 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4300 5W-30, 5л",
                'name_ru' => "Liqui Moly Top Tec 4300 5W-30, 5л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4300 5W-30, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4300 5W-30, 1л",
                'name_ru' => "Liqui Moly Top Tec 4300 5W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4300 5W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4400 5W-30, 5л",
                'name_ru' => "Liqui Moly Top Tec 4400 5W-30, 5л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4400 5W-30, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4400 5W-30, 1л",
                'name_ru' => "Liqui Moly Top Tec 4400 5W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4400 5W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4500 5W-30, 5л",
                'name_ru' => "Liqui Moly Top Tec 4500 5W-30, 5л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4500 5W-30, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4500 5W-30, 1л",
                'name_ru' => "Liqui Moly Top Tec 4500 5W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4500 5W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4600 5W-30, 5л",
                'name_ru' => "Liqui Moly Top Tec 4600 5W-30, 5л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4600 5W-30, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4600 5W-30, 1л",
                'name_ru' => "Liqui Moly Top Tec 4600 5W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4600 5W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Race Tech GT1 10W-60, 5л",
                'name_ru' => "Liqui Moly Synthoil Race Tech GT1 10W-60, 5л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Race Tech GT1 10W-60, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Race Tech GT1 10W-60, 4л",
                'name_ru' => "Liqui Moly Synthoil Race Tech GT1 10W-60, 4л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Race Tech GT1 10W-60, 4л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Race Tech GT1 10W-60, 1л",
                'name_ru' => "Liqui Moly Synthoil Race Tech GT1 10W-60, 1л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Race Tech GT1 10W-60, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Longtime Plus 0W-30, 5л",
                'name_ru' => "Liqui Moly Synthoil Longtime Plus 0W-30, 5л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Longtime Plus 0W-30, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Longtime Plus 0W-30, 1л",
                'name_ru' => "Liqui Moly Synthoil Longtime Plus 0W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Longtime Plus 0W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Longtime 0W-30, 5л",
                'name_ru' => "Liqui Moly Synthoil Longtime 0W-30, 5л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Longtime 0W-30, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Longtime 0W-30, 1л",
                'name_ru' => "Liqui Moly Synthoil Longtime 0W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Longtime 0W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Energy 0W-40, 1л",
                'name_ru' => "Liqui Moly Synthoil Energy 0W-40, 1л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Energy 0W-40, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Energy 0W-40, 4л",
                'name_ru' => "Liqui Moly Synthoil Energy 0W-40, 4л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Energy 0W-40, 4л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-50, 5л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-50, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-50, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-50, 4л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-50, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-50, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-50, 1л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-50, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-50, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Longtime High Tech 5W-30, 5л",
                'name_ru' => "Liqui Moly Longtime High Tech 5W-30, 5л",
                'name_slug' => URLify::filter("Liqui Moly Longtime High Tech 5W-30, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Longtime High Tech 5W-30, 1л",
                'name_ru' => "Liqui Moly Longtime High Tech 5W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Longtime High Tech 5W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal Synth 5W-40 4л.",
                'name_ru' => "Liqui Moly Optimal Synth 5W-40 4л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal Synth 5W-40 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal Synth 5W-40 1л.",
                'name_ru' => "Liqui Moly Optimal Synth 5W-40 1л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal Synth 5W-40 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal HT 5W-30, 4л.",
                'name_ru' => "Liqui Moly Optimal HT 5W-30, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal HT 5W-30, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal HT 5W-30, 1л.",
                'name_ru' => "Liqui Moly Optimal HT 5W-30, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal HT 5W-30, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec V 0W-30 (VOLVO), 5л",
                'name_ru' => "Liqui Moly Special Tec V 0W-30 (VOLVO), 5л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec V 0W-30 (VOLVO), 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec V 0W-30 (VOLVO), 1л",
                'name_ru' => "Liqui Moly Special Tec V 0W-30 (VOLVO), 1л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec V 0W-30 (VOLVO), 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F 5W-30 (FORD), 5л",
                'name_ru' => "Liqui Moly Special Tec F 5W-30 (FORD), 5л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F 5W-30 (FORD), 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F 5W-30 (FORD), 1л",
                'name_ru' => "Liqui Moly Special Tec F 5W-30 (FORD), 1л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F 5W-30 (FORD), 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 5W-50 5л.",
                'name_ru' => "Liqui Moly Molygen 5W-50 5л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-50 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec 5W-30, 5л",
                'name_ru' => "Liqui Moly Special Tec 5W-30, 5л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec 5W-30, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 5W-50 4л.",
                'name_ru' => "Liqui Moly Molygen 5W-50 4л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-50 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec 5W-30, 1л",
                'name_ru' => "Liqui Moly Special Tec 5W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec 5W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 5W-50 1л.",
                'name_ru' => "Liqui Moly Molygen 5W-50 1л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-50 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F ECO 5W-20, 5л.",
                'name_ru' => "Liqui Moly Special Tec F ECO 5W-20, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F ECO 5W-20, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F ECO 5W-20, 1л.",
                'name_ru' => "Liqui Moly Special Tec F ECO 5W-20, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F ECO 5W-20, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4700 5W-30, 5л.",
                'name_ru' => "Liqui Moly Top Tec 4700 5W-30, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4700 5W-30, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4700 5W-30, 1л.",
                'name_ru' => "Liqui Moly Top Tec 4700 5W-30, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4700 5W-30, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4200 Diesel 5W-30, 5л.",
                'name_ru' => "Liqui Moly Top Tec 4200 Diesel 5W-30, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 Diesel 5W-30, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4200 Diesel 5W-30, 1л.",
                'name_ru' => "Liqui Moly Top Tec 4200 Diesel 5W-30, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 Diesel 5W-30, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-30, 5л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-30, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-30, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-30, 4л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-30, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-30, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 8,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-30, 1л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-30, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-30, 1л."),
                'description' => $lorem
            ],
            //category 9
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly SPECIAL TEC АА 10W-30 4л.",
                'name_ru' => "Liqui Moly SPECIAL TEC АА 10W-30 4л.",
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 10W-30 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly SPECIAL TEC АА 10W-30, 1л.",
                'name_ru' => "Liqui Moly SPECIAL TEC АА 10W-30, 1л.",
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 10W-30, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Leichtlauf 10W-40 5л.",
                'name_ru' => "Liqui Moly Super Leichtlauf 10W-40 5л.",
                'name_slug' => URLify::filter("Liqui Moly Super Leichtlauf 10W-40 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Leichtlauf 10W-40 4л.",
                'name_ru' => "Liqui Moly Super Leichtlauf 10W-40 4л.",
                'name_slug' => URLify::filter("Liqui Moly Super Leichtlauf 10W-40 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Leichtlauf 10W-40 1л.",
                'name_ru' => "Liqui Moly Super Leichtlauf 10W-40 1л.",
                'name_slug' => URLify::filter("Liqui Moly Super Leichtlauf 10W-40 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 10W-40, 5л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 10W-40, 5л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 10W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 10W-40, 4л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 10W-40, 4л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 10W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 10W-40, 1л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 10W-40, 1л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 10W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 10W-40, 4л.",
                'name_ru' => "Liqui Moly Molygen 10W-40, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 10W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 10W-40, 5л.",
                'name_ru' => "Liqui Moly Molygen 10W-40, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 10W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 10W-40, 1л.",
                'name_ru' => "Liqui Moly Molygen 10W-40, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 10W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Leichtlauf 10W-40, 5л.",
                'name_ru' => "Liqui Moly Diesel Leichtlauf 10W-40, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Diesel Leichtlauf 10W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Leichtlauf 10W-40, 1л.",
                'name_ru' => "Liqui Moly Diesel Leichtlauf 10W-40, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Diesel Leichtlauf 10W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf 10W-40, 4л.",
                'name_ru' => "Liqui Moly Leichtlauf 10W-40, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf 10W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf 10W-40, 5л.",
                'name_ru' => "Liqui Moly Leichtlauf 10W-40, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf 10W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf 10W-40, 1л.",
                'name_ru' => "Liqui Moly Leichtlauf 10W-40, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf 10W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal 10W-40, 4л.",
                'name_ru' => "Liqui Moly Optimal 10W-40, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal 10W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal 10W-40, 1л.",
                'name_ru' => "Liqui Moly Optimal 10W-40, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal 10W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal Diesel 10W-40, 4л.",
                'name_ru' => "Liqui Moly Optimal Diesel 10W-40, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal Diesel 10W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal Diesel 10W-40, 1л.",
                'name_ru' => "Liqui Moly Optimal Diesel 10W-40, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal Diesel 10W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 10W-50, 5л.",
                'name_ru' => "Liqui Moly Molygen 10W-50, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 10W-50, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 10W-50, 4л.",
                'name_ru' => "Liqui Moly Molygen 10W-50, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 10W-50, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 10W-50, 1л.",
                'name_ru' => "Liqui Moly Molygen 10W-50, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 10W-50, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Diesel Leichtlauf 10W-40, 5л.",
                'name_ru' => "Liqui Moly Super Diesel Leichtlauf 10W-40, 5л.",
                'name_slug' => URLify::filter("Liqui Moly Super Diesel Leichtlauf 10W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Diesel Leichtlauf 10W-40, 1л.",
                'name_ru' => "Liqui Moly Super Diesel Leichtlauf 10W-40, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Super Diesel Leichtlauf 10W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf High Tech 10W-50, 4л.",
                'name_ru' => "Liqui Moly Leichtlauf High Tech 10W-50, 4л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 10W-50, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 9,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf High Tech 10W-50, 1л.",
                'name_ru' => "Liqui Moly Leichtlauf High Tech 10W-50, 1л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 10W-50, 1л."),
                'description' => $lorem
            ],
            //category 10
            [
                'category_id' => 10,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 15W-40, 5л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 15W-40, 5л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 15W-40, 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 10,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 15W-40, 4л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 15W-40, 4л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 15W-40, 4л."),
                'description' => $lorem
            ],
            [
                'category_id' => 10,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 15W-40, 1л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 15W-40, 1л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 15W-40, 1л."),
                'description' => $lorem
            ],
            [
                'category_id' => 10,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 15W-50 5л.",
                'name_ru' => "Liqui Moly Molygen 15W-50 5л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 15W-50 5л."),
                'description' => $lorem
            ],
            [
                'category_id' => 10,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 15W-50 1л.",
                'name_ru' => "Liqui Moly Molygen 15W-50 1л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 15W-50 1л."),
                'description' => $lorem
            ],
            //category 11
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4100 5W-40, 20л.",
                'name_ru' => "Liqui Moly Top Tec 4100 5W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4100 5W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4100 5W-40, 60л.",
                'name_ru' => "Liqui Moly Top Tec 4100 5W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4100 5W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4100 5W-40, 205л.",
                'name_ru' => "Liqui Moly Top Tec 4100 5W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4100 5W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4200 5W-30, 20л.",
                'name_ru' => "Liqui Moly Top Tec 4200 5W-30, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 5W-30, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4200 5W-30, 60л.",
                'name_ru' => "Liqui Moly Top Tec 4200 5W-30, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 5W-30, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4200 5W-30, 205л.",
                'name_ru' => "Liqui Moly Top Tec 4200 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Synthoil 5W-40, 20л.",
                'name_ru' => "Liqui Moly Diesel Synthoil 5W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Diesel Synthoil 5W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Synthoil 5W-40, 60л.",
                'name_ru' => "Liqui Moly Diesel Synthoil 5W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Diesel Synthoil 5W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Synthoil 5W-40, 205л.",
                'name_ru' => "Liqui Moly Diesel Synthoil 5W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Diesel Synthoil 5W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-40, 20л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-40, 60л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-40, 205л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf High Tech 5W-40, 20л.",
                'name_ru' => "Liqui Moly Leichtlauf High Tech 5W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 5W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf High Tech 5W-40, 60л.",
                'name_ru' => "Liqui Moly Leichtlauf High Tech 5W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 5W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf High Tech 5W-40, 205л.",
                'name_ru' => "Liqui Moly Leichtlauf High Tech 5W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 5W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly SPECIAL TEC АА 5W-30 20л.",
                'name_ru' => "Liqui Moly SPECIAL TEC АА 5W-30 20л.",
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 5W-30 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly SPECIAL TEC АА 5W-20, 205л.",
                'name_ru' => "Liqui Moly SPECIAL TEC АА 5W-20, 205л.",
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 5W-20, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly SPECIAL TEC АА 5W-30 205л.",
                'name_ru' => "Liqui Moly SPECIAL TEC АА 5W-30 205л.",
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 5W-30 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly SPECIAL TEC АА 0W-20 205л.",
                'name_ru' => "Liqui Moly SPECIAL TEC АА 0W-20 205л.",
                'name_slug' => URLify::filter("Liqui Moly SPECIAL TEC АА 0W-20 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 5W-30, 20л.",
                'name_ru' => "Liqui Moly Molygen 5W-30, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-30, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 5W-30, 205л.",
                'name_ru' => "Liqui Moly Molygen 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 5W-40, 60л.",
                'name_ru' => "Liqui Moly Molygen 5W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 5W-40, 205л.",
                'name_ru' => "Liqui Moly Molygen 5W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 5W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec LL / OPEL 5W-30, 20л.",
                'name_ru' => "Liqui Moly Special Tec LL / OPEL 5W-30, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec LL / OPEL 5W-30, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec LL / OPEL 5W-30, 60л.",
                'name_ru' => "Liqui Moly Special Tec LL / OPEL 5W-30, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec LL / OPEL 5W-30, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec LL / OPEL 5W-30, 205л.",
                'name_ru' => "Liqui Moly Special Tec LL / OPEL 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec LL / OPEL 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4300 5W-30, 20л",
                'name_ru' => "Liqui Moly Top Tec 4300 5W-30, 20л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4300 5W-30, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4300 5W-30, 60л",
                'name_ru' => "Liqui Moly Top Tec 4300 5W-30, 60л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4300 5W-30, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4600 5W-30, 20л",
                'name_ru' => "Liqui Moly Top Tec 4600 5W-30, 20л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4600 5W-30, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4600 5W-30, 60л",
                'name_ru' => "Liqui Moly Top Tec 4600 5W-30, 60л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4600 5W-30, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4600 5W-30, 205л",
                'name_ru' => "Liqui Moly Top Tec 4600 5W-30, 205л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4600 5W-30, 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Energy 0W-40, 20л",
                'name_ru' => "Liqui Moly Synthoil Energy 0W-40, 20л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Energy 0W-40, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil Energy 0W-40, 60л",
                'name_ru' => "Liqui Moly Synthoil Energy 0W-40, 60л",
                'name_slug' => URLify::filter("Liqui Moly Synthoil Energy 0W-40, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-50, 60л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-50, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-50, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-50, 205л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-50, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-50, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Longtime High Tech 5W-30, 20л",
                'name_ru' => "Liqui Moly Longtime High Tech 5W-30, 20л",
                'name_slug' => URLify::filter("Liqui Moly Longtime High Tech 5W-30, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Longtime High Tech 5W-30, 60л",
                'name_ru' => "Liqui Moly Longtime High Tech 5W-30, 60л",
                'name_slug' => URLify::filter("Liqui Moly Longtime High Tech 5W-30, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Longtime High Tech 5W-30, 205л",
                'name_ru' => "Liqui Moly Longtime High Tech 5W-30, 205л",
                'name_slug' => URLify::filter("Liqui Moly Longtime High Tech 5W-30, 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal Synth 5W-40, 60л.",
                'name_ru' => "Liqui Moly Optimal Synth 5W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal Synth 5W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal Synth 5W-40, 205л.",
                'name_ru' => "Liqui Moly Optimal Synth 5W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal Synth 5W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec V 0W-30 (VOLVO), 205л",
                'name_ru' => "Liqui Moly Special Tec V 0W-30 (VOLVO), 205л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec V 0W-30 (VOLVO), 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F 5W-30 (FORD), 60л",
                'name_ru' => "Liqui Moly Special Tec F 5W-30 (FORD), 60л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F 5W-30 (FORD), 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F 5W-30 (FORD), 205л",
                'name_ru' => "Liqui Moly Special Tec F 5W-30 (FORD), 205л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F 5W-30 (FORD), 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec 5W-30, 60л",
                'name_ru' => "Liqui Moly Special Tec 5W-30, 60л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec 5W-30, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec 5W-30, 205л",
                'name_ru' => "Liqui Moly Special Tec 5W-30, 205л",
                'name_slug' => URLify::filter("Liqui Moly Special Tec 5W-30, 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Leichtlauf 10W-40, 20л.",
                'name_ru' => "Liqui Moly Super Leichtlauf 10W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Super Leichtlauf 10W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Leichtlauf 10W-40, 60л.",
                'name_ru' => "Liqui Moly Super Leichtlauf 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Super Leichtlauf 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Leichtlauf 10W-40, 205л.",
                'name_ru' => "Liqui Moly Super Leichtlauf 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Super Leichtlauf 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 10W-40, 20л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 10W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 10W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 10W-40, 60л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 10W-40, 205л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 10W-40, 60л.",
                'name_ru' => "Liqui Moly Molygen 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen 10W-40, 205л.",
                'name_ru' => "Liqui Moly Molygen 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Molygen 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Leichtlauf 10W40, 20л.",
                'name_ru' => "Liqui Moly Diesel Leichtlauf 10W40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Diesel Leichtlauf 10W40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Leichtlauf 10W40, 60л.",
                'name_ru' => "Liqui Moly Diesel Leichtlauf 10W40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Diesel Leichtlauf 10W40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Leichtlauf 10W40, 205л.",
                'name_ru' => "Liqui Moly Diesel Leichtlauf 10W40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Diesel Leichtlauf 10W40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf 10W-40, 60л.",
                'name_ru' => "Liqui Moly Leichtlauf 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf 10W-40, 205л.",
                'name_ru' => "Liqui Moly Leichtlauf 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal 10W-40, 60л.",
                'name_ru' => "Liqui Moly Optimal 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal 10W-40, 205л.",
                'name_ru' => "Liqui Moly Optimal 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal Diesel 10W-40, 60л.",
                'name_ru' => "Liqui Moly Optimal Diesel 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal Diesel 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal Diesel 10W-40, 205л.",
                'name_ru' => "Liqui Moly Optimal Diesel 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal Diesel 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 15W-40, 60л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 15W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 15W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Leichtlauf 15W-40, 205л.",
                'name_ru' => "Liqui Moly MoS2 Leichtlauf 15W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Leichtlauf 15W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal HT 5W-30, 20л.",
                'name_ru' => "Liqui Moly Optimal HT 5W-30, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal HT 5W-30, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Optimal HT 5W-30, 205л.",
                'name_ru' => "Liqui Moly Optimal HT 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Optimal HT 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4700 5W-30, 20л.",
                'name_ru' => "Liqui Moly Top Tec 4700 5W-30, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4700 5W-30, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4700 5W-30, 60л.",
                'name_ru' => "Liqui Moly Top Tec 4700 5W-30, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4700 5W-30, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4700 5W-30, 205л.",
                'name_ru' => "Liqui Moly Top Tec 4700 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4700 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4200 Diesel 5W-30, 60л.",
                'name_ru' => "Liqui Moly Top Tec 4200 Diesel 5W-30, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 Diesel 5W-30, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4200 Diesel 5W-30, 205л.",
                'name_ru' => "Liqui Moly Top Tec 4200 Diesel 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4200 Diesel 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F ECO 5W-20, 20л.",
                'name_ru' => "Liqui Moly Special Tec F ECO 5W-20, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F ECO 5W-20, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F ECO 5W-20, 60л.",
                'name_ru' => "Liqui Moly Special Tec F ECO 5W-20, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F ECO 5W-20, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Special Tec F ECO 5W-20, 205л.",
                'name_ru' => "Liqui Moly Special Tec F ECO 5W-20, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Special Tec F ECO 5W-20, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf High Tech 10W-50, 60л.",
                'name_ru' => "Liqui Moly Leichtlauf High Tech 10W-50, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 10W-50, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leichtlauf High Tech 10W-50, 205л.",
                'name_ru' => "Liqui Moly Leichtlauf High Tech 10W-50, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Leichtlauf High Tech 10W-50, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-30, 60л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-30, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-30, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Synthoil High Tech 5W-30, 205л.",
                'name_ru' => "Liqui Moly Synthoil High Tech 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Synthoil High Tech 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4400 5W-30, 20л",
                'name_ru' => "Liqui Moly Top Tec 4400 5W-30, 20л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4400 5W-30, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4400 5W-30, 60л",
                'name_ru' => "Liqui Moly Top Tec 4400 5W-30, 60л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4400 5W-30, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4400 5W-30, 205л",
                'name_ru' => "Liqui Moly Top Tec 4400 5W-30, 205л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4400 5W-30, 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4500 5W-30, 20л",
                'name_ru' => "Liqui Moly Top Tec 4500 5W-30, 20л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4500 5W-30, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4500 5W-30, 60л",
                'name_ru' => "Liqui Moly Top Tec 4500 5W-30, 60л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4500 5W-30, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 11,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec 4500 5W-30, 205л",
                'name_ru' => "Liqui Moly Top Tec 4500 5W-30, 205л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec 4500 5W-30, 205л"),
                'description' => $lorem
            ],
            //category 12
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec Truck 4150 5W-30, 20л.",
                'name_ru' => "Liqui Moly Top Tec Truck 4150 5W-30, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec Truck 4150 5W-30, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec Truck 4150 5W-30, 205л.",
                'name_ru' => "Liqui Moly Top Tec Truck 4150 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec Truck 4150 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec Truck 4250 5W-30, 20л.",
                'name_ru' => "Liqui Moly Top Tec Truck 4250 5W-30, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec Truck 4250 5W-30, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec Truck 4250 5W-30, 205л.",
                'name_ru' => "Liqui Moly Top Tec Truck 4250 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec Truck 4250 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Langzeit Motoroil Truck FE 5W-30, 20л.",
                'name_ru' => "Liqui Moly Langzeit Motoroil Truck FE 5W-30, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Langzeit Motoroil Truck FE 5W-30, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Langzeit Motoroil Truck FE 5W-30, 205л.",
                'name_ru' => "Liqui Moly Langzeit Motoroil Truck FE 5W-30, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Langzeit Motoroil Truck FE 5W-30, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec Truck 4050 10W-40, 20л.",
                'name_ru' => "Liqui Moly Top Tec Truck 4050 10W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec Truck 4050 10W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec Truck 4050 10W-40, 60л.",
                'name_ru' => "Liqui Moly Top Tec Truck 4050 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec Truck 4050 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec Truck 4050 10W-40, 205л.",
                'name_ru' => "Liqui Moly Top Tec Truck 4050 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Top Tec Truck 4050 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 20л.",
                'name_ru' => "Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 60л.",
                'name_ru' => "Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 205л.",
                'name_ru' => "Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly LKW Langzeit-Motoroil SAE 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 20л.",
                'name_ru' => "Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 60л.",
                'name_ru' => "Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 205л.",
                'name_ru' => "Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly LKW Leichtlauf-Motoroil 10W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Touring High Tech Super SHPD 15W-40, 20л.",
                'name_ru' => "Liqui Moly Touring High Tech Super SHPD 15W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Touring High Tech Super SHPD 15W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Touring High Tech Super SHPD 15W-40, 205л.",
                'name_ru' => "Liqui Moly Touring High Tech Super SHPD 15W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Touring High Tech Super SHPD 15W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Touring High Tech SHPD 15W-40, 20л.",
                'name_ru' => "Liqui Moly Touring High Tech SHPD 15W-40, 20л.",
                'name_slug' => URLify::filter("Liqui Moly Touring High Tech SHPD 15W-40, 20л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Touring High Tech SHPD 15W-40, 60л.",
                'name_ru' => "Liqui Moly Touring High Tech SHPD 15W-40, 60л.",
                'name_slug' => URLify::filter("Liqui Moly Touring High Tech SHPD 15W-40, 60л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Touring High Tech SHPD 15W-40, 205л.",
                'name_ru' => "Liqui Moly Touring High Tech SHPD 15W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Touring High Tech SHPD 15W-40, 205л."),
                'description' => $lorem
            ],
            [
                'category_id' => 12,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Nova Super 15W-40, 205л.",
                'name_ru' => "Liqui Moly Nova Super 15W-40, 205л.",
                'name_slug' => URLify::filter("Liqui Moly Nova Super 15W-40, 205л."),
                'description' => $lorem
            ],
            //category 13
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1100, 0,5л",
                'name_ru' => "Liqui Moly Top Tec ATF 1100, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1100, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1100, 1л",
                'name_ru' => "Liqui Moly Top Tec ATF 1100, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1100, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1100, 4л",
                'name_ru' => "Liqui Moly Top Tec ATF 1100, 4л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1100, 4л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1100, 20л",
                'name_ru' => "Liqui Moly Top Tec ATF 1100, 20л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1100, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1200, 0.5л",
                'name_ru' => "Liqui Moly Top Tec ATF 1200, 0.5л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1200, 0.5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1200, 1л",
                'name_ru' => "Liqui Moly Top Tec ATF 1200, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1200, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1200, 5л",
                'name_ru' => "Liqui Moly Top Tec ATF 1200, 5л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1200, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1200, 20л",
                'name_ru' => "Liqui Moly Top Tec ATF 1200, 20л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1200, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1400, 1л",
                'name_ru' => "Liqui Moly Top Tec ATF 1400, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1400, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1600, 1л",
                'name_ru' => "Liqui Moly Top Tec ATF 1600, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1600, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Top Tec ATF 1800, 1л",
                'name_ru' => "Liqui Moly Top Tec ATF 1800, 1л",
                'name_slug' => URLify::filter("Liqui Moly Top Tec ATF 1800, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly ATF ll E, 1л",
                'name_ru' => "Liqui Moly ATF ll E, 1л",
                'name_slug' => URLify::filter("Liqui Moly ATF ll E, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly ATF Dexron II D HC, 1л",
                'name_ru' => "Liqui Moly ATF Dexron II D HC, 1л",
                'name_slug' => URLify::filter("Liqui Moly ATF Dexron II D HC, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly ATF lll HC, 1л",
                'name_ru' => "Liqui Moly ATF lll HC, 1л",
                'name_slug' => URLify::filter("Liqui Moly ATF lll HC, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly ATF III+SEEL SWELLER, 1л",
                'name_ru' => "Liqui Moly ATF III+SEEL SWELLER, 1л",
                'name_slug' => URLify::filter("Liqui Moly ATF III+SEEL SWELLER, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Zentralhydraulikoil, 1л",
                'name_ru' => "Liqui Moly Zentralhydraulikoil, 1л",
                'name_slug' => URLify::filter("Liqui Moly Zentralhydraulikoil, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Lenkgetriebe-OiI 3100, 1л",
                'name_ru' => "Liqui Moly Lenkgetriebe-OiI 3100, 1л",
                'name_slug' => URLify::filter("Liqui Moly Lenkgetriebe-OiI 3100, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Dual Clutch Transmission Oil 8100 (DSG), 1л",
                'name_ru' => "Liqui Moly Dual Clutch Transmission Oil 8100 (DSG), 1л",
                'name_slug' => URLify::filter("Liqui Moly Dual Clutch Transmission Oil 8100 (DSG), 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 13,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Zentralhydraulik-Oil, 1л",
                'name_ru' => "Liqui Moly Zentralhydraulik-Oil, 1л",
                'name_slug' => URLify::filter("Liqui Moly Zentralhydraulik-Oil, 1л"),
                'description' => $lorem
            ],
            //category 14
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hochleistungs-Getriebeoil GL4+(GL-4/GL-5) 75W-90, 1л",
                'name_ru' => "Liqui Moly Hochleistungs-Getriebeoil GL4+(GL-4/GL-5) 75W-90, 1л",
                'name_slug' => URLify::filter("Liqui Moly Hochleistungs-Getriebeoil GL4+(GL-4/GL-5) 75W-90, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hochleistungs-Getriebeoil GL4+(GL-4/GL-5) 75W-90, 20л",
                'name_ru' => "Liqui Moly Hochleistungs-Getriebeoil GL4+(GL-4/GL-5) 75W-90, 20л",
                'name_slug' => URLify::filter("Liqui Moly Hochleistungs-Getriebeoil GL4+(GL-4/GL-5) 75W-90, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Vollsynthetisches Getriebeoil (GL-5) 75W-90, 1л",
                'name_ru' => "Liqui Moly Vollsynthetisches Getriebeoil (GL-5) 75W-90, 1л",
                'name_slug' => URLify::filter("Liqui Moly Vollsynthetisches Getriebeoil (GL-5) 75W-90, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Vollsynthetisches Getriebeoil (GL-5) 75W-90, 20л",
                'name_ru' => "Liqui Moly Vollsynthetisches Getriebeoil (GL-5) 75W-90, 20л",
                'name_slug' => URLify::filter("Liqui Moly Vollsynthetisches Getriebeoil (GL-5) 75W-90, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hypoid-Getriebeoil SAE 80W-90 (GL5), 1л",
                'name_ru' => "Liqui Moly Hypoid-Getriebeoil SAE 80W-90 (GL5), 1л",
                'name_slug' => URLify::filter("Liqui Moly Hypoid-Getriebeoil SAE 80W-90 (GL5), 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hypoid-Getriebeoil SAE 80W-90 (GL5), 20л",
                'name_ru' => "Liqui Moly Hypoid-Getriebeoil SAE 80W-90 (GL5), 20л",
                'name_slug' => URLify::filter("Liqui Moly Hypoid-Getriebeoil SAE 80W-90 (GL5), 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Getriebeoil (GL-4) 85W-90, 1л",
                'name_ru' => "Liqui Moly Getriebeoil (GL-4) 85W-90, 1л",
                'name_slug' => URLify::filter("Liqui Moly Getriebeoil (GL-4) 85W-90, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Getriebeoil (GL-4) 85W-90, 20л",
                'name_ru' => "Liqui Moly Getriebeoil (GL-4) 85W-90, 20л",
                'name_slug' => URLify::filter("Liqui Moly Getriebeoil (GL-4) 85W-90, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hypoid-Getriebeoil SAE 85W-90 (GL5), 1л",
                'name_ru' => "Liqui Moly Hypoid-Getriebeoil SAE 85W-90 (GL5), 1л",
                'name_slug' => URLify::filter("Liqui Moly Hypoid-Getriebeoil SAE 85W-90 (GL5), 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hypoid-Getriebeoil SAE 85W-90 (GL5), 20л",
                'name_ru' => "Liqui Moly Hypoid-Getriebeoil SAE 85W-90 (GL5), 20л",
                'name_slug' => URLify::filter("Liqui Moly Hypoid-Getriebeoil SAE 85W-90 (GL5), 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hypoid-Getriebeoil TDL (GL-4/GL-5) 75W-90, 1л",
                'name_ru' => "Liqui Moly Hypoid-Getriebeoil TDL (GL-4/GL-5) 75W-90, 1л",
                'name_slug' => URLify::filter("Liqui Moly Hypoid-Getriebeoil TDL (GL-4/GL-5) 75W-90, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hypoid-Getriebeoil TDL (GL-4/GL-5) 75W-90, 20л",
                'name_ru' => "Liqui Moly Hypoid-Getriebeoil TDL (GL-4/GL-5) 75W-90, 20л",
                'name_slug' => URLify::filter("Liqui Moly Hypoid-Getriebeoil TDL (GL-4/GL-5) 75W-90, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Getriebeoil 75W-80 (GL-5), 1л",
                'name_ru' => "Liqui Moly Getriebeoil 75W-80 (GL-5), 1л",
                'name_slug' => URLify::filter("Liqui Moly Getriebeoil 75W-80 (GL-5), 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Vollsynthetisches Hypoid-Getriebeoil (GL-5) LS 75W-140, 1л",
                'name_ru' => "Liqui Moly Vollsynthetisches Hypoid-Getriebeoil (GL-5) LS 75W-140, 1л",
                'name_slug' => URLify::filter("Liqui Moly Vollsynthetisches Hypoid-Getriebeoil (GL-5) LS 75W-140, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Vollsynthetisches Hypoid-Getriebeoil (GL-5) LS 75W-140, 20л",
                'name_ru' => "Liqui Moly Vollsynthetisches Hypoid-Getriebeoil (GL-5) LS 75W-140, 20л",
                'name_slug' => URLify::filter("Liqui Moly Vollsynthetisches Hypoid-Getriebeoil (GL-5) LS 75W-140, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hochleistungs-Getriebeol SAE 75W-80 GL3+, 1л",
                'name_ru' => "Liqui Moly Hochleistungs-Getriebeol SAE 75W-80 GL3+, 1л",
                'name_slug' => URLify::filter("Liqui Moly Hochleistungs-Getriebeol SAE 75W-80 GL3+, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hochleistungs-Getriebeol SAE 75W-80 GL3+, 20л",
                'name_ru' => "Liqui Moly Hochleistungs-Getriebeol SAE 75W-80 GL3+, 20л",
                'name_slug' => URLify::filter("Liqui Moly Hochleistungs-Getriebeol SAE 75W-80 GL3+, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hypoid-Getriebeoil TDL 80W-90, 20л",
                'name_ru' => "Liqui Moly Hypoid-Getriebeoil TDL 80W-90, 20л",
                'name_slug' => URLify::filter("Liqui Moly Hypoid-Getriebeoil TDL 80W-90, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hypoid-Getriebeoil (GL 5) LS 85W-90, 1л",
                'name_ru' => "Liqui Moly Hypoid-Getriebeoil (GL 5) LS 85W-90, 1л",
                'name_slug' => URLify::filter("Liqui Moly Hypoid-Getriebeoil (GL 5) LS 85W-90, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Getriebeoil SAE 80W (GL4), 1л",
                'name_ru' => "Liqui Moly Getriebeoil SAE 80W (GL4), 1л",
                'name_slug' => URLify::filter("Liqui Moly Getriebeoil SAE 80W (GL4), 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 14,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Getriebeoil SAE 80W (GL4), 20л",
                'name_ru' => "Liqui Moly Getriebeoil SAE 80W (GL4), 20л",
                'name_slug' => URLify::filter("Liqui Moly Getriebeoil SAE 80W (GL4), 20л"),
                'description' => $lorem
            ],
            //category 15
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Pro-Line Motorspulung, 500мл",
                'name_ru' => "Liqui Moly Pro-Line Motorspulung, 500мл",
                'name_slug' => URLify::filter("Liqui Moly Pro-Line Motorspulung, 500мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Engine Flush, 300мл",
                'name_ru' => "Liqui Moly Engine Flush, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Engine Flush, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Oil-Schlamm-Spulung, 300мл",
                'name_ru' => "Liqui Moly Oil-Schlamm-Spulung, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Oil-Schlamm-Spulung, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Olsystem Spulung Light, 300мл",
                'name_ru' => "Liqui Moly Olsystem Spulung Light, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Olsystem Spulung Light, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Olsystem Spulung Effektiv, 300мл",
                'name_ru' => "Liqui Moly Olsystem Spulung Effektiv, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Olsystem Spulung Effektiv, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Olsystem Spulung High Performance Benzin, 300мл",
                'name_ru' => "Liqui Moly Olsystem Spulung High Performance Benzin, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Olsystem Spulung High Performance Benzin, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Olsystem Spulung High Performance Diesel, 300мл",
                'name_ru' => "Liqui Moly Olsystem Spulung High Performance Diesel, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Olsystem Spulung High Performance Diesel, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MotorClean 500мл",
                'name_ru' => "Liqui Moly MotorClean 500мл",
                'name_slug' => URLify::filter("Liqui Moly MotorClean 500мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 15,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Automatik Getriebe-Reiniger, 300мл",
                'name_ru' => "Liqui Moly Automatik Getriebe-Reiniger, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Automatik Getriebe-Reiniger, 300мл"),
                'description' => $lorem
            ],
            //category 16
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Cera Tec, 300мл",
                'name_ru' => "Liqui Moly Cera Tec, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Cera Tec, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Oil Additiv, 300мл",
                'name_ru' => "Liqui Moly Oil Additiv, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Oil Additiv, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Oil Additiv, 125мл",
                'name_ru' => "Liqui Moly Oil Additiv, 125мл",
                'name_slug' => URLify::filter("Liqui Moly Oil Additiv, 125мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Molygen MotorProtect, 500мл",
                'name_ru' => "Liqui Moly Molygen MotorProtect, 500мл",
                'name_slug' => URLify::filter("Liqui Moly Molygen MotorProtect, 500мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MotorProtect, 500мл",
                'name_ru' => "Liqui Moly MotorProtect, 500мл",
                'name_slug' => URLify::filter("Liqui Moly MotorProtect, 500мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Oil-Verlust-Stop, 300мл",
                'name_ru' => "Liqui Moly Oil-Verlust-Stop, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Oil-Verlust-Stop, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Visco-Stabil, 300мл",
                'name_ru' => "Liqui Moly Visco-Stabil, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Visco-Stabil, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hydro-Stossel-Additiv, 300мл",
                'name_ru' => "Liqui Moly Hydro-Stossel-Additiv, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Hydro-Stossel-Additiv, 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 16,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Oil Treatment, 300мл",
                'name_ru' => "Liqui Moly Oil Treatment, 300мл",
                'name_slug' => URLify::filter("Liqui Moly Oil Treatment, 300мл"),
                'description' => $lorem
            ],
            //category 17
            [
                'category_id' => 17,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly GearProtect, 80мл",
                'name_ru' => "Liqui Moly GearProtect, 80мл",
                'name_slug' => URLify::filter("Liqui Moly GearProtect, 80мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 17,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Getriebeoil-Additiv, 20мл",
                'name_ru' => "Liqui Moly Getriebeoil-Additiv, 20мл",
                'name_slug' => URLify::filter("Liqui Moly Getriebeoil-Additiv, 20мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 17,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly ATF ADDITIV, 250мл",
                'name_ru' => "Liqui Moly ATF ADDITIV, 250мл",
                'name_slug' => URLify::filter("Liqui Moly ATF ADDITIV, 250мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 17,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Getriebeol-Verlust-Stop, 50мл",
                'name_ru' => "Liqui Moly Getriebeol-Verlust-Stop, 50мл",
                'name_slug' => URLify::filter("Liqui Moly Getriebeol-Verlust-Stop, 50мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 17,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Servolenkungsoil-Verlust-Stop, 35мл",
                'name_ru' => "Liqui Moly Servolenkungsoil-Verlust-Stop, 35мл",
                'name_slug' => URLify::filter("Liqui Moly Servolenkungsoil-Verlust-Stop, 35мл"),
                'description' => $lorem
            ],
            //category 18
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Langzeit-Injection Reiniger",
                'name_ru' => "Liqui Moly Langzeit-Injection Reiniger",
                'name_slug' => URLify::filter("Liqui Moly Langzeit-Injection Reiniger"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Injection Reiniger Light",
                'name_ru' => "Liqui Moly Injection Reiniger Light",
                'name_slug' => URLify::filter("Liqui Moly Injection Reiniger Light"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Injection Reiniger Effectiv",
                'name_ru' => "Liqui Moly Injection Reiniger Effectiv",
                'name_slug' => URLify::filter("Liqui Moly Injection Reiniger Effectiv"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Injection Reiniger High Performance",
                'name_ru' => "Liqui Moly Injection Reiniger High Performance",
                'name_slug' => URLify::filter("Liqui Moly Injection Reiniger High Performance"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Injection-Reiniger",
                'name_ru' => "Liqui Moly Injection-Reiniger",
                'name_slug' => URLify::filter("Liqui Moly Injection-Reiniger"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly mtx Vergaser Reiniger",
                'name_ru' => "Liqui Moly mtx Vergaser Reiniger",
                'name_slug' => URLify::filter("Liqui Moly mtx Vergaser Reiniger"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Speed Benzin Zusatz, 1л",
                'name_ru' => "Liqui Moly Speed Benzin Zusatz, 1л",
                'name_slug' => URLify::filter("Liqui Moly Speed Benzin Zusatz, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Ventil Sauber (очистка клапанов)",
                'name_ru' => "Liqui Moly Ventil Sauber (очистка клапанов)",
                'name_slug' => URLify::filter("Liqui Moly Ventil Sauber (очистка клапанов)"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Octane Plus",
                'name_ru' => "Liqui Moly Octane Plus",
                'name_slug' => URLify::filter("Liqui Moly Octane Plus"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly SpeedTec",
                'name_ru' => "Liqui Moly SpeedTec",
                'name_slug' => URLify::filter("Liqui Moly SpeedTec"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Benzin-System Pflege",
                'name_ru' => "Liqui Moly Benzin-System Pflege",
                'name_slug' => URLify::filter("Liqui Moly Benzin-System Pflege"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Direkt Injection Reiniger, 500мл",
                'name_ru' => "Liqui Moly Direkt Injection Reiniger, 500мл",
                'name_slug' => URLify::filter("Liqui Moly Direkt Injection Reiniger, 500мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Fuel Protect (вытеснитель влаги)",
                'name_ru' => "Liqui Moly Fuel Protect (вытеснитель влаги)",
                'name_slug' => URLify::filter("Liqui Moly Fuel Protect (вытеснитель влаги)"),
                'description' => $lorem
            ],
            [
                'category_id' => 18,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Benzin-Stabilisator",
                'name_ru' => "Liqui Moly Benzin-Stabilisator",
                'name_slug' => URLify::filter("Liqui Moly Benzin-Stabilisator"),
                'description' => $lorem
            ],
            //catgory 19
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Partikelfilter Schutz (для DPF)",
                'name_ru' => "Liqui Moly Diesel Partikelfilter Schutz (для DPF)",
                'name_slug' => URLify::filter("Liqui Moly Diesel Partikelfilter Schutz (для DPF)"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Systempflege Diesel (для Common-Rail)",
                'name_ru' => "Liqui Moly Systempflege Diesel (для Common-Rail)",
                'name_slug' => URLify::filter("Liqui Moly Systempflege Diesel (для Common-Rail)"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super Diesel Additiv",
                'name_ru' => "Liqui Moly Super Diesel Additiv",
                'name_slug' => URLify::filter("Liqui Moly Super Diesel Additiv"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel-Schmier-Additiv (змазка)",
                'name_ru' => "Liqui Moly Diesel-Schmier-Additiv (смазка)",
                'name_slug' => URLify::filter("Liqui Moly Diesel-Schmier-Additiv (смазка)"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Speed Tec Diesel",
                'name_ru' => "Liqui Moly Speed Tec Diesel",
                'name_slug' => URLify::filter("Liqui Moly Speed Tec Diesel"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel-Spulung (очищувач форсунок)",
                'name_ru' => "Liqui Moly Diesel-Spulung (очиститель форсунок)",
                'name_slug' => URLify::filter("Liqui Moly Diesel-Spulung (очиститель форсунок)"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel Russ-Stop (уменьшение дымности)",
                'name_ru' => "Liqui Moly Diesel Russ-Stop (уменьшение дымности)",
                'name_slug' => URLify::filter("Liqui Moly Diesel Russ-Stop (уменьшение дымности)"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Speed Diesel Zusatz",
                'name_ru' => "Liqui Moly Speed Diesel Zusatz",
                'name_slug' => URLify::filter("Liqui Moly Speed Diesel Zusatz"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel fliess-fit (дизельный антигель)",
                'name_ru' => "Liqui Moly Diesel fliess-fit (дизельный антигель)",
                'name_slug' => URLify::filter("Liqui Moly Diesel fliess-fit (дизельный антигель)"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel fliess-fit K (дизельный антигель)",
                'name_ru' => "Liqui Moly Diesel fliess-fit K (дизельный антигель)",
                'name_slug' => URLify::filter("Liqui Moly Diesel fliess-fit K (дизельный антигель)"),
                'description' => $lorem
            ],
            [
                'category_id' => 19,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Diesel fliess-fit K (дизельный антигель)",
                'name_ru' => "Liqui Moly Diesel fliess-fit K (дизельный антигель)",
                'name_slug' => URLify::filter("Liqui Moly Diesel fliess-fit K (дизельный антигель)"),
                'description' => $lorem
            ],
            //category 20
            [
                'category_id' => 20,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kuhler Dichter (герметик), 250мл",
                'name_ru' => "Liqui Moly Kuhler Dichter (герметик), 250мл",
                'name_slug' => URLify::filter("Liqui Moly Kuhler Dichter (герметик), 250мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 20,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kuhler Reiniger (очиститель), 300мл",
                'name_ru' => "Liqui Moly Kuhler Reiniger (очиститель), 300мл",
                'name_slug' => URLify::filter("Liqui Moly Kuhler Reiniger (очиститель), 300мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 20,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kuhler Aussenreiniger",
                'name_ru' => "Liqui Moly Kuhler Aussenreiniger",
                'name_slug' => URLify::filter("Liqui Moly Kuhler Aussenreiniger"),
                'description' => $lorem
            ],
            //category 21
            [
                'category_id' => 21,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Super K Cleaner",
                'name_ru' => "Liqui Moly Super K Cleaner",
                'name_slug' => URLify::filter("Liqui Moly Super K Cleaner"),
                'description' => $lorem
            ],
            [
                'category_id' => 21,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Auto-Wasch&Wachs (шампунь с воском)",
                'name_ru' => "Liqui Moly Auto-Wasch&Wachs (шампунь с воском)",
                'name_slug' => URLify::filter("Liqui Moly Auto-Wasch&Wachs (шампунь с воском)"),
                'description' => $lorem
            ],
            [
                'category_id' => 21,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Auto-Wasch-Shampoo",
                'name_ru' => "Liqui Moly Auto-Wasch-Shampoo",
                'name_slug' => URLify::filter("Liqui Moly Auto-Wasch-Shampoo"),
                'description' => $lorem
            ],
            [
                'category_id' => 21,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly шампунь с воском 1 л.",
                'name_ru' => "Liqui Moly шампунь с воском 1 л.",
                'name_slug' => URLify::filter("Liqui Moly шампунь с воском 1 л."),
                'description' => $lorem
            ],
            [
                'category_id' => 21,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Silikon&Wachs-Entferner (удалитель воска и силикона)",
                'name_ru' => "Liqui Moly Silikon&Wachs-Entferner (удалитель воска и силикона)",
                'name_slug' => URLify::filter("Liqui Moly Silikon&Wachs-Entferner (удалитель воска и силикона)"),
                'description' => $lorem
            ],
            [
                'category_id' => 21,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Baumharzentferner (удалитель смолы)",
                'name_ru' => "Liqui Moly Baumharzentferner (удалитель смолы)",
                'name_slug' => URLify::filter("Liqui Moly Baumharzentferner (удалитель смолы)"),
                'description' => $lorem
            ],
            [
                'category_id' => 21,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Teer-Entferner (антибитум)",
                'name_ru' => "Liqui Moly Teer-Entferner (антибитум)",
                'name_slug' => URLify::filter("Liqui Moly Teer-Entferner (антибитум)"),
                'description' => $lorem
            ],
            [
                'category_id' => 21,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly гелевый очиститель пятен от насекомых",
                'name_ru' => "Liqui Moly гелевый очиститель пятен от насекомых",
                'name_slug' => URLify::filter("Liqui Moly гелевый очиститель пятен от насекомых"),
                'description' => $lorem
            ],
            //category 22
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kunststoff Wie Neu (schwarz)",
                'name_ru' => "Liqui Moly Kunststoff Wie Neu (schwarz)",
                'name_slug' => URLify::filter("Liqui Moly Kunststoff Wie Neu (schwarz)"),
                'description' => $lorem
            ],
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly полироль для новых автомобилей",
                'name_ru' => "Liqui Moly полироль для новых автомобилей",
                'name_slug' => URLify::filter("Liqui Moly полироль для новых автомобилей"),
                'description' => $lorem
            ],
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly полироль для кузова",
                'name_ru' => "Liqui Moly полироль для кузова",
                'name_slug' => URLify::filter("Liqui Moly полироль для кузова"),
                'description' => $lorem
            ],
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly полироль для металлика",
                'name_ru' => "Liqui Moly полироль для металлика",
                'name_slug' => URLify::filter("Liqui Moly полироль для металлика"),
                'description' => $lorem
            ],
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly универсальная полироль",
                'name_ru' => "Liqui Moly универсальная полироль",
                'name_slug' => URLify::filter("Liqui Moly универсальная полироль"),
                'description' => $lorem
            ],
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly ликвидатор царапин",
                'name_ru' => "Liqui Moly ликвидатор царапин",
                'name_slug' => URLify::filter("Liqui Moly ликвидатор царапин"),
                'description' => $lorem
            ],
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly восстанавливающая полироль",
                'name_ru' => "Liqui Moly восстанавливающая полироль",
                'name_slug' => URLify::filter("Liqui Moly восстанавливающая полироль"),
                'description' => $lorem
            ],
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Lack-Glanz-Creme (полироль)",
                'name_ru' => "Liqui Moly Lack-Glanz-Creme (полироль)",
                'name_slug' => URLify::filter("Liqui Moly Lack-Glanz-Creme (полироль)"),
                'description' => $lorem
            ],
            [
                'category_id' => 22,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Chrom-Glanz-Creme (для хрома)",
                'name_ru' => "Liqui Moly Chrom-Glanz-Creme (для хрома)",
                'name_slug' => URLify::filter("Liqui Moly Chrom-Glanz-Creme (для хрома)"),
                'description' => $lorem
            ],
            //category 23
            [
                'category_id' => 23,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Leder-Pflege (лосьон для кожи)",
                'name_ru' => "Liqui Moly Leder-Pflege (лосьон для кожи)",
                'name_slug' => URLify::filter("Liqui Moly Leder-Pflege (лосьон для кожи)"),
                'description' => $lorem
            ],
            [
                'category_id' => 23,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kunststoff-Tiefen-Pfleger (для пластика)",
                'name_ru' => "Liqui Moly Kunststoff-Tiefen-Pfleger (для пластика)",
                'name_slug' => URLify::filter("Liqui Moly Kunststoff-Tiefen-Pfleger (для пластика)"),
                'description' => $lorem
            ],
            [
                'category_id' => 23,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Cockpit Glanz (для торпедо)",
                'name_ru' => "Liqui Moly Cockpit Glanz (для торпедо)",
                'name_slug' => URLify::filter("Liqui Moly Cockpit Glanz (для торпедо)"),
                'description' => $lorem
            ],
            [
                'category_id' => 23,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Cockpit Pflege Vanille (для торпедо)",
                'name_ru' => "Liqui Moly Cockpit Pflege Vanille (для торпедо)",
                'name_slug' => URLify::filter("Liqui Moly Cockpit Pflege Vanille (для торпедо)"),
                'description' => $lorem
            ],
            [
                'category_id' => 23,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Cockpit Pflege Citrus (для торпедо)",
                'name_ru' => "Liqui Moly Cockpit Pflege Citrus (для торпедо)",
                'name_slug' => URLify::filter("Liqui Moly Cockpit Pflege Citrus (для торпедо)"),
                'description' => $lorem
            ],
            [
                'category_id' => 23,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Innenraum-Reiniger (очиститель салона)",
                'name_ru' => "Liqui Moly Innenraum-Reiniger (очиститель салона)",
                'name_slug' => URLify::filter("Liqui Moly Innenraum-Reiniger (очиститель салона)"),
                'description' => $lorem
            ],
            [
                'category_id' => 23,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Geruchs-Killer (нейтрализатор запахов)",
                'name_ru' => "Liqui Moly Geruchs-Killer (нейтрализатор запахов)",
                'name_slug' => URLify::filter("Liqui Moly Geruchs-Killer (нейтрализатор запахов)"),
                'description' => $lorem
            ],
            [
                'category_id' => 23,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Polster-Schaum-Reiniger (пена для обивки)",
                'name_ru' => "Liqui Moly Polster-Schaum-Reiniger (пена для обивки)",
                'name_slug' => URLify::filter("Liqui Moly Polster-Schaum-Reiniger (пена для обивки)"),
                'description' => $lorem
            ],
            //category 24
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Anti-Beschlag-Spray (антизапотеватель)",
                'name_ru' => "Liqui Moly Anti-Beschlag-Spray (антизапотеватель)",
                'name_slug' => URLify::filter("Liqui Moly Anti-Beschlag-Spray (антизапотеватель)"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Fix-Klar Regenabweiser (антидождь)",
                'name_ru' => "Liqui Moly Fix-Klar Regenabweiser (антидождь)",
                'name_slug' => URLify::filter("Liqui Moly Fix-Klar Regenabweiser (антидождь)"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Scheiben-Reiniger-Schaum (пена)",
                'name_ru' => "Liqui Moly Scheiben-Reiniger-Schaum (пена)",
                'name_slug' => URLify::filter("Liqui Moly Scheiben-Reiniger-Schaum (пена)"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly очиститель стекол суперконцентрат (персик)",
                'name_ru' => "Liqui Moly очиститель стекол суперконцентрат (персик)",
                'name_slug' => URLify::filter("Liqui Moly очиститель стекол суперконцентрат (персик)"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly очиститель стекол суперконцентрат (яблоко)",
                'name_ru' => "Liqui Moly очиститель стекол суперконцентрат (яблоко)",
                'name_slug' => URLify::filter("Liqui Moly очиститель стекол суперконцентрат (яблоко)"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly очиститель стекол суперконцентрат (лайм)",
                'name_ru' => "Liqui Moly очиститель стекол суперконцентрат (лайм)",
                'name_slug' => URLify::filter("Liqui Moly очиститель стекол суперконцентрат (лайм)"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Омыватель стекла Liqui Moly -80C",
                'name_ru' => "Омыватель стекла Liqui Moly -80C",
                'name_slug' => URLify::filter("Омыватель стекла Liqui Moly -80C"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Омыватель стекла Liqui Moly -80C",
                'name_ru' => "Омыватель стекла Liqui Moly -80C",
                'name_slug' => URLify::filter("Омыватель стекла Liqui Moly -80C"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Scheiben Enteiser (размораживатель)",
                'name_ru' => "Liqui Moly Scheiben Enteiser (размораживатель)",
                'name_slug' => URLify::filter("Liqui Moly Scheiben Enteiser (размораживатель)"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Scheiben Reiniger, 2л",
                'name_ru' => "Liqui Moly Scheiben Reiniger, 2л",
                'name_slug' => URLify::filter("Liqui Moly Scheiben Reiniger, 2л"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Turschloss-Enteiser (размораживатель замков)",
                'name_ru' => "Liqui Moly Turschloss-Enteiser (размораживатель замков)",
                'name_slug' => URLify::filter("Liqui Moly Turschloss-Enteiser (размораживатель замков)"),
                'description' => $lorem
            ],
            [
                'category_id' => 24,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly летний омыватель стекол",
                'name_ru' => "Liqui Moly летний омыватель стекол",
                'name_slug' => URLify::filter("Liqui Moly летний омыватель стекол"),
                'description' => $lorem
            ],
            //category 25
            [
                'category_id' => 25,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly очиститель колесных дисков",
                'name_ru' => "Liqui Moly очиститель колесных дисков",
                'name_slug' => URLify::filter("Liqui Moly очиститель колесных дисков"),
                'description' => $lorem
            ],
            [
                'category_id' => 25,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly средство для обработки шин",
                'name_ru' => "Liqui Moly средство для обработки шин",
                'name_slug' => URLify::filter("Liqui Moly средство для обработки шин"),
                'description' => $lorem
            ],
            [
                'category_id' => 25,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Gummi-Pflege (для резины)",
                'name_ru' => "Liqui Moly Gummi-Pflege (для резины)",
                'name_slug' => URLify::filter("Liqui Moly Gummi-Pflege (для резины)"),
                'description' => $lorem
            ],
            [
                'category_id' => 25,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Reifen-Reparatur-Spray (герметик для шин)",
                'name_ru' => "Liqui Moly Reifen-Reparatur-Spray (герметик для шин)",
                'name_slug' => URLify::filter("Liqui Moly Reifen-Reparatur-Spray (герметик для шин)"),
                'description' => $lorem
            ],
            //category 26
            [
                'category_id' => 26,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Auto-Tuch (платок из замши)",
                'name_ru' => "Liqui Moly Auto-Tuch (платок из замши)",
                'name_slug' => URLify::filter("Liqui Moly Auto-Tuch (платок из замши)"),
                'description' => $lorem
            ],
            [
                'category_id' => 26,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Auto-Poliertuch (платок для полировки)",
                'name_ru' => "Liqui Moly Auto-Poliertuch (платок для полировки)",
                'name_slug' => URLify::filter("Liqui Moly Auto-Poliertuch (платок для полировки)"),
                'description' => $lorem
            ],
            [
                'category_id' => 26,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Auto-Natur-Leder (кожаный платок)",
                'name_ru' => "Liqui Moly Auto-Natur-Leder (кожаный платок)",
                'name_slug' => URLify::filter("Liqui Moly Auto-Natur-Leder (кожаный платок)"),
                'description' => $lorem
            ],
            [
                'category_id' => 26,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Microfasertuch (микрофибра)",
                'name_ru' => "Liqui Moly Microfasertuch (микрофибра)",
                'name_slug' => URLify::filter("Liqui Moly Microfasertuch (микрофибра)"),
                'description' => $lorem
            ],
            //category 27
            [
                'category_id' => 27,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kuhler Aussenreiniger",
                'name_ru' => "Liqui Moly Kuhler Aussenreiniger",
                'name_slug' => URLify::filter("Liqui Moly Kuhler Aussenreiniger"),
                'description' => $lorem
            ],
            [
                'category_id' => 27,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly средство для пропитки тентов",
                'name_ru' => "Liqui Moly средство для пропитки тентов",
                'name_slug' => URLify::filter("Liqui Moly средство для пропитки тентов"),
                'description' => $lorem
            ],
            [
                'category_id' => 27,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Marder-Schutz-Spray",
                'name_ru' => "Liqui Moly Marder-Schutz-Spray",
                'name_slug' => URLify::filter("Liqui Moly Marder-Schutz-Spray"),
                'description' => $lorem
            ],
            //category 28
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Sekunden-Kleber (секундный клей)",
                'name_ru' => "Liqui Moly Sekunden-Kleber (секундный клей)",
                'name_slug' => URLify::filter("Liqui Moly Sekunden-Kleber (секундный клей)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Ruckspiegel-Klebe-Set (крепление зеркал)",
                'name_ru' => "Liqui Moly Ruckspiegel-Klebe-Set (крепление зеркал)",
                'name_slug' => URLify::filter("Liqui Moly Ruckspiegel-Klebe-Set (крепление зеркал)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Silikon-Dichtmasse transparent",
                'name_ru' => "Liqui Moly Silikon-Dichtmasse transparent",
                'name_slug' => URLify::filter("Liqui Moly Silikon-Dichtmasse transparent"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Silikon-Dichtmasse black",
                'name_ru' => "Liqui Moly Silikon-Dichtmasse black",
                'name_slug' => URLify::filter("Liqui Moly Silikon-Dichtmasse black"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Schrauben-Sicherung Mittelfest (фиксатор винтов)",
                'name_ru' => "Liqui Moly Schrauben-Sicherung Mittelfest (фиксатор винтов)",
                'name_slug' => URLify::filter("Liqui Moly Schrauben-Sicherung Mittelfest (фиксатор винтов)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Schrauben-Sicherung Mittelfest (фиксатор винтов)",
                'name_ru' => "Liqui Moly Schrauben-Sicherung Mittelfest (фиксатор винтов)",
                'name_slug' => URLify::filter("Liqui Moly Schrauben-Sicherung Mittelfest (фиксатор винтов)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Schrauben-Sicherung Hochfest (фиксатор винтов)",
                'name_ru' => "Liqui Moly Schrauben-Sicherung Hochfest (фиксатор винтов)",
                'name_slug' => URLify::filter("Liqui Moly Schrauben-Sicherung Hochfest (фиксатор винтов)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Schrauben-Sicherung Hochfest (фиксатор винтов)",
                'name_ru' => "Liqui Moly Schrauben-Sicherung Hochfest (фиксатор винтов)",
                'name_slug' => URLify::filter("Liqui Moly Schrauben-Sicherung Hochfest (фиксатор винтов)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Flochendichtung (клей-герметик)",
                'name_ru' => "Liqui Moly Flochendichtung (клей-герметик)",
                'name_slug' => URLify::filter("Liqui Moly Flochendichtung (клей-герметик)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquimate 8100 1K-PUR (клей-герметик белый)",
                'name_ru' => "Liqui Moly Liquimate 8100 1K-PUR (клей-герметик белый)",
                'name_slug' => URLify::filter("Liqui Moly Liquimate 8100 1K-PUR (клей-герметик белый)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquimate 8100 1K-PUR (клей-герметик серый)",
                'name_ru' => "Liqui Moly Liquimate 8100 1K-PUR (клей-герметик серый)",
                'name_slug' => URLify::filter("Liqui Moly Liquimate 8100 1K-PUR (клей-герметик серый)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquimate 8200 (эластичный клей-герметик)",
                'name_ru' => "Liqui Moly Liquimate 8200 (эластичный клей-герметик)",
                'name_slug' => URLify::filter("Liqui Moly Liquimate 8200 (эластичный клей-герметик)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquimate 8300 (клей-герметик серый)",
                'name_ru' => "Liqui Moly Liquimate 8300 (клей-герметик серый)",
                'name_slug' => URLify::filter("Liqui Moly Liquimate 8300 (клей-герметик серый)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Rohr- Dichtung (клей)",
                'name_ru' => "Liqui Moly Rohr- Dichtung (клей)",
                'name_slug' => URLify::filter("Liqui Moly Rohr- Dichtung (клей)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Abdicht Rundschnur (уплотнительная лента)",
                'name_ru' => "Liqui Moly Abdicht Rundschnur (уплотнительная лента)",
                'name_slug' => URLify::filter("Liqui Moly Abdicht Rundschnur (уплотнительная лента)"),
                'description' => $lorem
            ],
            [
                'category_id' => 28,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly уплотнительная лента",
                'name_ru' => "Liqui Moly уплотнительная лента",
                'name_slug' => URLify::filter("Liqui Moly уплотнительная лента"),
                'description' => $lorem
            ],
            //category 29
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - Очиститель топливной системы",
                'name_ru' => "Liqui Moly - Очиститель топливной системы",
                'name_slug' => URLify::filter("Liqui Moly - Очиститель топливной системы"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - Очиститель топливной системы",
                'name_ru' => "Liqui Moly - Очиститель топливной системы",
                'name_slug' => URLify::filter("Liqui Moly - Очиститель топливной системы"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - Очиститель топливной системы (концентрат)",
                'name_ru' => "Liqui Moly - Очиститель топливной системы (концентрат)",
                'name_slug' => URLify::filter("Liqui Moly - Очиститель топливной системы (концентрат)"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - Очиститель топливной системы (дизель)",
                'name_ru' => "Liqui Moly - Очиститель топливной системы (дизель)",
                'name_slug' => URLify::filter("Liqui Moly - Очиститель топливной системы (дизель)"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - Очиститель топливной системы (дизель)",
                'name_ru' => "Liqui Moly - Очиститель топливной системы (дизель)",
                'name_slug' => URLify::filter("Liqui Moly - Очиститель топливной системы (дизель)"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - Очиститель дизельного впуска",
                'name_ru' => "Liqui Moly - Очиститель дизельного впуска",
                'name_slug' => URLify::filter("Liqui Moly - Очиститель дизельного впуска"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - Очиститель дроссельных заслонок",
                'name_ru' => "Liqui Moly - Очиститель дроссельных заслонок",
                'name_slug' => URLify::filter("Liqui Moly - Очиститель дроссельных заслонок"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly JetCleanTronic",
                'name_ru' => "Liqui Moly JetCleanTronic",
                'name_slug' => URLify::filter("Liqui Moly JetCleanTronic"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly JetCleanPlus",
                'name_ru' => "Liqui Moly JetCleanPlus",
                'name_slug' => URLify::filter("Liqui Moly JetCleanPlus"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Universal Adapter Kit",
                'name_ru' => "Liqui Moly Universal Adapter Kit",
                'name_slug' => URLify::filter("Liqui Moly Universal Adapter Kit"),
                'description' => $lorem
            ],
            [
                'category_id' => 29,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Adapter Kit",
                'name_ru' => "Liqui Moly Adapter Kit",
                'name_slug' => URLify::filter("Liqui Moly Adapter Kit"),
                'description' => $lorem
            ],
            //category 30
            [
                'category_id' => 30,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Klima-Anlagen-Reiniger",
                'name_ru' => "Liqui Moly Klima-Anlagen-Reiniger",
                'name_slug' => URLify::filter("Liqui Moly Klima-Anlagen-Reiniger"),
                'description' => $lorem
            ],
            [
                'category_id' => 30,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Klima-Anlagen-Reiniger",
                'name_ru' => "Liqui Moly Klima-Anlagen-Reiniger",
                'name_slug' => URLify::filter("Liqui Moly Klima-Anlagen-Reiniger"),
                'description' => $lorem
            ],
            [
                'category_id' => 30,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Klima-Anlagen-Reiniger",
                'name_ru' => "Liqui Moly Klima-Anlagen-Reiniger",
                'name_slug' => URLify::filter("Liqui Moly Klima-Anlagen-Reiniger"),
                'description' => $lorem
            ],
            [
                'category_id' => 30,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Klima-Anlagen-Reinigungspistole",
                'name_ru' => "Liqui Moly Klima-Anlagen-Reinigungspistole",
                'name_slug' => URLify::filter("Liqui Moly Klima-Anlagen-Reinigungspistole"),
                'description' => $lorem
            ],
            [
                'category_id' => 30,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly PAG 46 - Масло для кондиционеров",
                'name_ru' => "Liqui Moly PAG 46 - Масло для кондиционеров",
                'name_slug' => URLify::filter("Liqui Moly PAG 46 - Масло для кондиционеров"),
                'description' => $lorem
            ],
            [
                'category_id' => 30,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly PAG 100 - Масло для кондиционеров",
                'name_ru' => "Liqui Moly PAG 100 - Масло для кондиционеров",
                'name_slug' => URLify::filter("Liqui Moly PAG 100 - Масло для кондиционеров"),
                'description' => $lorem
            ],
            [
                'category_id' => 30,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly PAG 150 - Масло для кондиционеров",
                'name_ru' => "Liqui Moly PAG 150 - Масло для кондиционеров",
                'name_slug' => URLify::filter("Liqui Moly PAG 150 - Масло для кондиционеров"),
                'description' => $lorem
            ],
            [
                'category_id' => 30,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Klima-Fresh - Освежитель кондиционера",
                'name_ru' => "Liqui Moly Klima-Fresh - Освежитель кондиционера",
                'name_slug' => URLify::filter("Liqui Moly Klima-Fresh - Освежитель кондиционера"),
                'description' => $lorem
            ],
            //category 31
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 47 + MoS2 - Смазка ШРУС",
                'name_ru' => "Liqui Moly LM 47 + MoS2 - Смазка ШРУС",
                'name_slug' => URLify::filter("Liqui Moly LM 47 + MoS2 - Смазка ШРУС"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 47 + MoS2 - Смазка ШРУС",
                'name_ru' => "Liqui Moly LM 47 + MoS2 - Смазка ШРУС",
                'name_slug' => URLify::filter("Liqui Moly LM 47 + MoS2 - Смазка ШРУС"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 47 + MoS2 - Смазка ШРУС",
                'name_ru' => "Liqui Moly LM 47 + MoS2 - Смазка ШРУС",
                'name_slug' => URLify::filter("Liqui Moly LM 47 + MoS2 - Смазка ШРУС"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 47 + MoS2 - Смазка ШРУС",
                'name_ru' => "Liqui Moly LM 47 + MoS2 - Смазка ШРУС",
                'name_slug' => URLify::filter("Liqui Moly LM 47 + MoS2 - Смазка ШРУС"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Mehrzweckfett - Для подшипников и крестовин",
                'name_ru' => "Liqui Moly Mehrzweckfett - Для подшипников и крестовин",
                'name_slug' => URLify::filter("Liqui Moly Mehrzweckfett - Для подшипников и крестовин"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Mehrzweckfett - Для подшипников и крестовин",
                'name_ru' => "Liqui Moly Mehrzweckfett - Для подшипников и крестовин",
                'name_slug' => URLify::filter("Liqui Moly Mehrzweckfett - Для подшипников и крестовин"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Mehrzweckfett - Для подшипников и крестовин",
                'name_ru' => "Liqui Moly Mehrzweckfett - Для подшипников и крестовин",
                'name_slug' => URLify::filter("Liqui Moly Mehrzweckfett - Для подшипников и крестовин"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Mehrzweckfett - Для подшипников и крестовин",
                'name_ru' => "Liqui Moly Mehrzweckfett - Для подшипников и крестовин",
                'name_slug' => URLify::filter("Liqui Moly Mehrzweckfett - Для подшипников и крестовин"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 50 Высокотемпературная смазка",
                'name_ru' => "Liqui Moly LM 50 Высокотемпературная смазка",
                'name_slug' => URLify::filter("Liqui Moly LM 50 Высокотемпературная смазка"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 50 Высокотемпературная смазка",
                'name_ru' => "Liqui Moly LM 50 Высокотемпературная смазка",
                'name_slug' => URLify::filter("Liqui Moly LM 50 Высокотемпературная смазка"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 50 Высокотемпературная смазка",
                'name_ru' => "Liqui Moly LM 50 Высокотемпературная смазка",
                'name_slug' => URLify::filter("Liqui Moly LM 50 Высокотемпературная смазка"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 50 Высокотемпературная смазка",
                'name_ru' => "Liqui Moly LM 50 Высокотемпературная смазка",
                'name_slug' => URLify::filter("Liqui Moly LM 50 Высокотемпературная смазка"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Fliessfett ZS K00K-40 (жидкая смазка)",
                'name_ru' => "Liqui Moly Fliessfett ZS K00K-40 (жидкая смазка)",
                'name_slug' => URLify::filter("Liqui Moly Fliessfett ZS K00K-40 (жидкая смазка)"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Fliessfett ZS K00K-40 (жидкая смазка)",
                'name_ru' => "Liqui Moly Fliessfett ZS K00K-40 (жидкая смазка)",
                'name_slug' => URLify::filter("Liqui Moly Fliessfett ZS K00K-40 (жидкая смазка)"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Universal-Fett (смазка белая универсальная)",
                'name_ru' => "Liqui Moly Universal-Fett (смазка белая универсальная)",
                'name_slug' => URLify::filter("Liqui Moly Universal-Fett (смазка белая универсальная)"),
                'description' => $lorem
            ],
            [
                'category_id' => 31,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Schmierfix (смазка универсальная)",
                'name_ru' => "Liqui Moly Schmierfix (смазка универсальная)",
                'name_slug' => URLify::filter("Liqui Moly Schmierfix (смазка универсальная)"),
                'description' => $lorem
            ],
            //category 32
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquifast 1402 - набор для вклейки стекол",
                'name_ru' => "Liqui Moly Liquifast 1402 - набор для вклейки стекол",
                'name_slug' => URLify::filter("Liqui Moly Liquifast 1402 - набор для вклейки стекол"),
                'description' => $lorem
            ],
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquifast 1502 - набор для вклейки стекол",
                'name_ru' => "Liqui Moly Liquifast 1502 - набор для вклейки стекол",
                'name_slug' => URLify::filter("Liqui Moly Liquifast 1502 - набор для вклейки стекол"),
                'description' => $lorem
            ],
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquifast 1402 - клей для вклейки стекол",
                'name_ru' => "Liqui Moly Liquifast 1402 - клей для вклейки стекол",
                'name_slug' => URLify::filter("Liqui Moly Liquifast 1402 - клей для вклейки стекол"),
                'description' => $lorem
            ],
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquifast 1502 - клей для вклейки стекол",
                'name_ru' => "Liqui Moly Liquifast 1502 - клей для вклейки стекол",
                'name_slug' => URLify::filter("Liqui Moly Liquifast 1502 - клей для вклейки стекол"),
                'description' => $lorem
            ],
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Liquimate 8100 - клей-герметик черный",
                'name_ru' => "Liqui Moly Liquimate 8100 - клей-герметик черный",
                'name_slug' => URLify::filter("Liqui Moly Liquimate 8100 - клей-герметик черный"),
                'description' => $lorem
            ],
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - очиститель-разбавитель",
                'name_ru' => "Liqui Moly - очиститель-разбавитель",
                'name_slug' => URLify::filter("Liqui Moly - очиститель-разбавитель"),
                'description' => $lorem
            ],
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Schneidedraht Vierkant - струна",
                'name_ru' => "Liqui Moly Schneidedraht Vierkant - струна",
                'name_slug' => URLify::filter("Liqui Moly Schneidedraht Vierkant - струна"),
                'description' => $lorem
            ],
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Werkzeugkoffer Befollt - набор инструментов",
                'name_ru' => "Liqui Moly Werkzeugkoffer Befollt - набор инструментов",
                'name_slug' => URLify::filter("Liqui Moly Werkzeugkoffer Befollt - набор инструментов"),
                'description' => $lorem
            ],
            [
                'category_id' => 32,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Gegenhalter mit Griff - держатель для струны",
                'name_ru' => "Liqui Moly Gegenhalter mit Griff - держатель для струны",
                'name_slug' => URLify::filter("Liqui Moly Gegenhalter mit Griff - держатель для струны"),
                'description' => $lorem
            ],
            //category 33
            [
                'category_id' => 33,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly DPF Reiniger - очиститель DPF фильтра",
                'name_ru' => "Liqui Moly DPF Reiniger - очиститель DPF фильтра",
                'name_slug' => URLify::filter("Liqui Moly DPF Reiniger - очиститель DPF фильтра"),
                'description' => $lorem
            ],
            [
                'category_id' => 33,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly DPF Spulung - промывка",
                'name_ru' => "Liqui Moly DPF Spulung - промывка",
                'name_slug' => URLify::filter("Liqui Moly DPF Spulung - промывка"),
                'description' => $lorem
            ],
            [
                'category_id' => 33,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly DPF Cleaner - очиститель DPF фильтра",
                'name_ru' => "Liqui Moly DPF Cleaner - очиститель DPF фильтра",
                'name_slug' => URLify::filter("Liqui Moly DPF Cleaner - очиститель DPF фильтра"),
                'description' => $lorem
            ],
            [
                'category_id' => 33,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly DPF-Druckbecher-Pistole - распылитель",
                'name_ru' => "Liqui Moly DPF-Druckbecher-Pistole - распылитель",
                'name_slug' => URLify::filter("Liqui Moly DPF-Druckbecher-Pistole - распылитель"),
                'description' => $lorem
            ],
            [
                'category_id' => 33,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Spuhsonde - изогнутый зонд",
                'name_ru' => "Liqui Moly Spuhsonde - изогнутый зонд",
                'name_slug' => URLify::filter("Liqui Moly Spuhsonde - изогнутый зонд"),
                'description' => $lorem
            ],
            [
                'category_id' => 33,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Spuhsonde - прямой зонд",
                'name_ru' => "Liqui Moly Spuhsonde - прямой зонд",
                'name_slug' => URLify::filter("Liqui Moly Spuhsonde - прямой зонд"),
                'description' => $lorem
            ],
            [
                'category_id' => 33,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly DPF Lanze - зонд с распылителями",
                'name_ru' => "Liqui Moly DPF Lanze - зонд с распылителями",
                'name_slug' => URLify::filter("Liqui Moly DPF Lanze - зонд с распылителями"),
                'description' => $lorem
            ],
            //category 34
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Unterbodenschutz - антикор для днища",
                'name_ru' => "Liqui Moly Unterbodenschutz - антикор для днища",
                'name_slug' => URLify::filter("Liqui Moly Unterbodenschutz - антикор для днища"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Unterbodenschutz - антикор для днища",
                'name_ru' => "Liqui Moly Unterbodenschutz - антикор для днища",
                'name_slug' => URLify::filter("Liqui Moly Unterbodenschutz - антикор для днища"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Unterbodenschutz - антикор для днища",
                'name_ru' => "Liqui Moly Unterbodenschutz - антикор для днища",
                'name_slug' => URLify::filter("Liqui Moly Unterbodenschutz - антикор для днища"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Unterbodenschutz - антикор для кузова",
                'name_ru' => "Liqui Moly Unterbodenschutz - антикор для кузова",
                'name_slug' => URLify::filter("Liqui Moly Unterbodenschutz - антикор для кузова"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Wachs-Korrosionsschutz - антикор",
                'name_ru' => "Liqui Moly Wachs-Korrosionsschutz - антикор",
                'name_slug' => URLify::filter("Liqui Moly Wachs-Korrosionsschutz - антикор"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Wachs-Korrosionsschutz - антикор",
                'name_ru' => "Liqui Moly Wachs-Korrosionsschutz - антикор",
                'name_slug' => URLify::filter("Liqui Moly Wachs-Korrosionsschutz - антикор"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Wachs-Korrosionsschutz - антикор",
                'name_ru' => "Liqui Moly Wachs-Korrosionsschutz - антикор",
                'name_slug' => URLify::filter("Liqui Moly Wachs-Korrosionsschutz - антикор"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hohlraum-versiegelung - антикор",
                'name_ru' => "Liqui Moly Hohlraum-versiegelung - антикор",
                'name_slug' => URLify::filter("Liqui Moly Hohlraum-versiegelung - антикор"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Hohlraum-versiegelung - антикор",
                'name_ru' => "Liqui Moly Hohlraum-versiegelung - антикор",
                'name_slug' => URLify::filter("Liqui Moly Hohlraum-versiegelung - антикор"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Steinschlag-Schutz - антигравий серый",
                'name_ru' => "Liqui Moly Steinschlag-Schutz - антигравий серый",
                'name_slug' => URLify::filter("Liqui Moly Steinschlag-Schutz - антигравий серый"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Steinschlag-Schutz - антигравий серый",
                'name_ru' => "Liqui Moly Steinschlag-Schutz - антигравий серый",
                'name_slug' => URLify::filter("Liqui Moly Steinschlag-Schutz - антигравий серый"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Steinschlag-Schutz - антигравий черный",
                'name_ru' => "Liqui Moly Steinschlag-Schutz - антигравий черный",
                'name_slug' => URLify::filter("Liqui Moly Steinschlag-Schutz - антигравий черный"),
                'description' => $lorem
            ],
            [
                'category_id' => 34,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Steinschlag-Schutz - антигравий черный",
                'name_ru' => "Liqui Moly Steinschlag-Schutz - антигравий черный",
                'name_slug' => URLify::filter("Liqui Moly Steinschlag-Schutz - антигравий черный"),
                'description' => $lorem
            ],
            //category 35
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 40 - универсальный спрей",
                'name_ru' => "Liqui Moly LM 40 - универсальный спрей",
                'name_slug' => URLify::filter("Liqui Moly LM 40 - универсальный спрей"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 40 - универсальный спрей",
                'name_ru' => "Liqui Moly LM 40 - универсальный спрей",
                'name_slug' => URLify::filter("Liqui Moly LM 40 - универсальный спрей"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Silicon-Spray - силиконовая смазка",
                'name_ru' => "Liqui Moly Silicon-Spray - силиконовая смазка",
                'name_slug' => URLify::filter("Liqui Moly Silicon-Spray - силиконовая смазка"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Wartungs-Spray Weiss - белая смазка",
                'name_ru' => "Liqui Moly Wartungs-Spray Weiss - белая смазка",
                'name_slug' => URLify::filter("Liqui Moly Wartungs-Spray Weiss - белая смазка"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Haftschmier-Spray - смазка для петель",
                'name_ru' => "Liqui Moly Haftschmier-Spray - смазка для петель",
                'name_slug' => URLify::filter("Liqui Moly Haftschmier-Spray - смазка для петель"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Schnell-Reiniger - универсальный очиститель",
                'name_ru' => "Liqui Moly Schnell-Reiniger - универсальный очиститель",
                'name_slug' => URLify::filter("Liqui Moly Schnell-Reiniger - универсальный очиститель"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Silicon-Fett - силиконовая смазка",
                'name_ru' => "Liqui Moly Silicon-Fett - силиконовая смазка",
                'name_slug' => URLify::filter("Liqui Moly Silicon-Fett - силиконовая смазка"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Electronic-Spray - спрей для электрики",
                'name_ru' => "Liqui Moly Electronic-Spray - спрей для электрики",
                'name_slug' => URLify::filter("Liqui Moly Electronic-Spray - спрей для электрики"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Luftmassen-sensor - очиститель ДМРВ",
                'name_ru' => "Liqui Moly Luftmassen-sensor - очиститель ДМРВ",
                'name_slug' => URLify::filter("Liqui Moly Luftmassen-sensor - очиститель ДМРВ"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - очиститель карбюратора",
                'name_ru' => "Liqui Moly - очиститель карбюратора",
                'name_slug' => URLify::filter("Liqui Moly - очиститель карбюратора"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - очиститель дроссельных заслонок",
                'name_ru' => "Liqui Moly - очиститель дроссельных заслонок",
                'name_slug' => URLify::filter("Liqui Moly - очиститель дроссельных заслонок"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly - Очистка дизельного впуска",
                'name_ru' => "Liqui Moly - Очистка дизельного впуска",
                'name_slug' => URLify::filter("Liqui Moly - Очистка дизельного впуска"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motorraum-Reiniger - очиститель двигателя",
                'name_ru' => "Liqui Moly Motorraum-Reiniger - очиститель двигателя",
                'name_slug' => URLify::filter("Liqui Moly Motorraum-Reiniger - очиститель двигателя"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Rostloser - быстрый растворитель ржавчины",
                'name_ru' => "Liqui Moly Rostloser - быстрый растворитель ржавчины",
                'name_slug' => URLify::filter("Liqui Moly Rostloser - быстрый растворитель ржавчины"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Rostloser - растворитель ржавчины",
                'name_ru' => "Liqui Moly MoS2 Rostloser - растворитель ржавчины",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Rostloser - растворитель ржавчины"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly MoS2 Rostloser - растворитель ржавчины",
                'name_ru' => "Liqui Moly MoS2 Rostloser - растворитель ржавчины",
                'name_slug' => URLify::filter("Liqui Moly MoS2 Rostloser - растворитель ржавчины"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Keramik Rostloser - растворитель ржавчины",
                'name_ru' => "Liqui Moly Keramik Rostloser - растворитель ржавчины",
                'name_slug' => URLify::filter("Liqui Moly Keramik Rostloser - растворитель ржавчины"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kupfer-Spray - медный спрей",
                'name_ru' => "Liqui Moly Kupfer-Spray - медный спрей",
                'name_slug' => URLify::filter("Liqui Moly Kupfer-Spray - медный спрей"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kupfer-Paste - медная паста",
                'name_ru' => "Liqui Moly Kupfer-Paste - медная паста",
                'name_slug' => URLify::filter("Liqui Moly Kupfer-Paste - медная паста"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly PTFE-Spray - тефлоновый спрей",
                'name_ru' => "Liqui Moly PTFE-Spray - тефлоновый спрей",
                'name_slug' => URLify::filter("Liqui Moly PTFE-Spray - тефлоновый спрей"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Keilriemen-Spray - для ремней",
                'name_ru' => "Liqui Moly Keilriemen-Spray - для ремней",
                'name_slug' => URLify::filter("Liqui Moly Keilriemen-Spray - для ремней"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Anti-Quietsch-Paste - для тормозной системы",
                'name_ru' => "Liqui Moly Anti-Quietsch-Paste - для тормозной системы",
                'name_slug' => URLify::filter("Liqui Moly Anti-Quietsch-Paste - для тормозной системы"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов",
                'name_ru' => "Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов",
                'name_slug' => URLify::filter("Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов",
                'name_ru' => "Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов",
                'name_slug' => URLify::filter("Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов",
                'name_ru' => "Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов",
                'name_slug' => URLify::filter("Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов",
                'name_ru' => "Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов",
                'name_slug' => URLify::filter("Liqui Moly Bremsen-Anti-Quietsch-Paste - для тормозов"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kalte-Spray - спрей-охладитель",
                'name_ru' => "Liqui Moly Kalte-Spray - спрей-охладитель",
                'name_slug' => URLify::filter("Liqui Moly Kalte-Spray - спрей-охладитель"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Dichtungs-Entferner - удаление прокладок",
                'name_ru' => "Liqui Moly Dichtungs-Entferner - удаление прокладок",
                'name_slug' => URLify::filter("Liqui Moly Dichtungs-Entferner - удаление прокладок"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 48 - паста монтажная",
                'name_ru' => "Liqui Moly LM 48 - паста монтажная",
                'name_slug' => URLify::filter("Liqui Moly LM 48 - паста монтажная"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 48 - паста монтажная",
                'name_ru' => "Liqui Moly LM 48 - паста монтажная",
                'name_slug' => URLify::filter("Liqui Moly LM 48 - паста монтажная"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motor Innenkonservierer - консервант двигателя",
                'name_ru' => "Liqui Moly Motor Innenkonservierer - консервант двигателя",
                'name_slug' => URLify::filter("Liqui Moly Motor Innenkonservierer - консервант двигателя"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motorraum - наружный консервант двигателя",
                'name_ru' => "Liqui Moly Motorraum - наружный консервант двигателя",
                'name_slug' => URLify::filter("Liqui Moly Motorraum - наружный консервант двигателя"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Wax Coating - средство для консервации",
                'name_ru' => "Liqui Moly Wax Coating - средство для консервации",
                'name_slug' => URLify::filter("Liqui Moly Wax Coating - средство для консервации"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов",
                'name_ru' => "Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов",
                'name_slug' => URLify::filter("Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов",
                'name_ru' => "Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов",
                'name_slug' => URLify::filter("Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов",
                'name_ru' => "Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов",
                'name_slug' => URLify::filter("Liqui Moly Batterie-Pol-Fett - смазка для электроконтактов"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Turschloss-Pflege - смазка для замков",
                'name_ru' => "Liqui Moly Turschloss-Pflege - смазка для замков",
                'name_slug' => URLify::filter("Liqui Moly Turschloss-Pflege - смазка для замков"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Start Fix - средство для запуска двигателя",
                'name_ru' => "Liqui Moly Start Fix - средство для запуска двигателя",
                'name_slug' => URLify::filter("Liqui Moly Start Fix - средство для запуска двигателя"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Reifen-Montierpaste - для монтажа шин",
                'name_ru' => "Liqui Moly Reifen-Montierpaste - для монтажа шин",
                'name_slug' => URLify::filter("Liqui Moly Reifen-Montierpaste - для монтажа шин"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Schweiss-Schutz-Spray - для сварочных работ",
                'name_ru' => "Liqui Moly Schweiss-Schutz-Spray - для сварочных работ",
                'name_slug' => URLify::filter("Liqui Moly Schweiss-Schutz-Spray - для сварочных работ"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kettenspray - спрей для цепей",
                'name_ru' => "Liqui Moly Kettenspray - спрей для цепей",
                'name_slug' => URLify::filter("Liqui Moly Kettenspray - спрей для цепей"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Auspuff-Reparatur-Paste - герметик выхлопной системы",
                'name_ru' => "Liqui Moly Auspuff-Reparatur-Paste - герметик выхлопной системы",
                'name_slug' => URLify::filter("Liqui Moly Auspuff-Reparatur-Paste - герметик выхлопной системы"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Auspuff-Bandage - бандаж для системы выхлопа",
                'name_ru' => "Liqui Moly Auspuff-Bandage - бандаж для системы выхлопа",
                'name_slug' => URLify::filter("Liqui Moly Auspuff-Bandage - бандаж для системы выхлопа"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Auspuff-Montage-Paste - паста для систем выхлопа",
                'name_ru' => "Liqui Moly Auspuff-Montage-Paste - паста для систем выхлопа",
                'name_slug' => URLify::filter("Liqui Moly Auspuff-Montage-Paste - паста для систем выхлопа"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Lecksucher - обнаружитель течи",
                'name_ru' => "Liqui Moly Lecksucher - обнаружитель течи",
                'name_slug' => URLify::filter("Liqui Moly Lecksucher - обнаружитель течи"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motor-Lecksucher - поиск подсоса в двигателе",
                'name_ru' => "Liqui Moly Motor-Lecksucher - поиск подсоса в двигателе",
                'name_slug' => URLify::filter("Liqui Moly Motor-Lecksucher - поиск подсоса в двигателе"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Lecksucher - для поиска мест утечек воздуха",
                'name_ru' => "Liqui Moly Lecksucher - для поиска мест утечек воздуха",
                'name_slug' => URLify::filter("Liqui Moly Lecksucher - для поиска мест утечек воздуха"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Zink Spray - цинковая грунтовка",
                'name_ru' => "Liqui Moly Zink Spray - цинковая грунтовка",
                'name_slug' => URLify::filter("Liqui Moly Zink Spray - цинковая грунтовка"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Handwasch-Paste - паста для чистки рук",
                'name_ru' => "Liqui Moly Handwasch-Paste - паста для чистки рук",
                'name_slug' => URLify::filter("Liqui Moly Handwasch-Paste - паста для чистки рук"),
                'description' => $lorem
            ],
            [
                'category_id' => 35,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Handwasch-Paste - паста для чистки рук",
                'name_ru' => "Liqui Moly Handwasch-Paste - паста для чистки рук",
                'name_slug' => URLify::filter("Liqui Moly Handwasch-Paste - паста для чистки рук"),
                'description' => $lorem
            ],
            //category 36
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 5W-40, 1л",
                'name_ru' => "Liqui Moly Racing Synth 4T 5W-40, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 5W-40, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 5W-40, 60л",
                'name_ru' => "Liqui Moly Racing Synth 4T 5W-40, 60л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 5W-40, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-50, 1л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-50, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-50, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-50, 4л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-50, 4л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-50, 4л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-50, 20л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-50, 20л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-50, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-50, 60л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-50, 60л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-50, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-50, 205л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-50, 205л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-50, 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-60, 1л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-60, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-60, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-60, 5л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-60, 5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-60, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-30, 1л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 10W-30, 60л",
                'name_ru' => "Liqui Moly Racing Synth 4T 10W-30, 60л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 10W-30, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 15W-50, 1л",
                'name_ru' => "Liqui Moly Racing Synth 4T 15W-50, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 15W-50, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 4T 15W-50, 60л",
                'name_ru' => "Liqui Moly Racing Synth 4T 15W-50, 60л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 4T 15W-50, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motorrad 4T 10W-40, 1л",
                'name_ru' => "Liqui Moly Motorrad 4T 10W-40, 1л",
                'name_slug' => URLify::filter("Liqui Moly Motorrad 4T 10W-40, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motorrad 4T 10W-40, 4л",
                'name_ru' => "Liqui Moly Motorrad 4T 10W-40, 4л",
                'name_slug' => URLify::filter("Liqui Moly Motorrad 4T 10W-40, 4л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motorrad 4T 10W-40, 60л",
                'name_ru' => "Liqui Moly Motorrad 4T 10W-40, 60л",
                'name_slug' => URLify::filter("Liqui Moly Motorrad 4T 10W-40, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motorrad 4T 10W-40, 205л",
                'name_ru' => "Liqui Moly Motorrad 4T 10W-40, 205л",
                'name_slug' => URLify::filter("Liqui Moly Motorrad 4T 10W-40, 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing 4T 20W-50 HD, 1л",
                'name_ru' => "Liqui Moly Racing 4T 20W-50 HD, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing 4T 20W-50 HD, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing 4T 20W-50 HD, 5л",
                'name_ru' => "Liqui Moly Racing 4T 20W-50 HD, 5л",
                'name_slug' => URLify::filter("Liqui Moly Racing 4T 20W-50 HD, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing HD Classic SAE 50, 1л",
                'name_ru' => "Liqui Moly Racing HD Classic SAE 50, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing HD Classic SAE 50, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing HD Classic SAE 50, 5л",
                'name_ru' => "Liqui Moly Racing HD Classic SAE 50, 5л",
                'name_slug' => URLify::filter("Liqui Moly Racing HD Classic SAE 50, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Scooter 4T 10W-40 HD, 1л",
                'name_ru' => "Liqui Moly Racing Scooter 4T 10W-40 HD, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Scooter 4T 10W-40 HD, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 2T, 1л",
                'name_ru' => "Liqui Moly Racing Synth 2T, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 2T, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Synth 2T, 20л",
                'name_ru' => "Liqui Moly Racing Synth 2T, 20л",
                'name_slug' => URLify::filter("Liqui Moly Racing Synth 2T, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Scooter Synth 2T, 1л",
                'name_ru' => "Liqui Moly Racing Scooter Synth 2T, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Scooter Synth 2T, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Scooter Synth 2T, 20л",
                'name_ru' => "Liqui Moly Racing Scooter Synth 2T, 20л",
                'name_slug' => URLify::filter("Liqui Moly Racing Scooter Synth 2T, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing 2T, 1л",
                'name_ru' => "Liqui Moly Racing 2T, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing 2T, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing 2T, 20л",
                'name_ru' => "Liqui Moly Racing 2T, 20л",
                'name_slug' => URLify::filter("Liqui Moly Racing 2T, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing 2T, 60л",
                'name_ru' => "Liqui Moly Racing 2T, 60л",
                'name_slug' => URLify::filter("Liqui Moly Racing 2T, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Scooter 2T Semisynth, 0,5л",
                'name_ru' => "Liqui Moly Racing Scooter 2T Semisynth, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Scooter 2T Semisynth, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Scooter 2T Semisynth, 1л",
                'name_ru' => "Liqui Moly Racing Scooter 2T Semisynth, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Scooter 2T Semisynth, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Scooter 2T Basic, 1л",
                'name_ru' => "Liqui Moly Racing Scooter 2T Basic, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Scooter 2T Basic, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Scooter 2T Basic, 60л",
                'name_ru' => "Liqui Moly Racing Scooter 2T Basic, 60л",
                'name_slug' => URLify::filter("Liqui Moly Racing Scooter 2T Basic, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly 2-Takt-Motoroil, 0,25л",
                'name_ru' => "Liqui Moly 2-Takt-Motoroil, 0,25л",
                'name_slug' => URLify::filter("Liqui Moly 2-Takt-Motoroil, 0,25л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly 2-Takt-Motoroil, 1л",
                'name_ru' => "Liqui Moly 2-Takt-Motoroil, 1л",
                'name_slug' => URLify::filter("Liqui Moly 2-Takt-Motoroil, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Gear Oil 75W-90, 0,5л",
                'name_ru' => "Liqui Moly Racing Gear Oil 75W-90, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Gear Oil 75W-90, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Gear Oil 80W, 0,5л",
                'name_ru' => "Liqui Moly Racing Gear Oil 80W, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Gear Oil 80W, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Fork Oil 5W Light, 0,5л",
                'name_ru' => "Liqui Moly Racing Fork Oil 5W Light, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Fork Oil 5W Light, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Fork Oil 10W Medium, 0,5л",
                'name_ru' => "Liqui Moly Racing Fork Oil 10W Medium, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Fork Oil 10W Medium, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Fork Oil 15W Heavy, 0,5л",
                'name_ru' => "Liqui Moly Racing Fork Oil 15W Heavy, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Fork Oil 15W Heavy, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Luft-Filter Oil - пропитка фильтров, 0,5л",
                'name_ru' => "Liqui Moly Racing Luft-Filter Oil - пропитка фильтров, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Luft-Filter Oil - пропитка фильтров, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Luft-Filter - пропитка фильтров (аэрозоль), 0,4л",
                'name_ru' => "Liqui Moly Racing Luft-Filter - пропитка фильтров (аэрозоль), 0,4л",
                'name_slug' => URLify::filter("Liqui Moly Racing Luft-Filter - пропитка фильтров (аэрозоль), 0,4л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing 4T-Bike Additiv - очистка топливной системы, 0,125л",
                'name_ru' => "Liqui Moly Racing 4T-Bike Additiv - очистка топливной системы, 0,125л",
                'name_slug' => URLify::filter("Liqui Moly Racing 4T-Bike Additiv - очистка топливной системы, 0,125л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing 2T-Bike Additiv - очистка топливной системы, 0,25л",
                'name_ru' => "Liqui Moly Racing 2T-Bike Additiv - очистка топливной системы, 0,25л",
                'name_slug' => URLify::filter("Liqui Moly Racing 2T-Bike Additiv - очистка топливной системы, 0,25л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Bike-Оil Additiv - присадка, 0,125л",
                'name_ru' => "Liqui Moly Racing Bike-Оil Additiv - присадка, 0,125л",
                'name_slug' => URLify::filter("Liqui Moly Racing Bike-Оil Additiv - присадка, 0,125л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Engine Flush - промывка двигателя, 0,25л",
                'name_ru' => "Liqui Moly Racing Engine Flush - промывка двигателя, 0,25л",
                'name_slug' => URLify::filter("Liqui Moly Racing Engine Flush - промывка двигателя, 0,25л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Chain Lube - смазка для цепи, 0,25л",
                'name_ru' => "Liqui Moly Racing Chain Lube - смазка для цепи, 0,25л",
                'name_slug' => URLify::filter("Liqui Moly Racing Chain Lube - смазка для цепи, 0,25л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motorrad Kettenspray Enduro - спрей для цепи, 0,4л",
                'name_ru' => "Liqui Moly Motorrad Kettenspray Enduro - спрей для цепи, 0,4л",
                'name_slug' => URLify::filter("Liqui Moly Motorrad Kettenspray Enduro - спрей для цепи, 0,4л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Motorrad Ketten spray Grand Prix - смазка для цепи (зеленая), 0,2л",
                'name_ru' => "Liqui Moly Motorrad Ketten spray Grand Prix - смазка для цепи (зеленая), 0,2л",
                'name_slug' => URLify::filter("Liqui Moly Motorrad Ketten spray Grand Prix - смазка для цепи (зеленая), 0,2л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Kettenspray-Weiss - смазка для цепи (белая), 50мл",
                'name_ru' => "Liqui Moly Racing Kettenspray-Weiss - смазка для цепи (белая), 50мл",
                'name_slug' => URLify::filter("Liqui Moly Racing Kettenspray-Weiss - смазка для цепи (белая), 50мл"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Reifen-Reparatur-Spray - герметик для шин, 0,3л",
                'name_ru' => "Liqui Moly Racing Reifen-Reparatur-Spray - герметик для шин, 0,3л",
                'name_slug' => URLify::filter("Liqui Moly Racing Reifen-Reparatur-Spray - герметик для шин, 0,3л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Kettenreiniger - очиститель цепи, 0,5л",
                'name_ru' => "Liqui Moly Racing Kettenreiniger - очиститель цепи, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Racing Kettenreiniger - очиститель цепи, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Bike Cleaner, 1л",
                'name_ru' => "Liqui Moly Racing Bike Cleaner, 1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Bike Cleaner, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 36,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Racing Visier-Reiniger - очиститель забрал, 0,1л",
                'name_ru' => "Liqui Moly Racing Visier-Reiniger - очиститель забрал, 0,1л",
                'name_slug' => URLify::filter("Liqui Moly Racing Visier-Reiniger - очиститель забрал, 0,1л"),
                'description' => $lorem
            ],
            //category 37
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Marine Motoroil 4T 10W-40, 1л",
                'name_ru' => "Liqui Moly Marine Motoroil 4T 10W-40, 1л",
                'name_slug' => URLify::filter("Liqui Moly Marine Motoroil 4T 10W-40, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Marine Motoroil 4T 10W-40, 5л",
                'name_ru' => "Liqui Moly Marine Motoroil 4T 10W-40, 5л",
                'name_slug' => URLify::filter("Liqui Moly Marine Motoroil 4T 10W-40, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Marine Motoroil 4T 15W-40, 5л",
                'name_ru' => "Liqui Moly Marine Motoroil 4T 15W-40, 5л",
                'name_slug' => URLify::filter("Liqui Moly Marine Motoroil 4T 15W-40, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Marine Motoroil 4T 15W-40, 60л",
                'name_ru' => "Liqui Moly Marine Motoroil 4T 15W-40, 60л",
                'name_slug' => URLify::filter("Liqui Moly Marine Motoroil 4T 15W-40, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Outboard Getriebeoil 80W-90, 0,25л",
                'name_ru' => "Liqui Moly Outboard Getriebeoil 80W-90, 0,25л",
                'name_slug' => URLify::filter("Liqui Moly Outboard Getriebeoil 80W-90, 0,25л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Outboard Getriebeoil 80W-90, 20л",
                'name_ru' => "Liqui Moly Outboard Getriebeoil 80W-90, 20л",
                'name_slug' => URLify::filter("Liqui Moly Outboard Getriebeoil 80W-90, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Formula Racing Outboard Motoroil,1л",
                'name_ru' => "Liqui Moly Formula Racing Outboard Motoroil,1л",
                'name_slug' => URLify::filter("Liqui Moly Formula Racing Outboard Motoroil,1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Outboard Motoroil,1л",
                'name_ru' => "Liqui Moly Outboard Motoroil,1л",
                'name_slug' => URLify::filter("Liqui Moly Outboard Motoroil,1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Outboard Motoroil, 5л",
                'name_ru' => "Liqui Moly Outboard Motoroil, 5л",
                'name_slug' => URLify::filter("Liqui Moly Outboard Motoroil, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Outboard Motoroil, 20л",
                'name_ru' => "Liqui Moly Outboard Motoroil, 20л",
                'name_slug' => URLify::filter("Liqui Moly Outboard Motoroil, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Bootsfett - консистентная смазка, 0,25л",
                'name_ru' => "Liqui Moly Bootsfett - консистентная смазка, 0,25л",
                'name_slug' => URLify::filter("Liqui Moly Bootsfett - консистентная смазка, 0,25л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Bootsfett - консистентная смазка, 0,4л",
                'name_ru' => "Liqui Moly Bootsfett - консистентная смазка, 0,4л",
                'name_slug' => URLify::filter("Liqui Moly Bootsfett - консистентная смазка, 0,4л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Boots-Diesel-Additiv - присадка в топливо, 1л",
                'name_ru' => "Liqui Moly Boots-Diesel-Additiv - присадка в топливо, 1л",
                'name_slug' => URLify::filter("Liqui Moly Boots-Diesel-Additiv - присадка в топливо, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Multi-Spray Boot - мульти спрей, 0,5л",
                'name_ru' => "Liqui Moly Multi-Spray Boot - мульти спрей, 0,5л",
                'name_slug' => URLify::filter("Liqui Moly Multi-Spray Boot - мульти спрей, 0,5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 37,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Boots-Universal- Reiniger - очиститель, 1л",
                'name_ru' => "Liqui Moly Boots-Universal- Reiniger - очиститель, 1л",
                'name_slug' => URLify::filter("Liqui Moly Boots-Universal- Reiniger - очиститель, 1л"),
                'description' => $lorem
            ],
            //category 38
            [
                'category_id' => 38,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Rasenmuher-Oil HD 30, 1л",
                'name_ru' => "Liqui Moly Rasenmuher-Oil HD 30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Rasenmuher-Oil HD 30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 38,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Universal 4-Takt Gartengerate-Oil 10W-30, 1л",
                'name_ru' => "Liqui Moly Universal 4-Takt Gartengerate-Oil 10W-30, 1л",
                'name_slug' => URLify::filter("Liqui Moly Universal 4-Takt Gartengerate-Oil 10W-30, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 38,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly 2-Takt-Motoroil, 0,25л",
                'name_ru' => "Liqui Moly 2-Takt-Motoroil, 0,25л",
                'name_slug' => URLify::filter("Liqui Moly 2-Takt-Motoroil, 0,25л"),
                'description' => $lorem
            ],
            [
                'category_id' => 38,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly 2-Takt-Motoroil, 1л",
                'name_ru' => "Liqui Moly 2-Takt-Motoroil, 1л",
                'name_slug' => URLify::filter("Liqui Moly 2-Takt-Motoroil, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 38,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly 2-Takt-Motorsagen-Oil - для бензопил, 1л",
                'name_ru' => "Liqui Moly 2-Takt-Motorsagen-Oil - для бензопил, 1л",
                'name_slug' => URLify::filter("Liqui Moly 2-Takt-Motorsagen-Oil - для бензопил, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 38,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Suge-Ketten Oil 100 - для цепей бензопил, 1л",
                'name_ru' => "Liqui Moly Suge-Ketten Oil 100 - для цепей бензопил, 1л",
                'name_slug' => URLify::filter("Liqui Moly Suge-Ketten Oil 100 - для цепей бензопил, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 38,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Suge-Ketten Oil - для цепей бензопил, 1л",
                'name_ru' => "Liqui Moly Suge-Ketten Oil - для цепей бензопил, 1л",
                'name_slug' => URLify::filter("Liqui Moly Suge-Ketten Oil - для цепей бензопил, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 38,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Pflege-Spray fur Garten-Gerate - садовый спрей, 0,3л",
                'name_ru' => "Liqui Moly Pflege-Spray fur Garten-Gerate - садовый спрей, 0,3л",
                'name_slug' => URLify::filter("Liqui Moly Pflege-Spray fur Garten-Gerate - садовый спрей, 0,3л"),
                'description' => $lorem
            ],
            //category 39
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly Kompressorenol VDL 100, 1л",
                'name_ru' => "Liqui Moly Kompressorenol VDL 100, 1л",
                'name_slug' => URLify::filter("Liqui Moly Kompressorenol VDL 100, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 750 Kompressoren Oil SAE 40, 5л",
                'name_ru' => "Liqui Moly LM 750 Kompressoren Oil SAE 40, 5л",
                'name_slug' => URLify::filter("Liqui Moly LM 750 Kompressoren Oil SAE 40, 5л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 750 Kompressoren Oil SAE 40, 10л",
                'name_ru' => "Liqui Moly LM 750 Kompressoren Oil SAE 40, 10л",
                'name_slug' => URLify::filter("Liqui Moly LM 750 Kompressoren Oil SAE 40, 10л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly LM 901 Kompressorenoil 5W-20, 10л",
                'name_ru' => "Liqui Moly LM 901 Kompressorenoil 5W-20, 10л",
                'name_slug' => URLify::filter("Liqui Moly LM 901 Kompressorenoil 5W-20, 10л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 32, 20л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 32, 20л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 32, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 32, 60л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 32, 60л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 32, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 32, 205л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 32, 205л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 32, 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 46, 1л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 46, 1л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 46, 1л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 46, 20л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 46, 20л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 46, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 46, 60л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 46, 60л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 46, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 46, 205л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 46, 205л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 46, 205л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 68, 20л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 68, 20л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 68, 20л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 68, 60л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 68, 60л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 68, 60л"),
                'description' => $lorem
            ],
            [
                'category_id' => 39,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly HydraulikOil HLP 68, 205л",
                'name_ru' => "Liqui Moly HydraulikOil HLP 68, 205л",
                'name_slug' => URLify::filter("Liqui Moly HydraulikOil HLP 68, 205л"),
                'description' => $lorem
            ],
            //category 40
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly антифриз-концентрат G11",
                'name_ru' => "Liqui Moly антифриз-концентрат G11",
                'name_slug' => URLify::filter("Liqui Moly антифриз-концентрат G11"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly антифриз-концентрат G11",
                'name_ru' => "Liqui Moly антифриз-концентрат G11",
                'name_slug' => URLify::filter("Liqui Moly антифриз-концентрат G11"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly антифриз-концентрат G12 Plus",
                'name_ru' => "Liqui Moly антифриз-концентрат G12 Plus",
                'name_slug' => URLify::filter("Liqui Moly антифриз-концентрат G12 Plus"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly антифриз-концентрат G12 Plus",
                'name_ru' => "Liqui Moly антифриз-концентрат G12 Plus",
                'name_slug' => URLify::filter("Liqui Moly антифриз-концентрат G12 Plus"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly тормозная жидкость DOT 4",
                'name_ru' => "Liqui Moly тормозная жидкость DOT 4",
                'name_slug' => URLify::filter("Liqui Moly тормозная жидкость DOT 4"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly тормозная жидкость DOT 4",
                'name_ru' => "Liqui Moly тормозная жидкость DOT 4",
                'name_slug' => URLify::filter("Liqui Moly тормозная жидкость DOT 4"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly тормозная жидкость DOT 5.1",
                'name_ru' => "Liqui Moly тормозная жидкость DOT 5.1",
                'name_slug' => URLify::filter("Liqui Moly тормозная жидкость DOT 5.1"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly антифриз-концентрат G11",
                'name_ru' => "Liqui Moly антифриз-концентрат G11",
                'name_slug' => URLify::filter("Liqui Moly антифриз-концентрат G11"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly антифриз-концентрат G11",
                'name_ru' => "Liqui Moly антифриз-концентрат G11",
                'name_slug' => URLify::filter("Liqui Moly антифриз-концентрат G11"),
                'description' => $lorem
            ],
            [
                'category_id' => 7,
                'product_status_id' => 1,
                'name_uk' => "Liqui Moly антифриз-концентрат G12 Plus",
                'name_ru' => "Liqui Moly антифриз-концентрат G12 Plus",
                'name_slug' => URLify::filter("Liqui Moly антифриз-концентрат G12 Plus"),
                'description' => $lorem
            ],

        ];
    }
}
