<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 28.08.2017
 * Time: 10:08
 */

namespace App\Services;


use App\Repositories\ProductRepository;
use Session;

/**
 * Class CartService
 * @package App\Services
 */
class CartService
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

    /**
     * CartService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param $model
     */
    public function fill($model)
    {
        $this->fillCart();

        $this->fillInCartIds($model);

        $this->fillCartProducts($model);
        
        $this->fillTotalProductsAmount($model);
        
        $this->fillTotalProductsCount($model);
    }

    /**
     * fill Local cart array with Session cart array
     */
    public function fillCart()
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

    /**
     * fill products that are in cart
     * @param $model
     */
    public function fillCartProducts($model)
    {
        if ($model->inCartIds)
        {
            $model->cartProducts = $this->productRepository->getCartProducts($model->inCartIds, $model->language);

            foreach ($model->cartProducts as $cartProduct)
            {
                $cartProduct->productCount = $this->cart[$cartProduct->id]['productCount'];
            }
        }
    }

    /**
     * fill total Amount of products
     * @param $model
     */
    public function fillTotalProductsAmount($model)
    {
        if ($model->cartProducts)
        {
            foreach ($model->cartProducts as $cartProduct)
            {
                $model->totalProductsAmount += set_format_price($cartProduct->price, $cartProduct->productCount);
            }
        }
    }

    /**
     * fill total Count of products
     * @param $model
     */
    public function fillTotalProductsCount($model)
    {
        if ($model->cartProducts)
        {
            foreach ($model->cartProducts as $cartProduct)
            {
                $model->totalProductsCount += $cartProduct->productCount;
            }
        }
    }

    /**
     * add to cart
     * @param $productId
     * @param $productCount
     */
    public function addToCart($productId, $productCount)
    {
        $productItems = Session::pull($this->sessionKey);

        if (count($productItems) != 0)
        {
            if (!Session::has('cart.' . $productId))
            {
                $productItems[$productId] = [
                    'productId' => $productId,
                    'productCount' => $productCount
                ];
            }
        }
        else
        {
            $productItems[$productId] = [
                'productId' => $productId,
                'productCount' => $productCount
            ];
        }
        Session::put($this->sessionKey, $productItems);
    }

    /**
     * delete from cart
     * @param $productId
     */
    public function deleteFromCart($productId)
    {
        $productItems = Session::pull($this->sessionKey);

        if (count($productItems) != 0)
        {
            foreach ($productItems as $key => $arr)
            {
                unset($productItems[$productId]);
            }
            if (count($productItems) > 0)
            {
                Session::put($this->sessionKey, $productItems);
            }
        }
    }

    /**
     * update cart
     * @param $productId
     * @param $productCount
     */
    public function updateCart($productId, $productCount)
    {
        $productItems = Session::pull($this->sessionKey);

        if (count($productItems) != 0)
        {
            if (!Session::has('cart.' . $productId))
            {
                $productItems[$productId] = [
                    'productId' => $productId,
                    'productCount' => $productCount
                ];
            }
        }
        else
        {
            $productItems[$productId] = [
                'productId' => $productId,
                'productCount' => $productCount
            ];
        }

        Session::put($this->sessionKey, $productItems);
    }

    /**
     * clear cart
     */
    public function clearCart()
    {
        
    }
}