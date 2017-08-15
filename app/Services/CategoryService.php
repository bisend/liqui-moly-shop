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
    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {
        parent::__construct($categoryRepository);
        
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
    }

    /**
     * @param $model
     */
    private function fillCurrentCategory($model)
    {
        $model->currentCategory = $this->categoryRepository->getCurrentCategoryBySlugAndLanguage($model->slug, $model->language);
    }

    /**
     * @param $model
     */
    private function fillCountCategoryProducts($model)
    {
        $model->countCategoryProducts = $this->categoryRepository->getCountCategoryProducts($model->currentCategory);
    }

    /**
     * @param $model
     */
    private function fillCategoryProducts($model)
    {
//        $model->categoryProducts = $this->categoryRepository->getAllProductsForCategoryByLanguage($model->currentCategory, $model->language);
        $model->categoryProducts = $this->productRepository->getAllProductsForCategoryByLanguage($model->currentCategory, $model->sort, $model->categoryProductsLimit, $model->categoryProductsOffset, $model->language);
        
        if ($model->page != '1' && $model->categoryProducts->count() == 0 )
        {
            abort(404);
        }
    }
    
    private function fillCategoryTopSalesProducts($model)
    {
        $model->categoryTopSalesProducts = $this->productRepository->getTopSalesProductsByLanguage($model->language);
    }
    
    private function fillCategoryNoveltyProducts($model)
    {
        $model->categoryNoveltyProducts = $this->productRepository->getNoveltyProductsByLanguage($model->language);
    }
}