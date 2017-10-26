<?php

namespace App\Services;

use App\Repositories\BottomBannerRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MainSliderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TopBannerRepository;

/**
 * Class HomeService
 * @package App\Services
 */
class HomeService extends LayoutService
{
    /**
     * @var MainSliderRepository
     */
    protected $mainSliderRepository;

    /**
     * @var TopBannerRepository
     */
    protected $topBannerRepository;

    /**
     * @var BottomBannerRepository
     */
    protected $bottomBannerRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;


    /**
     * HomeService constructor.
     * @param CategoryRepository $categoryRepository
     * @param MainSliderRepository $mainSliderRepository
     * @param TopBannerRepository $topBannerRepository
     * @param BottomBannerRepository $bottomBannerRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        MainSliderRepository $mainSliderRepository,
        TopBannerRepository $topBannerRepository,
        BottomBannerRepository $bottomBannerRepository,
        ProductRepository $productRepository
    )
    {
        parent::__construct($categoryRepository, $productRepository);

        $this->mainSliderRepository = $mainSliderRepository;

        $this->topBannerRepository = $topBannerRepository;

        $this->bottomBannerRepository = $bottomBannerRepository;

        $this->productRepository = $productRepository;
    }

    /**
     * @param $model
     */
    public function fill($model)
    {
        parent::fill($model);

        $this->fillMainSlider($model);
        
        $this->fillTopBanner($model);
        
        $this->fillBottomBanner($model);

        $this->fillTopSales($model);

        $this->fillNovelty($model);

        $this->fillSeasonalGoods($model);
        
        $this->fillPromotionalProduct($model);

        $this->fillMeta($model);
    }

    /**
     * fill main slider
     * @param $model
     */
    private function fillMainSlider($model)
    {
        $model->mainSlider = $this->mainSliderRepository->getMainSliderByLanguage($model->language);
    }

    /**
     * fill top banner
     * @param $model
     */
    private function fillTopBanner($model)
    {
        $model->topBanner = $this->topBannerRepository->getTopBannerByLanguage($model->language);
    }

    /**
     * fill bottom banner
     * @param $model
     */
    private function fillBottomBanner($model)
    {
        $model->bottomBanner = $this->bottomBannerRepository->getBottomBannerByLanguage($model->language);
    }

    /**
     * fill top sales
     * @param $model
     */
    private function fillTopSales($model)
    {
        $model->topSales = $this->productRepository->getTopSalesProductsByLanguage($model->language);
    }

    /**
     * fill novelty products
     * @param $model
     */
    private function fillNovelty($model)
    {
        $model->novelty = $this->productRepository->getNoveltyProductsByLanguage($model->language);
    }

    /**
     * fill seasonal products
     * @param $model
     */
    private function fillSeasonalGoods($model)
    {
        $model->seasonalGoods = $this->productRepository->getSeasonalGoodsByLanguage($model->language);
    }

    /**
     * fill promotional product
     * @param $model
     */
    private function fillPromotionalProduct($model)
    {
        $model->promotionalProduct = $this->productRepository->getPromotionalProductByLanguage($model->language);
    }

    /**
     * fill meta tags
     * @param $model
     */
    private function fillMeta($model)
    {
        $model->title = trans('meta.home_page_title');
    }
    
}