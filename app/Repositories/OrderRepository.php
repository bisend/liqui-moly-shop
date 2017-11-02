<?php

namespace App\Repositories;

use App\DatabaseModels\Order;
use App\DatabaseModels\OrderStatus;

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
        $orderStatus = OrderStatus::whereIsDefault(true)->first();
        
        $order = new Order();
        $order->user_id = $userId;
        $order->payment_id = $data['paymentId'];
        $order->delivery_id = $data['deliveryId'];
        $order->status_id = $orderStatus->id;
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

    /**
     * get count of orders for user
     * @param $userId
     * @return int
     */
    public function getCountOrders($userId)
    {
        return Order::whereUserId($userId)->count();
    }

    /**
     * get orders for user
     * @param $userId
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
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
            },
            'status' => function ($query) use ($model) {
                $query->select([
                    'id',
                    "name_$model->language as name",
                    'name_slug'
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