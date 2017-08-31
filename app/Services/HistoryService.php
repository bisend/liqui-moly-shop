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

/**
 * Class HistoryService
 * @package App\Services
 */
class HistoryService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var string
     */
    protected $sessionKey = 'visitedProducts';

    /**
     * @var array
     */
    protected $productIds = [];

    /**
     * @var int
     */
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
     * store product ID in session
     * @param $productId
     */
    public function storeProduct($productId)
    {
        $this->productIds = Session::pull($this->sessionKey);

        if (count($this->productIds) != 0)
        {
            if (!in_array($productId, $this->productIds))
            {
                if (count($this->productIds) == $this->maxElements)
                {
                    array_pop($this->productIds);
                }
                array_unshift($this->productIds, $productId);
            }
        }
        else
        {
            $this->productIds[] = $productId;
        }

        Session::put($this->sessionKey, $this->productIds);
    }

    /**
     * fill visited products by session products ids
     * @param $model
     */
    public function fillVisitedProducts($model)
    {
        $this->productIds = Session::get($this->sessionKey);

        if ($this->productIds != null)
        {
            $model->visitedProducts = $this->productRepository->getVisitedProducts($this->productIds, $model->language);
        }
    }
}