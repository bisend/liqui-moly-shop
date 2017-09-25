<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Services\ProfileService;
use App\ViewModels\Profile\WishlistViewModel;

class WishlistController extends LayoutController
{
    protected $profileService;
    
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    
    public function index($page, $language = Languages::DEFAULT_LANGUAGE)
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

        $model = new WishlistViewModel($page, $language);

        $this->profileService->fill($model);

        $this->profileService->fillWishList($model, $user);

        $this->profileService->fillCountWishListProducts($model);

        $this->profileService->fillWishListProducts($model);

        return view('pages.profile.wish-list', compact('model'));
    }
}
