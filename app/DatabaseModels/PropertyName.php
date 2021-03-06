<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\PropertyName
 *
 * @property int $id
 * @property string $name_uk
 * @property string $name_ru
 * @property string $name_slug
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\PropertyName whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\PropertyName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\PropertyName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\PropertyName whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\PropertyName whereNameSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\PropertyName whereNameUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\PropertyName whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PropertyName extends Model
{
    protected $table = 'property_names';
}
