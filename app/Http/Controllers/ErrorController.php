<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\ErrorService;
use App\ViewModels\ErrorViewModel;
use Illuminate\Http\Request;

class ErrorController extends LayoutController
{
    protected $errorService;

    public function __construct(ErrorService $errorService)
    {
        $this->errorService = $errorService;
    }


    public function index($error, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new ErrorViewModel($error, $language);

        $this->errorService->fill($model);

        return view("errors.$error", compact('model'));
    }
}
