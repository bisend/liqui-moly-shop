<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Mail\OrderReport;
use App\Mail\OrderReportManager;
use App\Services\CartService;
use App\Services\OrderService;
use App\ViewModels\OrderViewModel;
use DB;
use Illuminate\Http\Request;
use Session;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends LayoutController
{
    /**
     * @var OrderService
     */
    public $orderService;

    /**
     * @var CartService
     */
    public $cartService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     * @param CartService $cartService
     */
    public function __construct(OrderService $orderService, CartService $cartService)
    {
        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    /**
     * render order page
     * @param string $language
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * save order and products in DB and sending email to user and manager
     * @return \Illuminate\Http\JsonResponse
     */
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

            \Mail::to(config('mail.from.address'))->send(new OrderReportManager($model, request('name')));
        }
        catch (\Exception $e)
        {

            DB::rollBack();
            
            return response()->json([
                'status' => 'error'
            ]);
        }
        
        $this->cartService->clearCart();
        
        DB::commit();
        
        Session::put('isOrderCreated', true);
        
        return response()->json([
            'status' => 'success'
        ]);
    }
}
