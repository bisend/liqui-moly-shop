<?php

namespace App\Http\Controllers;

use App\Mail\BuyOneClick;
use App\Repositories\FastOrderRepository;
use App\Repositories\ProductRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class BuyOneClickController
 * @package App\Http\Controllers
 */
class BuyOneClickController extends LayoutController
{
    /**
     * @var FastOrderRepository
     */
    protected $fastOrderRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * BuyOneClickController constructor.
     * @param FastOrderRepository $fastOrderRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(FastOrderRepository $fastOrderRepository, ProductRepository $productRepository)
    {
        $this->fastOrderRepository = $fastOrderRepository;

        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveFastOrder()
    {
        if(!request()->ajax())
        {
            throw new BadRequestHttpException();
        }
        
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
