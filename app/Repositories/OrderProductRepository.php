<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 05.09.2017
 * Time: 12:05
 */

namespace App\Repositories;

use App\DatabaseModels\OrderProduct;

/**
 * Class OrderProductRepository
 * @package App\Repositories
 */
class OrderProductRepository
{
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