<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Services\ProfileService;
use App\ViewModels\Profile\MyOrdersViewModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyOrdersController extends LayoutController
{
    protected $profileService;
    
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    
    public function index($page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
        if (!auth()->check())
        {
            return redirect(url_home($language));
        }

        if ($page == 'uk')
        {
            $page = 1;
            $language = 'uk';
        }

        if ($page == 'ru')
        {
            $page = 1;
            $language = 'ru';
        }

        $user = auth()->user();

        $model = new MyOrdersViewModel($page, $language);
        
        $this->profileService->fill($model);

        $this->profileService->fillCountOrders($model, $user);
        
        $this->profileService->fillOrders($model, $user);

        $this->profileService->fillPayments($model);

        $this->profileService->fillDeliveries($model);

        return view('pages.profile.my-orders', compact('model'));
    }
}
