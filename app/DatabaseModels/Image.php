<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Image
 *
 * @property int $id
 * @property string|null $original
 * @property string|null $big
 * @property string|null $medium
 * @property string|null $small
 * @property string|null $icon
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereBig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereMedium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereSmall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $main_slider
 * @property string|null $top_banner
 * @property string|null $bottom_banner
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereBottomBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereMainSlider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Image whereTopBanner($value)
 */
class Image extends Model
{
    protected $table = 'images';
    
    
}
