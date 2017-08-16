<?php

namespace App\Services;


use App\Helpers\Languages;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class LayoutService
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * LayoutService constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param $model
     */
    public function fill($model)
    {
        $this->localizeApplication($model);
        
        $this->fillAllCategories($model);

        $this->fillRecommendedProducts($model);

        $this->fillBestDiscountsProducts($model);

        $this->fillPopularProducts($model);
    }

    /**
     * set locale APP
     * @param $model
     */
    private function localizeApplication($model)
    {
        Languages::localizeApp($model->language);
    }

    /**
     * fill all categories for main header menu
     * @param $model
     */
    private function fillAllCategories($model)
    {
        $model->allCategories = $this->categoryRepository->getAllCategoriesByLanguage($model->language);
    }

    /**
     * fill recommended products
     * @param $model
     */
    private function fillRecommendedProducts($model)
    {
        $model->recommendedProducts = $this->productRepository->getRecommendedProducts($model->language);
    }

    /**
     * fill best discounts products
     * @param $model
     */
    private function fillBestDiscountsProducts($model)
    {
        $model->bestDiscountsProducts = $this->productRepository->getBestDiscountsProducts($model->language);
    }

    /**
     * fill popular products
     * @param $model
     */
    private function fillPopularProducts($model)
    {
        $model->popularProducts = $this->productRepository->getPopularProducts($model->language);
    }
}