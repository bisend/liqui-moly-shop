<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\HistoryService;
use App\Services\ProductService;
use App\ViewModels\ProductViewModel;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    public $productService;

    public $historyService;

    public function __construct(ProductService $productService, HistoryService $historyService)
    {
        $this->productService = $productService;
        $this->historyService = $historyService;
    }

    public function index($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new ProductViewModel($slug, $language);

        $this->productService->fill($model);

        $this->historyService->storeProduct($model->product->id);

        return view('pages.product.product', compact('model'));
    }
}