<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\FastOrder
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $product_id
 * @property string $name
 * @property string $phone_number
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder whereUserId($value)
 * @mixin \Eloquent
 * @property float $price
 * @property int|null $number
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\FastOrder wherePrice($value)
 */
class FastOrder extends Model
{
    protected $table = 'fast_orders';
    
}
