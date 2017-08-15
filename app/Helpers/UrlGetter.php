<?php

use App\Helpers\Languages;
use App\Helpers\UrlBuilder;


// ---------------------------------------------------------------------------------------------------------------------
/**
 * url_home
 */
if (!function_exists('url_home')) {

    /**
     * Get the home page url
     *
     * @param string $language
     *
     * @return string
     */
    function url_home($language = Languages::DEFAULT_LANGUAGE)
    {
        return UrlBuilder::home($language);
    }
}

// ---------------------------------------------------------------------------------------------------------------------
/**
 * url_current
 */
if (!function_exists('url_current')) {

    /**
     * Get the current page url
     *
     * @param string $language
     * @return string
     */
    function url_current($language = Languages::DEFAULT_LANGUAGE)
    {
        return UrlBuilder::current($language);
    }
}



// ---------------------------------------------------------------------------------------------------------------------
/**
 * url_category
 */
if (!function_exists('url_category')) {

    /**
     * Get the category page url
     *
     * @param null|string $slug
     * @param string $language
     *
     * @return string
     */
    function url_category($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        return UrlBuilder::category($slug, $language);
    }
}

// ---------------------------------------------------------------------------------------------------------------------
/**
 * url_category_per_page
 */
if (!function_exists('url_category_per_page')) {

    /**
     * Get the category(per page) page url
     *
     * @param null|string $slug
     * @param int $page
     * @param string $language
     *
     * @return string
     */
    function url_category_per_page($slug = null, $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
        return UrlBuilder::categoryPerPage($slug, $page, $language);
    }
}


// ---------------------------------------------------------------------------------------------------------------------
/**
 * url_product
 */
if (!function_exists('url_product')) {

    /**
     * Get the product page url
     *
     * @param null|string $slug
     * @param string $language
     *
     * @return string
     */
    function url_product($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        return UrlBuilder::product($slug, $language);
    }
}