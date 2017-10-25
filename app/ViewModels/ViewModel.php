<?php

namespace App\ViewModels;

use App\Helpers\Languages;

/**
 * Class ViewModel
 * @package App\ViewModels
 */
abstract class ViewModel
{
    /**
     * @var null
     */
    public $view;

    /**
     * @var string
     */
    public $language;

    /**
     * ViewModel constructor.
     * @param null $view
     * @param string $language
     */
    function __construct($view = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $this->view = $view;
        $this->language = $language;
    }
}