<?php

namespace App\Repositories;

use App\DatabaseModels\Product;
use App\DatabaseModels\ProductCategory;
use App\DatabaseModels\Property;
use App\Helpers\Languages;
use DB;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository
{

    protected $wordsSeparator = '+';

    protected $likeSeparator = '%';

    
    /**
     * Get Top sales products by lang (4)
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTopSalesProductsByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::with([
            'images',
            'reviews' => function($query) {
                $query->select([
                    'product_id'
                ]);
            }
        ])
            ->join('promotions', 'promotions.product_id', '=', 'products.id')
            ->join('product_statuses', 'promotions.product_status_id', '=', 'product_statuses.id')
            ->orderByRaw('promotions.priority desc', 'name')
            ->where('promotions.product_status_id', '=', 2)
            ->limit(4)
            ->get([
                'products.id',
                'products.category_id',
                'products.old_price',
                'products.price',
                'products.priority',
                'products.avg_rating',
                "products.name_$language as name",
                "products.name_slug",
            ]);
    }

    /**
     * get novelty products by lang (4)
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getNoveltyProductsByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::with([
            'images',
            'reviews' => function($query) {
                $query->select([
                    'product_id'
                ]);
            }
        ])
            ->join('promotions', 'promotions.product_id', '=', 'products.id')
            ->join('product_statuses', 'promotions.product_status_id', '=', 'product_statuses.id')
            ->orderByRaw('promotions.priority desc', 'name')
            ->where('promotions.product_status_id', '=', 1)
            ->limit(4)
            ->get([
                'products.id',
                'products.category_id',
                'products.old_price',
                'products.price',
                'products.priority',
                'products.avg_rating',
                "products.name_$language as name",
                "products.name_slug"
            ]);
    }

    /**
     * get seasonal products by lang, return first (6) seasonal products
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getSeasonalGoodsByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::with([
            'images',
            'reviews' => function($query) {
                $query->select([
                    'product_id'
                ]);
            }
        ])
            ->join('promotions', 'promotions.product_id', '=', 'products.id')
            ->join('product_statuses', 'promotions.product_status_id', '=', 'product_statuses.id')
            ->orderByRaw('promotions.priority desc', 'name')
            ->where('promotions.product_status_id', '=', 3)
            ->limit(6)
            ->get([
                'products.id',
                'products.category_id',
                'products.old_price',
                'products.price',
                'products.priority',
                'products.avg_rating',
                "products.name_$language as name",
                "products.name_slug"
            ]);
    }

    /**
     * get promotion product on home page by language, this is 7th product (big)
     * @param string $language
     * @return mixed
     */
    public function getPromotionalProductByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        $products =  Product::with([
            'images',
            'reviews' => function($query) {
                $query->select([
                    'product_id'
                ]);
            }
        ])
            ->join('promotions', 'promotions.product_id', '=', 'products.id')
            ->join('product_statuses', 'promotions.product_status_id', '=', 'product_statuses.id')
            ->orderByRaw('promotions.priority desc', 'name')
            ->where('promotions.product_status_id', '=', 3)
            ->get([
                'products.id',
                'products.category_id',
                'products.old_price',
                'products.price',
                'products.priority',
                'products.avg_rating',
                "products.name_$language as name",
                "products.name_slug"
            ]);

        return $products[6];
    }

    /**
     * get all products for current category
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
                'images',
                'reviews' => function($query) {
                    $query->select([
                        'product_id'
                    ]);
                }
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
                'price',
                'avg_rating'
            ]);
    }

    /**
     * get single product for product page
     * @param null $slug
     * @param string $language
     * @return mixed
     */
    public function getProductBySlugAndLanguage($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::select([
            'id',
            'category_id',
            "name_$language as name",
            'name_slug',
            'old_price',
            'price',
            'avg_rating',
            "description_$language as description",
            'in_stock'
        ])->with([
            'images',
//            'reviews' => function($query) {
//                $query->where('is_moderated', '=', true);
//            }
        ])
            ->whereNameSlug($slug)
            ->first();
    }

    /**
     * get properties for current product
     * @param $productId
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
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

    /**
     * get visited products by session productIds
     * @param $productsIds
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getVisitedProducts($productsIds, $language = Languages::DEFAULT_LANGUAGE)
    {
        $idsImploded = implode(',',$productsIds);

        return Product::with([
            'images',
            'reviews' => function($query) {
                $query->select([
                    'product_id'
                ]);
            }
        ])
            ->whereIn('id', $productsIds)
            ->orderByRaw("field(id,{$idsImploded})", $productsIds)
            ->get([
                'id',
                'category_id',
                "name_$language as name",
                'name_slug',
                'old_price',
                'price',
                'avg_rating'
            ]);
    }

    /**
     * get recommended products (3)
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getRecommendedProducts($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::with([
            'images'
        ])
            ->join('promotions', 'promotions.product_id', '=', 'products.id')
            ->join('product_statuses', 'promotions.product_status_id', '=', 'product_statuses.id')
            ->orderByRaw('promotions.priority desc', 'name')
            ->where('promotions.product_status_id', '=', 4)
            ->limit(3)
            ->get([
                'products.id',
                'products.category_id',
                'products.old_price',
                'products.price',
                'products.priority',
                "products.name_$language as name",
                "products.name_slug"
            ]);
    }

    /**
     * get best prices products (3)
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getBestDiscountsProducts($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::with([
            'images'
        ])
            ->join('promotions', 'promotions.product_id', '=', 'products.id')
            ->join('product_statuses', 'promotions.product_status_id', '=', 'product_statuses.id')
            ->orderByRaw('promotions.priority desc', 'name')
            ->where('promotions.product_status_id', '=', 5)
            ->limit(3)
            ->get([
                'products.id',
                'products.category_id',
                'products.old_price',
                'products.price',
                'products.priority',
                "products.name_$language as name",
                "products.name_slug"
            ]);
    }

    /**
     * get popular products (3)
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPopularProducts($language = Languages::DEFAULT_LANGUAGE)
    {
        return Product::with([
            'images'
        ])
            ->orderByRaw('number_of_views desc', 'name')
            ->limit(3)
            ->get([
                'id',
                'category_id',
                "name_$language as name",
                'name_slug',
                'old_price',
                'price',
            ]);
    }
    
    /**get search products
     * @param $series
     * @param string $sort
     * @param $searchProductsLimit
     * @param int $searchProductsOffset
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getSearchProducts($series, 
                                      $sort = 'default', 
                                      $searchProductsLimit, 
                                      $searchProductsOffset = 0, 
                                      $language = Languages::DEFAULT_LANGUAGE)
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


        $words = explode($this->wordsSeparator, $series);
        $wordsReverse = array_reverse($words);
        $seriesReverse = implode($this->likeSeparator, $wordsReverse);
        $series = implode($this->likeSeparator, $words);
        
        $query = Product::with([
            'images',
            'reviews' => function($query) {
                $query->select([
                    'product_id'
                ]);
            }
        ])
            ->where(function ($query) use ($series, $seriesReverse) {
                $query->where("name_uk", 'like', '%' . $series . '%');
                $query->orWhere("name_uk", 'like', '%' . $seriesReverse . '%');
            })
            ->orWhere(function ($query) use ($series, $seriesReverse) {
                $query->where("name_ru", 'like', '%' . $series . '%');
                $query->orWhere("name_ru", 'like', '%' . $seriesReverse . '%');
            })
            ->orderByRaw($orderByRaw)
            ->limit($searchProductsLimit)
            ->offset($searchProductsOffset);


        return $query->get([
            'id',
            'category_id',
            "name_$language as name",
            'name_slug',
            'old_price',
            'price',
            'avg_rating'
        ]);

    }

    /**get async search products
     * @param $series
     * @param $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAsyncSearchProducts($series, $language)
    {
        $orderByRaw = 'name';
        
        $words = explode($this->wordsSeparator, $series);
        $wordsReverse = array_reverse($words);
        $seriesReverse = implode($this->likeSeparator, $wordsReverse);
        $series = implode($this->likeSeparator, $words);

        $query = Product::with([
            'images'
        ])
            ->where(function ($query) use ($series, $seriesReverse) {
                $query->where("name_uk", 'like', '%' . $series . '%');
                $query->orWhere("name_uk", 'like', '%' . $seriesReverse . '%');
            })
            ->orWhere(function ($query) use ($series, $seriesReverse) {
                $query->where("name_ru", 'like', '%' . $series . '%');
                $query->orWhere("name_ru", 'like', '%' . $seriesReverse . '%');
            })
            ->orderByRaw($orderByRaw)
            ->limit(5);

        return $query->get([
            'id',
            'category_id',
            "name_$language as name",
            'name_slug',
            'old_price',
            'price',
        ]);
    }

    /**get count of search products
     * @param $series
     * @return int
     */
    public function getCountSearchProducts($series)
    {
        $words = explode($this->wordsSeparator, $series);
        $wordsReverse = array_reverse($words);
        $seriesReverse = implode($this->likeSeparator, $wordsReverse);
        $series = implode($this->likeSeparator, $words);
        
        return Product::
                where(function ($query) use ($series, $seriesReverse) {
                    $query->where("name_uk", 'like', '%' . $series . '%');
                    $query->orWhere("name_uk", 'like', '%' . $seriesReverse . '%');
                })
                ->orWhere(function ($query) use ($series, $seriesReverse) {
                    $query->where("name_ru", 'like', '%' . $series . '%');
                    $query->orWhere("name_ru", 'like', '%' . $seriesReverse . '%');
                })
                ->count();
    }

    /**get products for CART
     * @param $inCartIds
     * @param $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCartProducts($inCartIds, $language)
    {
        $idsImploded = implode(',', $inCartIds);

        return Product::with([
            'images'
        ])
            ->whereIn('id', $inCartIds)
            ->orderByRaw("field(id,{$idsImploded})", $inCartIds)
            ->get([
                'id',
                'category_id',
                "name_$language as name",
                'name_slug',
                'old_price',
                'code_1c',
                'price',
            ]);
    }

    /**increase value of product views by 1
     * @param $model
     */
    public function incrementProductNumberOfViews($model)
    {
        $model->product->increment('number_of_views');
    }

}