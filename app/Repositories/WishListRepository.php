<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 25.09.2017
 * Time: 15:50
 */

namespace App\Repositories;

use App\DatabaseModels\WishList;

/**
 * Class WishListRepository
 * @package App\Repositories
 */
class WishListRepository
{
    /**
     * create WL
     * @param $userId
     */
    public function createWishList($userId)
    {
        $wishList = new WishList();
        
        $wishList->user_id = $userId;
        
        $wishList->save();
    }

    /**
     * get WL
     * @param $userId
     * @return mixed
     */
    public function getWishList($userId)
    {
        return WishList::whereUserId($userId)->first();
    }
}