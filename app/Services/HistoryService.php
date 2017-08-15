<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 15.08.2017
 * Time: 15:44
 */

namespace App\Services;


use App\Repositories\ProductRepository;
use Session;

class HistoryService
{
    protected $productRepository;

    protected $sessionKey = 'visitedProducts';

    protected $items = [];

    protected $maxElements = 10;

    /**
     * HistoryService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param $productId
     */
    public function storeProduct($productId)
    {
        $this->items = Session::pull($this->sessionKey);

        if (count($this->items) != 0)
        {
            if (!in_array($productId, $this->items))
            {
                if (count($this->items) == $this->maxElements)
                {
                    array_pop($this->items);
                }
                array_unshift($this->items, $productId);
            }
        }
        else
        {
            $this->items[] = $productId;
        }

        Session::put($this->sessionKey, $this->items);
    }

    /**
     * @param $model
     */
    public function fillVisitedProducts($model)
    {
        $this->items = Session::get($this->sessionKey);
        
        $model->visitedProducts = $this->productRepository->getVisitedProducts($this->items, $model->language);
    }
}