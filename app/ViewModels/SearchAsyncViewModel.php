<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 19.08.2017
 * Time: 11:34
 */

namespace App\ViewModels;

use App\Helpers\Languages;

/**
 * Class SearchAsyncViewModel
 * @package App\ViewModels
 */
class SearchAsyncViewModel
{
    public $searchProducts;
    
    public $countSearchProducts;
    
    public $language;
    
    public $series;

    /**
     * SearchAsyncViewModel constructor.
     * @param null $series
     * @param string $language
     */
    public function __construct($series = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $this->series = $series;
        $this->language = $language;
    }
}