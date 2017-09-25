<?php

namespace App\ViewModels\Profile;

use App\ViewModels\LayoutViewModel;
use Illuminate\Database\Eloquent\Model;

class ChangePasswordViewModel extends LayoutViewModel
{
    public function __construct($language)
    {
        parent::__construct('change-password', $language);
    }
}
