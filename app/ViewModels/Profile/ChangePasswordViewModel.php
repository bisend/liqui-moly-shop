<?php

namespace App\ViewModels\Profile;

use App\ViewModels\LayoutViewModel;

/**
 * Class ChangePasswordViewModel
 * @package App\ViewModels\Profile
 */
class ChangePasswordViewModel extends LayoutViewModel
{
    /**
     * ChangePasswordViewModel constructor.
     * @param null $language
     */
    public function __construct($language)
    {
        parent::__construct('change-password', $language);
    }
}
