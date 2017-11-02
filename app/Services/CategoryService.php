<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 04.08.2017
 * Time: 12:50
 */

namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

/**
 * Class CategoryService
 * @package App\Services
 */
class CategoryService extends LayoutService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository
    )
    {
        parent::__construct($categoryRepository, $productRepository);
        
        $this->productRepository = $productRepository;
    }

    /**
     * @param $model
     */
    public function fill($model)
    {
        parent::fill($model);

        $this->fillCurrentCategory($model);

        $this->fillCountCategoryProducts($model);

        $this->fillCategoryProducts($model);
        
        $this->fillCategoryTopSalesProducts($model);
        
        $this->fillCategoryNoveltyProducts($model);

        $this->fillMeta($model);
    }

    /**
     * fill current category with related categories 
     * @param $model
     */
    private function fillCurrentCategory($model)
    {
        $model->currentCategory = $this->categoryRepository->getCurrentCategoryBySlugAndLanguage($model->slug, $model->language);

        if ($model->currentCategory == null)
        {
            abort(404);
        }
    }

    /**
     * fill count with number of category products
     * @param $model
     */
    private function fillCountCategoryProducts($model)
    {
        $model->countCategoryProducts = $this->categoryRepository->getCountCategoryProducts($model->currentCategory);
    }

    /**
     * fill categoryProducts with products related to this category, and sort it
     * @param $model
     */
    private function fillCategoryProducts($model)
    {
        if ($model->categoryProductsOffset >= $model->countCategoryProducts)
        {
            abort(404);
        }

        $model->categoryProducts = $this->productRepository->getAllProductsForCategoryByLanguage($model->currentCategory, $model->sort, $model->categoryProductsLimit, $model->categoryProductsOffset, $model->language);
        
        if ($model->page != '1' && $model->categoryProducts->count() == 0 )
        {
            abort(404);
        }
    }

    /**
     * fill categories sidebar top sales products
     * @param $model
     */
    private function fillCategoryTopSalesProducts($model)
    {
        $model->categoryTopSalesProducts = $this->productRepository->getTopSalesProductsByLanguage($model->language);
    }

    /**
     * fill categories sidebar novelty products
     * @param $model
     */
    private function fillCategoryNoveltyProducts($model)
    {
        $model->categoryNoveltyProducts = $this->productRepository->getNoveltyProductsByLanguage($model->language);
    }

    /**
     * fill meta tags
     * @param $model
     */
    private function fillMeta($model)
    {
        $model->title = $model->currentCategory->name . " | " . trans('meta.buy') . " " . $model->currentCategory->name . " " . trans('meta.best_prices');
    }
}