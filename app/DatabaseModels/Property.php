<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Property
 *
 * @property int $id
 * @property int $product_id
 * @property int $property_name_id
 * @property int $property_value_id
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Property whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Property whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Property wherePropertyNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Property wherePropertyValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Property whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\DatabaseModels\PropertyName $propertyName
 * @property-read \App\DatabaseModels\PropertyValue $propertyValue
 */
class Property extends Model
{
    protected $table = 'properties';

    public function propertyName()
    {
        return $this->hasOne(PropertyName::class, 'property_name_id', 'id');
    }
    
    public function propertyValue()
    {
        return $this->hasOne(PropertyValue::class, 'property_value_id', 'id');
    }
}
