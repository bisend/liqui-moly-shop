<?php

namespace App\Repositories;


use App\DatabaseModels\FastOrder;

/**
 * Class FastOrderRepository
 * @package App\Repositories
 */
class FastOrderRepository
{
    /**
     * save fast order to db
     * @param $userId
     * @param $productId
     * @param $name
     * @param $phoneNumber
     * @param $price
     * @return FastOrder
     */
    public function saveFastOrder($userId, $productId, $name, $phoneNumber, $price)
    {
        $fastOrder = new FastOrder();
        $fastOrder->user_id = $userId;
        $fastOrder->product_id = $productId;
        $fastOrder->name = $name;
        $fastOrder->phone_number = $phoneNumber;
        $fastOrder->price = $price;
        $fastOrder->save();
        $fastOrder->number = $fastOrder->id + 10000;
        $fastOrder->save();
        
        return $fastOrder;
    }
}