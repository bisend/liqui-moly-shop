<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\OrderStatus
 *
 * @property int $id
 * @property string $name_uk
 * @property string $name_ru
 * @property string $name_slug
 * @property bool $isDefault
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\OrderStatus whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\OrderStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\OrderStatus whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\OrderStatus whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\OrderStatus whereNameSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\OrderStatus whereNameUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\OrderStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property bool $is_default
 */
class OrderStatus extends Model
{
    protected $table = 'order_statuses';
}
