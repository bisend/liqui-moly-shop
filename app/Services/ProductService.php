<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 15.08.2017
 * Time: 10:25
 */

namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class ProductService extends LayoutService
{
    protected $productRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
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

        $this->fillProduct($model);

        $this->fillCurrentCategory($model);
        
        $this->fillProductProperties($model);
    }

    /**
     * @param $model
     */
    private function fillProduct($model)
    {
        $model->product = $this->productRepository->getProductBySlugAndLanguage($model->productSlug, $model->language);
    }

    /**
     * @param $model
     */
    private function fillCurrentCategory($model)
    {
        $model->currentCategory = $this->categoryRepository->getCurrentCategoryByIdAndLanguage($model->product->category_id, $model->language);
    }

    /**
     * @param $model
     */
    private function fillProductProperties($model)
    {
        $model->properties = $this->productRepository->getProductProperties($model->product->id, $model->language);
    }
}