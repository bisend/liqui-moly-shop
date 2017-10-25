<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 25.09.2017
 * Time: 15:51
 */

namespace App\Repositories;

use App\DatabaseModels\WishListProduct;

/**
 * Class WishListProductRepository
 * @package App\Repositories
 */
class WishListProductRepository
{
    /**
     * get count of products for wishlist
     * @param $wishListId
     * @return int
     */
    public function getCountWishListProducts($wishListId)
    {
        return WishListProduct::whereWishListId($wishListId)
            ->count();
    }

    /**
     * get products for wishlist
     * @param $model
     * @param $wishListId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getWishListProducts($model, $wishListId)
    {
        return WishListProduct::with([
            'product' => function ($query) use ($model) {
                $query->select([
                    'id',
                    'category_id',
                    'price',
                    "name_$model->language as name",
                    'name_slug'
                ])->with([
                    'images'
                ]);
            }
        ])
            ->whereWishListId($wishListId)
            ->offset($model->wishListProductsOffset)
            ->limit(7)
            ->get();
    }

    /**
     * get mini wishlist products
     * @param $language
     * @param $wishListId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMiniWishListProducts($language, $wishListId)
    {
        return WishListProduct::with([
            'product' => function ($query) use ($language) {
                $query->select([
                    'id',
                    'category_id',
                    'price',
                    "name_$language as name",
                    'name_slug'
                ])->with([
                    'images'
                ]);
            }
        ])
            ->whereWishListId($wishListId)
            ->get();
    }

    /**
     * add new product to wishlist
     * @param $wishListId
     * @param $productId
     */
    public function addWishListProduct($wishListId, $productId)
    {
        $wishListProduct = new WishListProduct();
        $wishListProduct->wish_list_id = $wishListId;
        $wishListProduct->product_id = $productId;
        $wishListProduct->save();
    }

    /**
     * delete product from wishlist
     * @param $wishListProductId
     */
    public function deleteWishListProduct($wishListProductId)
    {
        WishListProduct::whereId($wishListProductId)->delete();
    }

    /**
     * get IDs of products that are in WL
     * @param $wishListId
     * @return array
     */
    public function getInWishIds($wishListId)
    {
        $wishListIds = WishListProduct::whereWishListId($wishListId)->get([
            'product_id'
        ]);

        $wIds = [];

        foreach ($wishListIds as $wishListId)
        {
            $wIds[] = $wishListId->product_id;
        }

        return $wIds;
    }
}