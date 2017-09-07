<?php

namespace App\Repositories;

use App\DatabaseModels\OrderProduct;

/**
 * Class OrderProductRepository
 * @package App\Repositories
 */
class OrderProductRepository
{
    /**
     * save order products in DB
     * @param $model
     */
    public function createOrderProducts($model)
    {
        foreach ($model->orderProducts as $orderProd)
        {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $model->orderId;
            $orderProduct->product_id = $orderProd->id;
            $orderProduct->product_count = $orderProd->productCount;
            $orderProduct->price = $orderProd->price;
            $orderProduct->code_1c = $orderProd->code_1c;
            $orderProduct->save();
        }
    }
}