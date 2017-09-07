<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\DeliveryRepository;
use App\Repositories\OrderProductRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Session;

/**
 * Class OrderService
 * @package App\Services
 */
class OrderService extends LayoutService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var DeliveryRepository
     */
    protected $deliveryRepository;

    /**
     * @var PaymentRepository
     */
    protected $paymentRepository;

    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * @var OrderProductRepository
     */
    protected $orderProductRepository;

    /**
     * @var UserRepository
     */
    protected $userRepository;
    
    /**
     * @var string
     */
    protected $sessionKey = 'cart';

    /**
     * @var array
     */
    protected $cart = [];

    /**
     * OrderService constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     * @param DeliveryRepository $deliveryRepository
     * @param PaymentRepository $paymentRepository
     * @param OrderRepository $orderRepository
     * @param OrderProductRepository $orderProductRepository
     * @param UserRepository $userRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository,
                                DeliveryRepository $deliveryRepository, PaymentRepository $paymentRepository,
                                OrderRepository $orderRepository, OrderProductRepository $orderProductRepository,
                                UserRepository $userRepository)
    {
        parent::__construct($categoryRepository, $productRepository);
        
        $this->productRepository = $productRepository;
        $this->deliveryRepository = $deliveryRepository;
        $this->paymentRepository = $paymentRepository;
        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param $model
     */
    public function fill($model)
    {
        parent::fill($model);
        
        $this->fillCart();

        $this->fillInCartIds($model);

        $this->fillOrderProducts($model);

        $this->fillTotalOrderAmount($model);

        $this->fillTotalProductsCount($model);
        
        $this->fillDeliveries($model);
        
        $this->fillPayments($model);
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
     * fill order products with count from cart
     * @param $model
     */
    public function fillOrderProducts($model)
    {
        $model->orderProducts = $this->productRepository->getCartProducts($model->inCartIds, $model->language);

        foreach ($model->orderProducts as $orderProduct)
        {
            $orderProduct->productCount = $this->cart[$orderProduct->id]['productCount'];
        }
    }

    /**
     * fill total order amount
     * @param $model
     */
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

    /**
     * fill total products count
     * @param $model
     */
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

    /**
     * fill deliveries by lang
     * @param $model
     */
    public function fillDeliveries($model)
    {
        $model->deliveries = $this->deliveryRepository->getAllDeliveriesByLanguage($model->language);
    }

    /**
     * fill payments by lang
     * @param $model
     */
    public function fillPayments($model)
    {
        $model->payments = $this->paymentRepository->getAllPaymentsByLanguage($model->language);
    }

    /**
     * creating order (save to DB)
     * @param $data
     * @param $userId
     * @param $model
     */
    public function createOrder($data, $userId, $model)
    {
        $model->order = $this->orderRepository->createOrder($data, $userId, $model);
        
        $model->orderId = $model->order->id;
    }

    /**
     * creating order products (save to DB)
     * @param $model
     */
    public function createOrderProducts($model)
    {
        $this->orderProductRepository->createOrderProducts($model);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //MAYBE WILL USE
//    public function createUser($email, $username)
//    {
//        $this->userRepository->createUser($email, $username);
//    }
//    
//    public function checkIfUserExists($email)
//    {
//        $this->userRepository->checkIfUserExists($email);
//    }
//
//    public function getUser($email)
//    {
//        $this->userRepository->getUserByEmail($email);
//    }
    
}