<?php

namespace App\Services;


use App\Helpers\Languages;
use App\Repositories\CategoryRepository;

class LayoutService
{
    protected $categoryRepository;
    
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function fill($model)
    {
        $this->localizeApplication($model);
        $this->fillAllCategories($model);
    }
    
    private function localizeApplication($model)
    {
        Languages::localizeApp($model->language);
    }
    
    private function fillAllCategories($model)
    {
        $model->allCategories = $this->categoryRepository->getAllCategoriesByLanguage($model->language);
    }
}