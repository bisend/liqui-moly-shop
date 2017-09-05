<?php

namespace App\Repositories;

use App\DatabaseModels\Order;

/**
 * Class OrderRepository
 * @package App\Repositories
 */
class OrderRepository
{
    public function createOrder($data, $userId, $model)
    {
        $order = new Order();
        $order->user_id = $userId;
        $order->payment_id = $data['paymentId'];
        $order->delivery_id = $data['deliveryId'];
        $order->total_products_count = $model->totalProductsCount;
        $order->total_order_amount = $model->totalOrderAmount;
        $order->address_delivery = $data['address'];
        $order->email = $data['email'];
        $order->username = $data['name'];
        $order->phone_number = $data['phone'];
//        $order->comment;
        $order->save();
        $order->order_number = $order->id + 10000;
        $order->save();
        
        return $order;
    }
}