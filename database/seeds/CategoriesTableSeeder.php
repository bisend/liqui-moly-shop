<?php

use App\DatabaseModels\Category;
use Illuminate\Database\Seeder;
use App\Helpers\URLify;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Category::truncate();
        $this->command->info('[categories] table truncated...');

        $this->seed();

        $this->command->info('[categories] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function seed()
    {
        $categories = $this->getDataArray();

        foreach ($categories as $category)
        {
            $model = new Category();
            $model->parent_id = ($category['parent_id'] == null) ? null : $category['parent_id'];
            $model->name_uk = $category['name_uk'];
            $model->name_ru = $category['name_ru'];
            $model->name_slug = $category['name_slug'];
            $model->save();
        }
        
        for ($k = 8; $k <= 39; $k++)
        {
            for ($i = 1; $i < 5; $i++)
            {
                $model = new Category();
                $model->parent_id = $k;
                $model->name_uk = "Категорія $k.$i";
                $model->name_ru = "Категория $k.$i";
                $model->name_slug = URLify::filter("Категорія $k.$i");
                $model->save();
            }
        }
    }

    public function getDataArray()
    {
        return [
            //first lvl categories
            [
                'parent_id' => null,
                'name_uk' => 'Моторні масла',
                'name_ru' => 'Моторные масла',
                'name_slug' => URLify::filter('Моторні масла'),
            ],
            [
                'parent_id' => null,
                'name_uk' => 'Масла КПП',
                'name_ru' => 'Масла КПП',
                'name_slug' => URLify::filter('Масла КПП'),
            ],
            [
                'parent_id' => null,
                'name_uk' => 'Присадки',
                'name_ru' => 'Присадки',
                'name_slug' => URLify::filter('Присадки'),
            ],
            [
                'parent_id' => null,
                'name_uk' => 'Автокосметика',
                'name_ru' => 'Автокосметика',
                'name_slug' => URLify::filter('Автокосметика'),
            ],
            [
                'parent_id' => null,
                'name_uk' => 'Сервіс-продукти',
                'name_ru' => 'Сервис-продукты',
                'name_slug' => URLify::filter('Сервіс-продукти'),
            ],
            [
                'parent_id' => null,
                'name_uk' => 'Спецпрограми',
                'name_ru' => 'Спецпрограммы',
                'name_slug' => URLify::filter('Спецпрограми'),
            ],
            [
                'parent_id' => null,
                'name_uk' => 'Технічні рідини',
                'name_ru' => 'Техжидкости',
                'name_slug' => URLify::filter('Технічні рідини'),
            ],

            //second level categories
            //
            [
                'parent_id' => 1,
                'name_uk' => 'Синтетичні масла',
                'name_ru' => 'Синтетические масла',
                'name_slug' => URLify::filter('Синтетичні масла'),
            ],
            [
                'parent_id' => 1,
                'name_uk' => 'Напівсинтетичні масла',
                'name_ru' => 'Полусинтетические масла',
                'name_slug' => URLify::filter('Напівсинтетичні масла'),
            ],
            [
                'parent_id' => 1,
                'name_uk' => 'Мінеральні масла',
                'name_ru' => 'Минеральные масла',
                'name_slug' => URLify::filter('Мінеральні масла'),
            ],
            [
                'parent_id' => 1,
                'name_uk' => 'Бізнес-тара (від 20л)',
                'name_ru' => 'Бизнес-тара (от 20л)',
                'name_slug' => URLify::filter('Бізнес-тара (від 20л)'),
            ],
            [
                'parent_id' => 1,
                'name_uk' => 'Для вантажної техніки',
                'name_ru' => 'Для грузовой техники',
                'name_slug' => URLify::filter('Для вантажної техніки'),
            ],
            //
            [
                'parent_id' => 2,
                'name_uk' => 'АКПП',
                'name_ru' => 'АКПП',
                'name_slug' => URLify::filter('АКПП'),
            ],
            [
                'parent_id' => 2,
                'name_uk' => 'МКПП',
                'name_ru' => 'МКПП',
                'name_slug' => URLify::filter('МКПП'),
            ],
            //
            [
                'parent_id' => 3,
                'name_uk' => 'Промивки',
                'name_ru' => 'Промывки',
                'name_slug' => URLify::filter('Промивки'),
            ],
            [
                'parent_id' => 3,
                'name_uk' => 'Присадки в масло',
                'name_ru' => 'Присадки в масло',
                'name_slug' => URLify::filter('Присадки в масло'),
            ],
            [
                'parent_id' => 3,
                'name_uk' => 'Присадки в КПП',
                'name_ru' => 'Присадки в КПП',
                'name_slug' => URLify::filter('Присадки в КПП'),
            ],
            [
                'parent_id' => 3,
                'name_uk' => 'Присадки в паливо (бензин)',
                'name_ru' => 'Присадки в топливо (бензин)',
                'name_slug' => URLify::filter('Присадки в паливо (бензин)'),
            ],
            [
                'parent_id' => 3,
                'name_uk' => 'Присадки в паливо (дизель)',
                'name_ru' => 'Присадки в топливо (дизель)',
                'name_slug' => URLify::filter('Присадки в паливо (дизель)'),
            ],
            [
                'parent_id' => 3,
                'name_uk' => 'Присадки в ОЖ',
                'name_ru' => 'Присадки в ОЖ',
                'name_slug' => URLify::filter('Присадки в ОЖ'),
            ],
            //
            [
                'parent_id' => 4,
                'name_uk' => 'Для всього автомобіля',
                'name_ru' => 'Для всего автомобиля',
                'name_slug' => URLify::filter('Для всього автомобіля'),
            ],
            [
                'parent_id' => 4,
                'name_uk' => 'Для кузова',
                'name_ru' => 'Для кузова',
                'name_slug' => URLify::filter('Для кузова'),
            ],
            [
                'parent_id' => 4,
                'name_uk' => 'Для салону',
                'name_ru' => 'Для салона',
                'name_slug' => URLify::filter('Для салону'),
            ],
            [
                'parent_id' => 4,
                'name_uk' => 'Для скла',
                'name_ru' => 'Для стекол',
                'name_slug' => URLify::filter('Для скла'),
            ],
            [
                'parent_id' => 4,
                'name_uk' => 'Для коліс',
                'name_ru' => 'Для колёс',
                'name_slug' => URLify::filter('Для коліс'),
            ],
            [
                'parent_id' => 4,
                'name_uk' => 'Для миття і полірування',
                'name_ru' => 'Для мытья и полировки',
                'name_slug' => URLify::filter('Для миття і полірування'),
            ],
            [
                'parent_id' => 4,
                'name_uk' => 'Ексклюзивні засоби',
                'name_ru' => 'Эксклюзивные средства',
                'name_slug' => URLify::filter('Ексклюзивні засоби'),
            ],
            //
            [
                'parent_id' => 5,
                'name_uk' => 'Клеї та герметики',
                'name_ru' => 'Клеи и герметики',
                'name_slug' => URLify::filter('Клеї та герметики'),
            ],
            [
                'parent_id' => 5,
                'name_uk' => 'Очистка паливних систем',
                'name_ru' => 'Очистка топливных систем',
                'name_slug' => URLify::filter('Очистка паливних систем'),
            ],
            [
                'parent_id' => 5,
                'name_uk' => 'Догляд за кондиціонером',
                'name_ru' => 'Уход за кондиционером',
                'name_slug' => URLify::filter('Догляд за кондиціонером'),
            ],
            [
                'parent_id' => 5,
                'name_uk' => 'Консистетні змазки',
                'name_ru' => 'Консистентные смазки',
                'name_slug' => URLify::filter('Консистетні змазки'),
            ],
            [
                'parent_id' => 5,
                'name_uk' => 'Вклеювання скла',
                'name_ru' => 'Вклейка стекол',
                'name_slug' => URLify::filter('Вклеювання скла'),
            ],
            [
                'parent_id' => 5,
                'name_uk' => 'DPF фільтри',
                'name_ru' => 'DPF фильтры',
                'name_slug' => URLify::filter('DPF фільтри'),
            ],
            [
                'parent_id' => 5,
                'name_uk' => 'Антикорозійна серія',
                'name_ru' => 'Антикоррозионная серия',
                'name_slug' => URLify::filter('Антикорозійна серія'),
            ],
            [
                'parent_id' => 5,
                'name_uk' => 'Для СТО',
                'name_ru' => 'Для СТО',
                'name_slug' => URLify::filter('Для СТО'),
            ],
            //
            [
                'parent_id' => 6,
                'name_uk' => 'Мотоциклетна програма',
                'name_ru' => 'Мотоциклетная программа',
                'name_slug' => URLify::filter('Мотоциклетна програма'),
            ],
            [
                'parent_id' => 6,
                'name_uk' => 'Човнова програма',
                'name_ru' => 'Лодочная программа',
                'name_slug' => URLify::filter('Човнова програма'),
            ],
            [
                'parent_id' => 6,
                'name_uk' => 'Садова програма',
                'name_ru' => 'Садовая программа',
                'name_slug' => URLify::filter('Садова програма'),
            ],
            [
                'parent_id' => 6,
                'name_uk' => 'Гідравлічні і компресорні',
                'name_ru' => 'Гидравлические и компрессорные',
                'name_slug' => URLify::filter('Гідравлічні і компресорні'),
            ],
        ];
    }
}
