<?php

namespace App\Http\Controllers;

use App\Mail\BuyOneClick;
use App\Repositories\FastOrderRepository;
use App\Repositories\ProductRepository;

class BuyOneClickController extends LayoutController
{
    protected $fastOrderRepository;

    protected $productRepository;

    public function __construct(FastOrderRepository $fastOrderRepository, ProductRepository $productRepository)
    {
        $this->fastOrderRepository = $fastOrderRepository;

        $this->productRepository = $productRepository;
    }

    public function saveFastOrder()
    {
        $userId = null;

        if (auth()->check())
        {
            $userId = auth()->user()->id;
        }

        $productId = request('productId');

        $name = request('name');

        $phoneNumber = request('phoneNumber');

        $language = request('language');

        $product = $this->productRepository->getProductByIdAndLanguage($productId, $language);
        
        try
        {
            $fastOrder = $this->fastOrderRepository->saveFastOrder($userId, $productId, $name, $phoneNumber, $product->price);
            
            \Mail::to(config('mail.from.address'))->send(new BuyOneClick($product, $fastOrder, $language));
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error'
            ]);
        }
        
        return response()->json([
            'status' => 'success'
        ]);
    }
}
