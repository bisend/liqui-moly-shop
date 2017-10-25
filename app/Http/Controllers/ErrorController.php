<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\ErrorService;
use App\ViewModels\ErrorViewModel;

/**
 * Class ErrorController
 * @package App\Http\Controllers
 */
class ErrorController extends LayoutController
{
    /**
     * @var ErrorService
     */
    protected $errorService;

    /**
     * ErrorController constructor.
     * @param ErrorService $errorService
     */
    public function __construct(ErrorService $errorService)
    {
        $this->errorService = $errorService;
    }
    
    /**
     * @param $error
     * @param string $language
     * @return mixed
     */
    public function index($error, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new ErrorViewModel($error, $language);

        $this->errorService->fill($model);

        return view("errors.$error", compact('model'));
    }
}
