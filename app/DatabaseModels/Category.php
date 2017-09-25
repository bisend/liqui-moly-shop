<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Category
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name_uk
 * @property string $name_ru
 * @property string $name_slug
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereNameSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereNameUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DatabaseModels\Category[] $childCategories
 * @property-read \App\DatabaseModels\Category|null $parentCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DatabaseModels\Product[] $products
 * @property string|null $description_uk
 * @property string|null $description_ru
 * @property int $priority
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereDescriptionRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereDescriptionUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category wherePriority($value)
 */
class Category extends Model
{
    /**
     * table name
     * @var string
     */
    protected $table = 'categories';

    /**
     * get child categories relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    
    /**
     * get parent category relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }
}
