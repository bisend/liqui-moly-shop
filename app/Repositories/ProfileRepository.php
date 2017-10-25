<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 21.09.2017
 * Time: 17:19
 */

namespace App\Repositories;
use App\DatabaseModels\Profile;

/**
 * Class ProfileRepository
 * @package App\Repositories
 */
class ProfileRepository
{
    /**
     * save personal info to db
     * @param $profile
     * @param $deliveryId
     * @param $paymentId
     * @param $phoneNumber
     * @param $address
     */
    public function savePersonalInfo($profile, $deliveryId, $paymentId, $phoneNumber, $address)
    {
        $profile->delivery_id = $deliveryId;

        $profile->payment_id = $paymentId;

        $profile->phone_number = $phoneNumber;
        
        $profile->address_delivery = $address;
        
        $profile->save();
    }

    /**
     * get profile for user
     * @param $userId
     * @return mixed
     */
    public function getProfile($userId)
    {
        return Profile::whereUserId($userId)->first();
    }

    /**
     * create profile for user
     * @param $userId
     */
    public function createProfile($userId)
    {
        $profile = new Profile();

        $profile->user_id = $userId;

        $profile->save();
    }
}