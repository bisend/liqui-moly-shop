<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Services\ProfileService;
use App\ViewModels\Profile\MyOrdersViewModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class MyOrdersController
 * @package App\Http\Controllers\Profile
 */
class MyOrdersController extends LayoutController
{
    /**
     * @var ProfileService
     */
    protected $profileService;

    /**
     * MyOrdersController constructor.
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * @param int $page
     * @param string $language
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
