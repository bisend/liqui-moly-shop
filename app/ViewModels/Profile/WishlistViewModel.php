<?php

namespace App\ViewModels\Profile;

use App\ViewModels\LayoutViewModel;
use Illuminate\Database\Eloquent\Model;

class WishlistViewModel extends LayoutViewModel
{
    public $wishList;

    public $wishListProducts;

    public $countWishListProducts;

    public $wishListProductsLimit = 7;

    public $page = 1;

    public $wishListProductsOffset;

    public function __construct($page, $language)
    {
        parent::__construct('wish-list', $language);

        $this->page = $page;

        $this->wishListProductsOffset = ($this->page - 1) * $this->wishListProductsLimit;
    }
}
