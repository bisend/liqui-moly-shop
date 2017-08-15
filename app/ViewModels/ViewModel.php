<?php

namespace App\ViewModels;


use App\Helpers\Languages;

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

    function __construct($view = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $this->view = $view;
        $this->language = $language;
    }
}