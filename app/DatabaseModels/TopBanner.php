<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\TopBanner
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereBigTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereBigTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereMediumTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereMediumTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereUrlRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\TopBanner whereUrlUk($value)
 * @mixin \Eloquent
 */
class TopBanner extends Model
{
    protected $table = 'top_banner';
    
    public function image()
    {
        return $this->hasOne('App\DatabaseModels\Image', 'id', 'image_id');
    }
}
