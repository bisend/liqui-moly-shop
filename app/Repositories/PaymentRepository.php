<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 04.09.2017
 * Time: 14:27
 */

namespace App\Repositories;

use App\DatabaseModels\Payment;
use App\Helpers\Languages;

/**
 * Class PaymentRepository
 * @package App\Repositories
 */
class PaymentRepository
{
    /**
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllPaymentsByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Payment::get([
            'id',
            "name_$language as name",
            'name_slug'
        ]);
    }
}