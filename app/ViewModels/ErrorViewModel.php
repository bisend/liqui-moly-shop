<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

class ErrorViewModel extends LayoutViewModel
{
    public $error;

    public function __construct($error = null, $language)
    {
        parent::__construct('error', $language);

        $this->error = $error;
    }
}
