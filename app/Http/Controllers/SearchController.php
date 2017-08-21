<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\SearchService;
use App\ViewModels\SearchAsyncViewModel;
use App\ViewModels\SearchViewModel;
use Illuminate\Support\Facades\View;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends LayoutController
{
    /**
     * @var SearchService
     */
    protected $searchService;

    /**
     * SearchController constructor.
     * @param SearchService $searchService
     */
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * render search page
     * @param null $series
     * @param string $language
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($series = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SearchViewModel($series, 'default', 1, $language);

        $this->searchService->fill($model);

        return view('pages.search.search', compact('model'));
    }

    /**
     * @param null $series
     * @param string $sort
     * @param string $language
     * @return mixed
     */
    public function indexSort($series = null, $sort = 'default', $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SearchViewModel($series, $sort, 1, $language);

        $this->searchService->fill($model);

        return view('pages.search.search', compact('model'));
    }

    /**
     * @param null $series
     * @param int $page
     * @param string $language
     * @return mixed
     */
    public function indexPagination($series = null, $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SearchViewModel($series, 'default', $page, $language);

        $this->searchService->fill($model);

        return view('pages.search.search', compact('model'));
    }

    /**
     * @param null $series
     * @param string $sort
     * @param int $page
     * @param string $language
     * @return mixed
     */
    public function indexPaginationSort($series = null, $sort = 'default', $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SearchViewModel($series, $sort, $page, $language);

        $this->searchService->fill($model);

        return view('pages.search.search', compact('model'));
    }

    /**
     * @param null $series
     * @param string $language
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexAsync($series = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SearchAsyncViewModel($series, $language);
        
        $this->searchService->fillAsync($model);
        
        if ($model->countSearchProducts > 0)
        {
            $view = View::make('partial.search-page.ajax-results-true', compact('model'))->render();
        }
        else
        {
            $view = View::make('partial.search-page.ajax-results-false', compact('model'))->render();
        }
        
        return response()->json([
            'status' => 'success',
            'view' => $view
        ]);
    }
}
