<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 07.09.2017
 * Time: 11:40
 */

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\DeliveryRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\UserRepository;
use App\Repositories\WishListProductRepository;
use App\Repositories\WishListRepository;

/**
 * Class ProfileService
 * @package App\Services
 */
class ProfileService extends LayoutService
{
    /**
     * @var DeliveryRepository
     */
    protected $deliveryRepository;

    /**
     * @var PaymentRepository
     */
    protected $paymentRepository;

    /**
     * @var ProfileRepository
     */
    protected $profileRepository;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * @var WishListRepository
     */
    protected $wishListRepository;

    /**
     * @var WishListProductRepository
     */
    protected $wishListProductRepository;

    /**
     * ProfileService constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     * @param DeliveryRepository $deliveryRepository
     * @param PaymentRepository $paymentRepository
     * @param ProfileRepository $profileRepository
     * @param UserRepository $userRepository
     * @param OrderRepository $orderRepository
     * @param WishListRepository $wishListRepository
     * @param WishListProductRepository $wishListProductRepository
     */
    public function __construct(CategoryRepository $categoryRepository,
                                ProductRepository $productRepository,
                                DeliveryRepository $deliveryRepository,
                                PaymentRepository $paymentRepository,
                                ProfileRepository $profileRepository,
                                UserRepository $userRepository,
                                OrderRepository $orderRepository,
                                WishListRepository $wishListRepository,
                                WishListProductRepository $wishListProductRepository)
    {
        parent::__construct($categoryRepository, $productRepository);

        $this->deliveryRepository = $deliveryRepository;

        $this->paymentRepository = $paymentRepository;
        
        $this->profileRepository = $profileRepository;
        
        $this->userRepository = $userRepository;
        
        $this->orderRepository = $orderRepository;

        $this->wishListRepository = $wishListRepository;

        $this->wishListProductRepository = $wishListProductRepository;
    }

    /**
     * @param $model
     */
    public function fill($model)
    {
        parent::fill($model);
    }

    /**
     * fill all deliveries by lang
     * @param $model
     */
    public function fillDeliveries($model)
    {
        $model->deliveries = $this->deliveryRepository->getAllDeliveriesByLanguage($model->language);
    }

    /**
     * fill all payments by lang
     * @param $model
     */
    public function fillPayments($model)
    {
        $model->payments = $this->paymentRepository->getAllPaymentsByLanguage($model->language);
    }
    
    /**
     * update profile record in DB
     * @param $profile
     * @param $deliveryId
     * @param $paymentId
     * @param $phoneNumber
     * @param $address
     */
    public function saveProfilePersonalInfo($profile, $deliveryId, $paymentId, $phoneNumber, $address)
    {
        $this->profileRepository->savePersonalInfo($profile, $deliveryId, $paymentId, $phoneNumber, $address);
    }

    /**
     * update name in users table
     * @param $name
     */
    public function saveUserName($name)
    {
        $this->userRepository->setUserName($name);
    }

    /**
     * get user by auth facade
     * @param $model
     */
    public function fillUser($model)
    {
        $model->user = $this->userRepository->getUserByAuth();
    }

    /**
     * fill profile by user_id
     * @param $model
     */
    public function fillProfile($model)
    {
        $model->profile = $this->profileRepository->getProfile($model->user->id);
    }

    /**
     * check if user changing email return true or false
     * @param $email
     * @return bool
     */
    public function checkIfEmailChanged($email)
    {
        return $this->userRepository->checkIfEmailChanged($email);
    }

    /**
     * check if new email of user exists in DB return true or false
     * @param $email
     * @return bool
     */
    public function checkIfUserExists($email)
    {
        return $this->userRepository->checkIfUserExists($email);
    }

    /**
     * set new email in new_email field, if email not exist in DB
     * @param $email
     */
    public function setNewEmail($email)
    {
        $this->userRepository->setNewEmail($email);
    }

    /**
     * @param $user
     * @param $newPassword
     */
    public function changePassword($user, $newPassword)
    {
        $this->userRepository->changePassword($user, $newPassword);
    }
    
    public function fillCountOrders($model, $user)
    {
        $model->countOrders = $this->orderRepository->getCountOrders($user->id);
    }
    
    public function fillOrders($model, $user)
    {
        $model->orders = $this->orderRepository->getOrdersByUserId($user->id, $model);
    }
    
    public function fillWishList($model, $user)
    {
        $model->wishList = $this->wishListRepository->getWishList($user->id);
    }
    
    public function fillCountWishListProducts($model)
    {
        $model->countWishListProducts = $this->wishListProductRepository->getCountWishListProducts($model->wishList->id);
    }
    
    public function fillWishListProducts($model)
    {
        $model->wishListProducts = $this->wishListProductRepository->getWishListProducts($model, $model->wishList->id);
    }

    public function deleteFromWishList($wishListProductId)
    {
        $this->wishListProductRepository->deleteWishListProduct($wishListProductId);
    }
    
    public function addWishListProduct($wishListId, $productId)
    {
        $this->wishListProductRepository->addWishListProduct($wishListId, $productId);
    }
}