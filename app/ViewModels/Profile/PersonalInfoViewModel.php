<?php

namespace App\ViewModels\Profile;

use App\ViewModels\LayoutViewModel;
use Illuminate\Database\Eloquent\Model;

class PersonalInfoViewModel extends LayoutViewModel
{
    public $profile;
    
    public $deliveries;
    
    public $payments;
    
    public function __construct($language)
    {
        parent::__construct('personal-info', $language);
    }
}
