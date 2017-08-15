<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Review
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $review
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Review whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Review whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Review whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Review whereUserId($value)
 * @mixin \Eloquent
 */
class Review extends Model
{
    protected $table = 'reviews';
}
