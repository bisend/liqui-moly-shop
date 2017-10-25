<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\AboutService;
use App\ViewModels\AboutViewModel;

/**
 * Class AboutController
 * @package App\Http\Controllers
 */
class AboutController extends LayoutController
{
    /**
     * @var AboutService
     */
    protected $aboutService;

    /**
     * AboutController constructor.
     * @param AboutService $aboutService
     */
    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    /**
     * @param string $language
     * @return mixed
     */
    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new AboutViewModel($language);

        $this->aboutService->fill($model);

        return view('pages.about.about', compact('model'));
    }
}
