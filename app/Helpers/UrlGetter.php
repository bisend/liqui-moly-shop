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

if (!function_exists('url_confirmation'))
{
    function url_confirmation($confirmationToken = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        return UrlBuilder::confirmation($confirmationToken, $language);
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

// ---------------------------------------------------------------------------------------------------------------------
/**
 * url_search
 */
if (!function_exists('url_search')) {

    /**
     * Get the search page url
     *
     * @param null|string $series
     * @param string $language
     *
     * @return null|string
     */
    function url_search($series = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        return UrlBuilder::search($series, $language);
    }
}

// ---------------------------------------------------------------------------------------------------------------------
/**
 * url_search_per_page
 */
if (!function_exists('url_search_per_page')) {

    /**
     * Get the search(per page) page url
     *
     * @param null|string $series
     * @param int $page
     * @param string $language
     *
     * @return string
     */
    function url_search_per_page($series = null, $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
        return UrlBuilder::searchPerPage($series, $page, $language);
    }
}