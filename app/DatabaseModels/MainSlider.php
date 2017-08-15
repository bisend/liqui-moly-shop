<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\MainSlider
 *
 * @property int $id
 * @property int $image_id
 * @property string|null $big_text_uk
 * @property string|null $medium_text_uk
 * @property string|null $small_text_uk
 * @property string|null $button_text_uk
 * @property string $url_uk
 * @property string|null $big_text_ru
 * @property string|null $medium_text_ru
 * @property string|null $small_text_ru
 * @property string|null $button_text_ru
 * @property string $url_ru
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\DatabaseModels\Image $images
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereBigTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereBigTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereButtonTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereButtonTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereMediumTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereMediumTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereSmallTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereSmallTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereUrlRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereUrlUk($value)
 * @mixin \Eloquent
 */
class MainSlider extends Model
{
    protected $table = 'main_slider';

    public function images()
    {
        return $this->hasOne('App\DatabaseModels\Image', 'id', 'image_id');
    }
}
