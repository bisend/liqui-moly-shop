<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 25.10.2017
 * Time: 12:17
 */

namespace App\ViewModels;

/**
 * Class AboutViewModel
 * @package App\ViewModels
 */
class AboutViewModel extends LayoutViewModel
{
    /**
     * AboutViewModel constructor.
     * @param null $language
     */
    public function __construct($language)
    {
        parent::__construct('about', $language);
    }
}