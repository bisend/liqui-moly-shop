<?php

namespace App\ViewModels\Profile;

use App\ViewModels\LayoutViewModel;

/**
 * Class PersonalInfoViewModel
 * @package App\ViewModels\Profile
 */
class PersonalInfoViewModel extends LayoutViewModel
{
    /**
     * @var
     */
    public $profile;

    /**
     * @var
     */
    public $deliveries;

    /**
     * @var
     */
    public $payments;

    /**
     * PersonalInfoViewModel constructor.
     * @param null $language
     */
    public function __construct($language)
    {
        parent::__construct('personal-info', $language);
    }
}
