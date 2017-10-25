<?php

namespace App\ViewModels\Profile;

use App\ViewModels\LayoutViewModel;

/**
 * Class WishlistViewModel
 * @package App\ViewModels\Profile
 */
class WishlistViewModel extends LayoutViewModel
{
    /**
     * @var
     */
    public $wishList;

    /**
     * @var
     */
    public $wishListProducts;

    /**
     * @var
     */
    public $countWishListProducts;

    /**
     * @var int
     */
    public $wishListProductsLimit = 7;

    /**
     * @var int|null
     */
    public $page = 1;

    /**
     * @var int|null
     */
    public $wishListProductsOffset;

    /**
     * WishlistViewModel constructor.
     * @param null $page
     * @param string $language
     */
    public function __construct($page, $language)
    {
        parent::__construct('wish-list', $language);

        $this->page = $page;

        $this->wishListProductsOffset = ($this->page - 1) * $this->wishListProductsLimit;
    }
}
