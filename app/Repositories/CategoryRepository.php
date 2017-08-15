<?php

namespace App\Repositories;

use App\DatabaseModels\Category;
use App\DatabaseModels\Product;
use App\DatabaseModels\ProductCategory;
use App\Helpers\Languages;
use DB;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository
{
    /**
     * get all categories by language
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllCategoriesByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return Category::whereNull('parent_id')
            ->with([
                'childCategories' => function ($query) use ($language) {
                    $query->select('id', 'parent_id', "name_$language as name", 'name_slug')->orderBy('name');
                    $query->with([
                        'childCategories' => function ($query) use ($language) {
                            $query->select('id', 'parent_id', "name_$language as name", 'name_slug')->orderBy('name');
                        }
                    ]);
                }
            ])
            ->orderBy('name')
            ->get([
                'id', 
                'parent_id', 
                "name_$language as name", 
                'name_slug']);
    }

    /**
     * @param null $slug
     * @param string $language
     * @return mixed
     */
    public function getCurrentCategoryBySlugAndLanguage($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        return Category::with([
            'childCategories' => function ($query) use ($language) {
                $query->select(
                    'id', 
                    'parent_id', 
                    "name_$language as name", 
                    'name_slug')
                    ->orderBy('name');
            },
            'childCategories.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory' => function ($query) use ($language) {
                $query->select(
                    'id', 
                    'parent_id', 
                    "name_$language as name", 
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.parentCategory' => function ($query) use ($language) {
                $query->select(
                    'id', 
                    'parent_id', 
                    "name_$language as name", 
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id', 
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.childCategories.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.parentCategory.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.parentCategory.childCategories.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            }
        ])
        ->whereNameSlug($slug)
            ->first([
                'id',
                'parent_id',
                "name_$language as name",
                'name_slug'
            ]);
    }

    /**
     * @param $categoryId
     * @param string $language
     * @return mixed
     */
    public function getCurrentCategoryByIdAndLanguage($categoryId, $language = Languages::DEFAULT_LANGUAGE)
    {
        return Category::with([
            'childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'childCategories.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.parentCategory' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.childCategories.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.parentCategory.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            },
            'parentCategory.parentCategory.childCategories.childCategories' => function ($query) use ($language) {
                $query->select(
                    'id',
                    'parent_id',
                    "name_$language as name",
                    'name_slug')
                    ->orderBy('name');
            }
        ])
            ->whereId($categoryId)
            ->first([
                'id',
                'parent_id',
                "name_$language as name",
                'name_slug'
            ]);
    }
    
    public function getCountCategoryProducts($currentCategory)
    {
        return ProductCategory::whereCategoryId($currentCategory->id)->count();
    }
    
}