<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\CartService;
use App\ViewModels\CartViewModel;
use Session;
use View;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends LayoutController
{
    /**
     * @var CartService
     */
    protected $cartService;

    /**
     * CartController constructor.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @param string $language
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        Languages::localizeApp($language);

        $model = new CartViewModel($language);

        $this->cartService->fill($model);

        $bigCartView = View::make('partial.cart.big-cart', compact('model'))->render();
        $miniCartView = View::make('partial.cart.mini-cart', compact('model'))->render();
        
        return response()->json([
            'status' => 'success',
            'inCartIds' => $model->inCartIds,
            'totalProductsAmount' => $model->totalProductsAmount,
            'totalProductsCount' => $model->totalProductsCount,
            'bigCartView' => $bigCartView,
            'miniCartView' => $miniCartView
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart()
    {
        $productId = request('productId');

        $language = request('language');

        Languages::localizeApp($language);

        $productCount = request('productCount');
        
        $model = new CartViewModel($language);

        $this->cartService->addToCart($productId, $productCount);

        $this->cartService->fill($model);

        $bigCartView = View::make('partial.cart.big-cart', compact('model'))->render();
        $miniCartView = View::make('partial.cart.mini-cart', compact('model'))->render();

        return response()->json([
            'status' => 'success',
            'inCartIds' => $model->inCartIds,
            'totalProductsAmount' => $model->totalProductsAmount,
            'totalProductsCount' => $model->totalProductsCount,
            'bigCartView' => $bigCartView,
            'miniCartView' => $miniCartView
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFromCart()
    {
        $productId = request('productId');

        $language = request('language');

        Languages::localizeApp($language);

        $model = new CartViewModel($language);

        $this->cartService->deleteFromCart($productId);

        $this->cartService->fill($model);

        $bigCartView = View::make('partial.cart.big-cart', compact('model'))->render();
        $miniCartView = View::make('partial.cart.mini-cart', compact('model'))->render();
        
        return response()->json([
            'status' => 'success',
            'inCartIds' => $model->inCartIds,
            'totalProductsAmount' => $model->totalProductsAmount,
            'totalProductsCount' => $model->totalProductsCount,
            'bigCartView' => $bigCartView,
            'miniCartView' => $miniCartView
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCart()
    {
        $productId = request('productId');

        $language = request('language');

        Languages::localizeApp($language);

        $productCount = request('productCount');
        
        $model = new CartViewModel($language);

        $this->cartService->updateCart($productId, $productCount);

        $this->cartService->fill($model);

        $bigCartView = View::make('partial.cart.big-cart', compact('model'))->render();
        $miniCartView = View::make('partial.cart.mini-cart', compact('model'))->render();

        return response()->json([
            'status' => 'success',
            'inCartIds' => $model->inCartIds,
            'totalProductsAmount' => $model->totalProductsAmount,
            'totalProductsCount' => $model->totalProductsCount,
            'bigCartView' => $bigCartView,
            'miniCartView' => $miniCartView
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clearCart()
    {
//        $language = request('language');

//        $model = new CartViewModel($language);

//        $this->cartService->fill($model);

        return response()->json([
            'status' => 'success',
            'bigCartView' => '',
            'miniCartView' => ''
        ]);
    }
}
