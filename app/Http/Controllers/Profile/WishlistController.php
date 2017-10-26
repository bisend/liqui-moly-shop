<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Repositories\ProfileRepository;
use App\Repositories\WishListProductRepository;
use App\Repositories\WishListRepository;
use App\Services\ProfileService;
use App\ViewModels\Profile\WishlistViewModel;

/**
 * Class WishlistController
 * @package App\Http\Controllers\Profile
 */
class WishlistController extends LayoutController
{
    /**
     * @var ProfileService
     */
    protected $profileService;

    /**
     * @var WishListRepository
     */
    protected $wishListRepository;

    /**
     * @var WishListProductRepository
     */
    protected $wishListProductRepository;

    /**
     * WishlistController constructor.
     * @param ProfileService $profileService
     * @param WishListRepository $wishListRepository
     * @param WishListProductRepository $wishListProductRepository
     */
    public function __construct(ProfileService $profileService,
                                WishListRepository $wishListRepository,
                                WishListProductRepository $wishListProductRepository)
    {
        $this->profileService = $profileService;

        $this->wishListRepository = $wishListRepository;
        
        $this->wishListProductRepository = $wishListProductRepository;
    }

    /**
     * @param $page
     * @param string $language
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

        Languages::localizeApp($language);

        $user = auth()->user();

        $model = new WishlistViewModel($page, $language);

        $this->profileService->fill($model);

        $this->profileService->fillWishList($model, $user);

        $this->profileService->fillCountWishListProducts($model);

        $this->profileService->fillWishListProducts($model);

        $model->title = trans('meta.wish_list_page_title');

        return view('pages.profile.wish-list', compact('model'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFromWishList()
    {
        $wishListProductId = request('wishListProductId');

        $language = request('language');

        Languages::localizeApp($language);

        $page = request('page');

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
        
        $this->profileService->deleteFromWishList($wishListProductId);

        $model = new WishlistViewModel($page, $language);

        $this->profileService->fill($model);

        $this->profileService->fillWishList($model, $user);

        $this->profileService->fillCountWishListProducts($model);

        $this->profileService->fillWishListProducts($model);

        if ($page > 1 && $model->wishListProducts->count() < 1)
        {
            $page -= 1;

            $model = new WishlistViewModel($page, $language);

            $this->profileService->fill($model);

            $this->profileService->fillWishList($model, $user);

            $this->profileService->fillCountWishListProducts($model);

            $this->profileService->fillWishListProducts($model);
        }

        $wishListTotalCount = $this->wishListProductRepository->getCountWishListProducts($wishListId);

        $wishListProducts = $this->wishListProductRepository->getMiniWishListProducts($language, $wishListId);

        $miniWishListView = view('pages.profile.wish-list-mini', compact('wishListProducts', 'language'))->render();
        
        $bigWishListView = view('pages.profile.wish-list-big', compact('model', 'language'))->render();
        
        return response()->json([
            'status' => 'success',
            'wishListTotalCount' => $wishListTotalCount,
            'miniWishListView' => $miniWishListView,
            'bigWishListView' => $bigWishListView,
            'page' => $page
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function addWishListProduct()
    {
        $language = request('language');

        Languages::localizeApp($language);

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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function initWishList()
    {
        $language = request('language');

        Languages::localizeApp($language);

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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function initWishListView()
    {
        $page = request('page');

        $language = request('language');

        Languages::localizeApp($language);

        $user = auth()->user();

        $model = new WishlistViewModel($page, $language);

        $this->profileService->fill($model);

        $this->profileService->fillWishList($model, $user);

        $this->profileService->fillCountWishListProducts($model);

        $this->profileService->fillWishListProducts($model);

        $bigWishListView = view('pages.profile.wish-list-big', compact('model', 'wishListProducts', 'language'))->render();
        
        return response()->json([
            'status' => 'success',
            'bigWishListView' => $bigWishListView
        ]);
    }
}
