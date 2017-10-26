<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 25.10.2017
 * Time: 12:17
 */

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

/**
 * Class ContactService
 * @package App\Services
 */
class ContactService extends LayoutService
{
    /**
     * ContactService constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        parent::__construct($categoryRepository, $productRepository);
    }

    /**
     * @param $model
     */
    public function fill($model)
    {
        parent::fill($model); // TODO: Change the autogenerated stub

        $this->fillMeta($model);
    }

    /**
     * fill meta tags
     * @param $model
     */
    private function fillMeta($model)
    {
        $model->title = trans('meta.contact_page_title');
    }
}