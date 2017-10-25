<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ErrorViewModel
 * @package App\ViewModels
 */
class ErrorViewModel extends LayoutViewModel
{
    /**
     * @var null
     */
    public $error;

    /**
     * ErrorViewModel constructor.
     * @param null $error
     * @param string $language
     */
    public function __construct($error = null, $language)
    {
        parent::__construct('error', $language);

        $this->error = $error;
    }
}
