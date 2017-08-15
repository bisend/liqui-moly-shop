<?php

namespace App\ViewModels;

use App\Helpers\Languages;
use Illuminate\Database\Eloquent\Model;

abstract class LayoutViewModel extends ViewModel
{
    public $allCategories;

    /**
     * LayoutViewModel constructor.
     * @param null $view
     * @param string $language
     */
    function __construct($view = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        parent::__construct($view, $language);
    }
}
