<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 14.08.2017
 * Time: 12:05
 */

namespace App\Helpers;

/**
 * Class ProductsSortItems
 * @package App\Helpers
 */
class ProductsSortItems
{
    /**
     * @var
     */
    public $sortSlug;

    public $name;

    public $url;

    public $url_search;

    public $isSelected = false;

    public $isVisible = true;

    /**
     * ProductsSortItems constructor.
     * @param $slug
     * @param $sortSlug
     * @param $page
     * @param string $language
     * @param $sort
     */
    public function __construct($slug, $sortSlug, $page, $language = Languages::DEFAULT_LANGUAGE, $sort)
    {
        $this->sortSlug = $sortSlug;
        $this->name = trans('sort-menu.' . $sortSlug);
        
        $this->url = '/category';
        $this->url .= ('/' . $slug);
        $this->url .= ($sortSlug == 'default' ? '' : ('/' . $sortSlug));
        $this->url .= ($page == 1 ? '' : ('/' . $page));
        $this->url .= ($language == Languages::DEFAULT_LANGUAGE ? '' : ('/' . $language));

        $this->url_search = '/search';
        $this->url_search .= ('/' . $slug);
        $this->url_search .= ($sortSlug == 'default' ? '' : ('/' . $sortSlug));
        $this->url_search .= ($page == 1 ? '' : ('/' . $page));
        $this->url_search .= ($language == Languages::DEFAULT_LANGUAGE ? '' : ('/' . $language));
        
        if ($sort == $sortSlug)
        {
            $this->isSelected = true;
            $this->isVisible = false;
        }
    }
}