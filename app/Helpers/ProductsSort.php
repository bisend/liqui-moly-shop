<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 14.08.2017
 * Time: 11:54
 */

namespace App\Helpers;

/**
 * Class ProductsSort
 * @package App\Helpers
 */
class ProductsSort
{
    /**
     * Sort items collection
     *
     * @var array
     */
    public $items = [];

    /**
     * @var array
     */
    public $sortSlugs = [
        'default',
        'price-asc',
        'price-desc'
    ];

    /**
     * ProductsSort constructor.
     * @param null $slug
     * @param int $page
     * @param string $language
     * @param $sort
     */
    public function __construct($slug = null, $page = 1, $language = Languages::DEFAULT_LANGUAGE, $sort)
    {
        Languages::localizeApp($language);
        $this->buildItems($slug, $page, $language, $sort);
    }

    /**
     * @param $slug
     * @param $page
     * @param $language
     * @param $sort
     * @return array
     */
    public function buildItems($slug, $page, $language, $sort)
    {

        foreach ($this->sortSlugs as $sortSlug)
        {
            $this->items[] = new ProductsSortItems($slug, $sortSlug, $page, $language, $sort);
        }

        return $this->items;
    }
}