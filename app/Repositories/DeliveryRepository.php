<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 04.09.2017
 * Time: 14:26
 */

namespace App\Repositories;


use App\DatabaseModels\Delivery;
use App\Helpers\Languages;

/**
 * Class DeliveryRepository
 * @package App\Repositories
 */
class DeliveryRepository
{
    /**
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllDeliveriesByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Delivery::get([
            'id',
            "name_$language as name",
            'name_slug'
        ]);
    }
}