<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\HistoryService;
use App\Services\HomeService;
use App\ViewModels\HomeViewModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends LayoutController
{
    /**
     * @var HomeService
     */
    protected $homeService;

    /**
     * @var HistoryService
     */
    protected $historyService;

    /**
     * HomeController constructor.
     * @param HomeService $homeService
     * @param HistoryService $historyService
     */
    public function __construct(HomeService $homeService, HistoryService $historyService)
    {
        $this->homeService = $homeService;

        $this->historyService = $historyService;
    }

    /**
     * @param string $language
     * @return mixed
     */
    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new HomeViewModel($language);

        $this->homeService->fill($model);

        $this->historyService->fillVisitedProducts($model);
        
        return view('pages.home.home', compact('model'));
    }
}
