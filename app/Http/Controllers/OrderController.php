<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Mail\OrderReport;
use App\Services\CartService;
use App\Services\OrderService;
use App\ViewModels\OrderViewModel;
use DB;
use Illuminate\Http\Request;
use Session;

class OrderController extends LayoutController
{
    public $orderService;

    public $cartService;

    public function __construct(OrderService $orderService, CartService $cartService)
    {
        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        if (!Session::has('cart'))
        {
            return redirect(url_home($language));
        }

        $model = new OrderViewModel($language);

        $this->orderService->fill($model);

        return view('pages.order.order', compact('model'));
    }

    public function createOrder()
    {
        $data = request()->all();

        $model = new OrderViewModel(request('language'));

        $this->orderService->fill($model);

        DB::beginTransaction();

        if (auth()->check())
        {
            $userId = auth()->id();
        }
        else
        {
            $userId = null;
        }

        $this->orderService->createOrder($data, $userId, $model);

        $this->orderService->createOrderProducts($model);
        
        try 
        {
            \Mail::to(request('email'))->send(new OrderReport($model, request('name')));
        }
        catch (\Exception $e)
        {

            DB::rollBack();
            \Debugbar::info($e);
            return response()->json([
                'status' => 'error'
            ]);
        }
        
        $this->cartService->clearCart();
        
//        \Debugbar::info(request()->all());

        DB::commit();
        
        Session::put('isOrderCreated', true);
        
        return response()->json([
            'status' => 'success'
        ]);
    }
}
