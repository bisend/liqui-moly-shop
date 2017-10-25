<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 25.10.2017
 * Time: 12:07
 */

namespace App\ViewModels;

/**
 * Class GuaranteesViewModel
 * @package App\ViewModels
 */
class GuaranteesViewModel extends LayoutViewModel
{
    /**
     * GuaranteesViewModel constructor.
     * @param null $language
     */
    public function __construct($language)
    {
        parent::__construct('guarantees', $language);
    }
}