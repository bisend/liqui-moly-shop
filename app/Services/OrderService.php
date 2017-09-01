<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 01.09.2017
 * Time: 10:48
 */

namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Session;

class OrderService extends LayoutService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var string
     */
    protected $sessionKey = 'cart';

    /**
     * @var array
     */
    protected $cart = [];
    
    
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        parent::__construct($categoryRepository, $productRepository);
        
        $this->productRepository = $productRepository;
    }
    
    public function fill($model)
    {
        parent::fill($model);
        
        $this->fillCart($model);

        $this->fillInCartIds($model);

        $this->fillOrderProducts($model);

        $this->fillTotalOrderAmount($model);

        $this->fillTotalProductsCount($model);
    }

    /**
     * fill Local cart array with Session cart array
     */
    public function fillCart($model)
    {
        if (Session::has($this->sessionKey))
        {
            $this->cart = Session::get($this->sessionKey);
        }
    }

    /**
     * fill InCartIds array with ids of products that are in cart
     * @param $model
     */
    public function fillInCartIds($model)
    {
        if ($this->cart)
        {
            foreach ($this->cart as $key => $cartItem)
            {
                $model->inCartIds[] = $cartItem['productId'];
            }
        }
    }

    public function fillOrderProducts($model)
    {
        $model->orderProducts = $this->productRepository->getCartProducts($model->inCartIds, $model->language);

        foreach ($model->orderProducts as $orderProduct)
        {
            $orderProduct->productCount = $this->cart[$orderProduct->id]['productCount'];
        }
    }

    public function fillTotalOrderAmount($model)
    {
        if ($model->orderProducts)
        {
            foreach ($model->orderProducts as $orderProduct)
            {
                $model->totalOrderAmount += set_format_price($orderProduct->price, $orderProduct->productCount);
            }
        }
    }

    public function fillTotalProductsCount($model)
    {
        if ($model->orderProducts)
        {
            foreach ($model->orderProducts as $orderProduct)
            {
                $model->totalProductsCount += $orderProduct->productCount;
            }
        }
    }
}