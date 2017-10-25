<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\GuaranteesService;
use App\ViewModels\GuaranteesViewModel;

/**
 * Class GuaranteesController
 * @package App\Http\Controllers
 */
class GuaranteesController extends LayoutController
{
    /**
     * @var GuaranteesService
     */
    protected $guaranteesService;

    /**
     * GuaranteesController constructor.
     * @param GuaranteesService $guaranteesService
     */
    public function __construct(GuaranteesService $guaranteesService)
    {
        $this->guaranteesService = $guaranteesService;
    }

    /**
     * @param string $language
     * @return mixed
     */
    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new GuaranteesViewModel($language);

        $this->guaranteesService->fill($model);

        return view('pages.guarantees.guarantees', compact('model'));
    }
}
