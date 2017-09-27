<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Repositories\ProfileRepository;
use App\Repositories\WishListProductRepository;
use App\Repositories\WishListRepository;
use App\Services\ProfileService;
use App\ViewModels\Profile\WishlistViewModel;

class WishlistController extends LayoutController
{
    protected $profileService;

    protected $wishListRepository;
    
    protected $wishListProductRepository;
    
    public function __construct(ProfileService $profileService,
                                WishListRepository $wishListRepository,
                                WishListProductRepository $wishListProductRepository)
    {
        $this->profileService = $profileService;

        $this->wishListRepository = $wishListRepository;
        
        $this->wishListProductRepository = $wishListProductRepository;
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
    
    public function deleteFromWishList()
    {
        $wishListProductId = request('wishListProductId');
        
        $this->profileService->deleteFromWishList($wishListProductId);
        
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function addWishListProduct()
    {
        $language = request('language');

        if (auth()->check())
        {
            $user = auth()->user();

            $wishList = $this->wishListRepository->getWishList($user->id);

            $wishListId = $wishList->id;
        }
        else
        {
            return response()->json([
                'status' => 'error'
            ]);
        }

        $productId = request('productId');

        $this->profileService->addWishListProduct($wishListId, $productId);

        $wishListTotalCount = $this->wishListProductRepository->getCountWishListProducts($wishListId);

        $wishListProducts = $this->wishListProductRepository->getMiniWishListProducts($language, $wishListId);

        $miniWishListView = view('pages.profile.wish-list-mini', compact('wishListProducts', 'language'))->render();

        return response()->json([
            'status' => 'success',
            'wishListTotalCount' => $wishListTotalCount,
            'miniWishListView' => $miniWishListView
        ]);
    }

    public function initWishList()
    {
        $language = request('language');

        $wishListIds = null;

        $wishListTotalCount = 0;

        $miniWishListView = null;
        
        $wishListProducts = null;
        
        if (auth()->check())
        {
            $user = auth()->user();

            $wishList = $this->wishListRepository->getWishList($user->id);

            $wishListId = $wishList->id;

            $wishListIds = $this->wishListProductRepository->getInWishIds($wishListId);
            
            $wishListTotalCount = $this->wishListProductRepository->getCountWishListProducts($wishListId);

            $wishListProducts = $this->wishListProductRepository->getMiniWishListProducts($language, $wishListId);

            $miniWishListView = view('pages.profile.wish-list-mini', compact('wishListProducts', 'language'))->render();
        }


        return response()->json([
            'status' => 'success',
            'inWishIds' => $wishListIds,
            'wishListTotalCount' => $wishListTotalCount,
            'miniWishListView' => $miniWishListView
        ]);
    }
}
