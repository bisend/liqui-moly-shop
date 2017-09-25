<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Promotion
 *
 * @property int $id
 * @property int $product_id
 * @property int $product_status_id
 * @property int $priority
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Promotion whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Promotion wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Promotion whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Promotion whereProductStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Promotion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Promotion extends Model
{
    protected $table = 'promotions';
}
