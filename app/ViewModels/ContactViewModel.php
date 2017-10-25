<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 25.10.2017
 * Time: 12:17
 */

namespace App\ViewModels;

/**
 * Class ContactViewModel
 * @package App\ViewModels
 */
class ContactViewModel extends LayoutViewModel
{
    /**
     * ContactViewModel constructor.
     * @param null $language
     */
    public function __construct($language)
    {
        parent::__construct('contact', $language);
    }
}