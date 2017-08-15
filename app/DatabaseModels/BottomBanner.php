<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\BottomBanner
 *
 * @property int $id
 * @property int $image_id
 * @property string|null $big_text_uk
 * @property string|null $medium_text_uk
 * @property string|null $url_uk
 * @property string|null $big_text_ru
 * @property string|null $medium_text_ru
 * @property string|null $url_ru
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\DatabaseModels\Image $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereBigTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereBigTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereMediumTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereMediumTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereUrlRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\BottomBanner whereUrlUk($value)
 * @mixin \Eloquent
 */
class BottomBanner extends Model
{
    protected $table = 'bottom_banner';

    public function image()
    {
        return $this->hasOne('App\DatabaseModels\Image', 'id', 'image_id');
    }
}
