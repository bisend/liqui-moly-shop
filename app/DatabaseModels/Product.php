<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Product
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $product_status_id
 * @property string $name_uk
 * @property string $name_ru
 * @property string $name_slug
 * @property string|null $description
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereNameSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereNameUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereProductStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property float|null $old_price
 * @property float $price
 * @property-read \App\DatabaseModels\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DatabaseModels\Image[] $images
 * @property-read \App\DatabaseModels\ProductCategory $product_category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product wherePrice($value)
 * @property-read \App\DatabaseModels\Property $properties
 * @property int $number_of_views
 * @property int $priority
 * @property bool $in_stock
 * @property string|null $description_uk
 * @property string|null $description_ru
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereDescriptionRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereDescriptionUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereNumberOfViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product wherePriority($value)
 * @property float|null $avg_rating
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Product whereAvgRating($value)
 */
class Product extends Model
{
    protected $table = 'products';

    public function images()
    {
        return $this->belongsToMany(Image::class, 'product_images');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'id', 'product_id');
    }

    public function properties()
    {
        return $this->belongsTo(Property::class, 'id', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}
