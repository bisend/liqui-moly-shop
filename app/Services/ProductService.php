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
use Session;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService extends LayoutService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * ProductService constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
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

        $this->fillProduct($model);

        $this->fillCurrentCategory($model);
        
        $this->fillProductProperties($model);
    }

    /**
     * fill single product
     * @param $model
     */
    private function fillProduct($model)
    {
        $model->product = $this->productRepository->getProductBySlugAndLanguage($model->productSlug, $model->language);
        
        if (Session::has('cart.' . $model->product->id))
        {
            $item = Session::get('cart.' . $model->product->id);
            $model->product->productCount = $item['productCount'];
        }

        if ($model->product == null)
        {
            abort(404);
        }
    }

    /**
     * fill current category with related categories
     * @param $model
     */
    private function fillCurrentCategory($model)
    {
        $model->currentCategory = $this->categoryRepository->getCurrentCategoryByIdAndLanguage($model->product->category_id, $model->language);
    }

    /**
     * fill product properties
     * @param $model
     */
    private function fillProductProperties($model)
    {
        $model->properties = $this->productRepository->getProductProperties($model->product->id, $model->language);
    }

    /**
     * increase product number of views
     * @param $model
     */
    public function incrementProductNumberOfViews($model)
    {
        $this->productRepository->incrementProductNumberOfViews($model);
    }
}