<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 25.09.2017
 * Time: 15:50
 */

namespace App\Repositories;


use App\DatabaseModels\WishList;

class WishListRepository
{
    public function createWishList($userId)
    {
        $wishList = new WishList();
        
        $wishList->user_id = $userId;
        
        $wishList->save();
    }
    
    public function getWishList($userId)
    {
        return WishList::whereUserId($userId)->first();
    }
}