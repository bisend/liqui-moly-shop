<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\CategoryService;
use App\Services\HistoryService;
use App\ViewModels\CategoryViewModel;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends LayoutController
{
    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @var HistoryService
     */
    protected $historyService;

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     * @param HistoryService $historyService
     */
    public function __construct(CategoryService $categoryService, HistoryService $historyService)
    {
        $this->categoryService = $categoryService;

        $this->historyService = $historyService;
    }

    /**
     * @param string $language
     * @return mixed
     */
    public function index($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new CategoryViewModel($slug, 'default', 1, $language);
        
        $this->categoryService->fill($model);

        $this->historyService->fillVisitedProducts($model);

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
        $model = new CategoryViewModel($slug, 'default', $page, $language);
        
        $this->categoryService->fill($model);

        $this->historyService->fillVisitedProducts($model);

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
        $model = new CategoryViewModel($slug, $sort, 1, $language);

        $this->categoryService->fill($model);

        $this->historyService->fillVisitedProducts($model);

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
        $model = new CategoryViewModel($slug, $sort, $page, $language);

        $this->categoryService->fill($model);

        $this->historyService->fillVisitedProducts($model);

        return view('pages.category.category', compact('model'));
    }
}
