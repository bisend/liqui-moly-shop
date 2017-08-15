<?php

namespace App\Repositories;

use App\DatabaseModels\Product;
use App\DatabaseModels\ProductCategory;
use App\DatabaseModels\Property;
use App\Helpers\Languages;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository
{
    /**
     * Get Top sales products by lang
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTopSalesProductsByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::whereProductStatusId(1)
            ->with([
                'images'
        ])
            ->orderBy('name')
            ->get([
                'id',
                'category_id',
                'product_status_id',
                'old_price',
                'price',
                "name_$language as name",
                "name_slug"
            ]);
    }

    /**
     * get novelty products by lang
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getNoveltyProductsByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::whereProductStatusId(2)
            ->with([
                'images'
            ])
            ->orderBy('name')
            ->get([
                'id',
                'category_id',
                'product_status_id',
                'old_price',
                'price',
                "name_$language as name",
                "name_slug"
            ]);
    }

    /**
     * get seasonal products by lang
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getSeasonalGoodsByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::whereProductStatusId(3)
            ->with([
                'images'
            ])
            ->orderBy('name')
            ->get([
                'id',
                'category_id',
                'product_status_id',
                'old_price',
                'price',
                "name_$language as name",
                "name_slug"
            ]);
    }

    /**
     * get promotion product on home page by language
     * @param string $language
     * @return mixed
     */
    public function getPromotionalProductByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::whereProductStatusId(4)
            ->with([
                'images'
            ])
            ->first([
                'id',
                'category_id',
                'product_status_id',
                'old_price',
                'price',
                "name_$language as name",
                "name_slug"
            ]);
    }

    /**
     * @param null $currentCategory
     * @param string $sort
     * @param $categoryProductsLimit
     * @param int $categoryProductsOffset
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllProductsForCategoryByLanguage(
        $currentCategory = null,
        $sort = 'default',
        $categoryProductsLimit, 
        $categoryProductsOffset = 0, 
        $language = Languages::DEFAULT_LANGUAGE
    )
    {

        $orderByRaw = 'name';

        if ($sort == 'price-asc')
        {
            $orderByRaw = 'price asc, name';
        }
        elseif ($sort == 'price-desc')
        {
            $orderByRaw = 'price desc, name';
        }
//        return Product::with([
//            'images'
//        ])
//            ->join('product_category', function ($join) use ($currentCategory) {
//                $join->on('products.id', '=', 'product_category.product_id')
//                    ->where('product_category.category_id', '=', "$currentCategory->id");
//            })
////            ->orderByRaw('price desc, name')
//            ->orderBy('name')
//            ->limit($categoryProductsLimit)
//            ->offset($categoryProductsOffset)
//            ->get([
//                'products.id',
//                "name_$language as name",
//                'name_slug',
//                'price'
//            ]);

        $query = Product::with([
                'images'
            ])
            ->join('product_category', function ($query) use ($currentCategory) {
//            ->join(\DB::raw('product_category FORCE INDEX FOR JOIN (test)'), function ($query) use ($currentCategory) {
                $query->on('products.id', '=', 'product_category.product_id')
                    ->where('product_category.category_id', '=', "$currentCategory->id");
            })
//            ->orderByRaw('price desc, name')
            ->orderByRaw($orderByRaw)
            ->limit($categoryProductsLimit)
            ->offset($categoryProductsOffset);

//        $query->getQuery()->from(\DB::raw($query->getQuery()->from . ' FORCE INDEX (name_uk)'));
//         or just
//        $query->getQuery()->from(\DB::raw('`products` FORCE INDEX (price_name_uk_index)'));
//        $query->getQuery()->from(\DB::raw('`product_category` FORCE INDEX (text)'));

        return $results = $query->get([
                'products.id',
                "name_$language as name",
                'name_slug',
                'price'
            ]);
    }

    public function getProductBySlugAndLanguage($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::select([
            'id',
            'category_id',
            'product_status_id',
            "name_$language as name",
            'name_slug',
            'old_price',
            'price',
            'description'
        ])->with([
            'images',
        ])
            ->whereNameSlug($slug)
            ->first();
    }

    public function getProductProperties($productId, $language = Languages::DEFAULT_LANGUAGE)
    {
        return Property::select([
            "property_names.name_$language as name",
            "property_values.value_$language as value"
        ])
            ->join('products', 'properties.product_id', '=', 'products.id')
            ->join('property_names', 'properties.property_name_id', '=', 'property_names.id')
            ->join('property_values', 'properties.property_value_id', '=', 'property_values.id')
            ->orderBy('name')
            ->where('properties.product_id', '=', $productId)
            ->get();

//        $query =
//            "SELECT
//            `property_names`.`name_$language`,
//            `property_values`.`value_$language`
//            FROM `properties`
//            JOIN `products` ON `properties`.`product_id` = `products`.`id`
//            JOIN `property_names` ON `properties`.`property_name_id` = `property_names`.`id`
//            JOIN `property_values` ON `properties`.`property_value_id` = `property_values`.`id`
//            WHERE `properties`.`product_id` = $productId";
//
//        return \DB::select($query);
    }

    public function getVisitedProducts($productsIds, $language = Languages::DEFAULT_LANGUAGE)
    {
        $idsImploded = implode(',',$productsIds);

        return Product::with([
            'images'
        ])
            ->whereIn('id', $productsIds)
            ->orderByRaw("field(id,{$idsImploded})", $productsIds)
            ->get();
    }


}