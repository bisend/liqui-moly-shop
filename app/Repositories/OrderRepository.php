<?php

namespace App\Repositories;

use App\DatabaseModels\Order;

/**
 * Class OrderRepository
 * @package App\Repositories
 */
class OrderRepository
{
    /**
     * save order to DB and return Order
     * @param $data
     * @param $userId
     * @param $model
     * @return Order
     */
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

    public function getCountOrders($userId)
    {
        return Order::whereUserId($userId)->count();
    }

    public function getOrdersByUserId($userId, $model)
    {
        return Order::with([
            'order_products.product' => function ($query) use ($model) {
                $query->select([
                    'id',
                    'category_id',
                    "name_$model->language as name",
                    'name_slug'
                ])->with([
                    'images'
                ]);
            }
        ])
            ->whereUserId($userId)
            ->orderBy('created_at', 'desc')
            ->offset($model->ordersOffset)
            ->limit(7)
            ->get();
    }
}