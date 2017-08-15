<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\CategoryService;
use App\ViewModels\CategoryViewModel;

class CategoryController extends LayoutController
{
    protected $categoryService;
    
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @param string $language
     * @return mixed
     */
    public function index($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new CategoryViewModel($slug, 'default', 1, $language);
        
        $this->categoryService->fill($model);

        return view('pages.category.category', compact('model'));
    }

    /**
     * @param null $slug
     * @param int $page
     * @param string $language
     * @return mixed
     */
    public function indexPagination($slug = null, $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
//        dd($slug, $page, $language);
        $model = new CategoryViewModel($slug, 'default', $page, $language);
        
        $this->categoryService->fill($model);

        return view('pages.category.category', compact('model'));
    }

    /**
     * @param null $slug
     * @param string $sort
     * @param string $language
     * @return mixed
     */
    public function indexSort($slug = null, $sort = 'default', $language = Languages::DEFAULT_LANGUAGE)
    {
//        dd($slug, $sort, $language);
        $model = new CategoryViewModel($slug, $sort, 1, $language);

        $this->categoryService->fill($model);

        return view('pages.category.category', compact('model'));
    }

    /**
     * @param null $slug
     * @param string $sort
     * @param int $page
     * @param string $language
     * @return mixed
     */
    public function indexPaginationSort($slug = null, $sort = 'default', $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
//        dd($slug, $sort, $page, $language);
        $model = new CategoryViewModel($slug, $sort, $page, $language);

        $this->categoryService->fill($model);

        return view('pages.category.category', compact('model'));
    }
}
