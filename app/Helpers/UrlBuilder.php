<?php

namespace App\Helpers;

class UrlBuilder
{
    /**
     * Constants
     */

    /**
     * Url root sign
     *
     * @var string
     */
    const URL_ROOT = '/';

    /**
     * Home page
     *
     * @var string
     */
    const HOME_PAGE = 'home';

    /**
     * Category page
     *
     * @var string
     */
    const CATEGORY_PAGE = 'category';

    /**
     * Product page
     *
     * @var string
     */
    const PRODUCT_PAGE = 'product';

    /**
     * Contacts page
     *
     * @var string
     */
    const CONTACTS_PAGE = 'contacts';

    /**
     * About page
     *
     * @var string
     */
    const ABOUT_PAGE = 'about';

    /**
     * Search page
     *
     * @var string
     */
    const SEARCH_PAGE = 'search';

    /**
     * Search async method name
     *
     * @var string
     */
    const SEARCH_ASYNC_METHOD = 'async';

    /**
     * Errors page
     *
     * @var string
     */
    const ERROR_PAGE = 'errors';

    /**
     * Url parts separator
     *
     * @var string
     */
    const URL_PARTS_SEPARATOR = '/';

    /**
     * Default url query series param
     *
     * @var string
     */
    const SERIES_PARAM = '_SERIES_';

    /**
     * Url query series separator(?param1=arg1+arg2&param2=...)
     *
     * @var string
     */
    const SERIES_SEPARATOR = '+';

    /**
     * Undefined url(null)
     *
     * @var string
     */
    const UNDEFINED_URL = '#header';

    /**
     * Undefined url part
     *
     * @var string
     */
    const UNDEFINED_URL_PART = '';

    /**
     * Undefined error url(null)
     *
     * @var string
     */
    const UNDEFINED_ERROR_URL = '404';

    /**
     * Url param values pair separator
     *
     * @var string
     */
    const PARAM_VALUES_PAIR_SEPARATOR = '=';

    /**
     * Url params separator
     *
     * @var string
     */
    const PARAMS_SEPARATOR = ';';

    /**
     * Url param values separator
     *
     * @var string
     */
    const PARAM_VALUES_SEPARATOR = ',';


    /*
     * Profile page
     * @var string
     */
    const PROFILE_PAGE = 'profile';

    /*
     * Compare page
     * @var string
     */
    const COMPARE_PAGE = 'compare';

    /*
     * Payment Delivery page
     * @var string
     */
    const PAYMENT_DELIVERY_PAGE = 'payment-delivery';

    /*
    * Order page
    * @var string
    */
    const ORDER = 'order';



    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Build home page url
     *
     * @param string $language
     *
     * @return string
     */
    public static function home($language = Languages::DEFAULT_LANGUAGE)
    {
        return self::localize(url(self::URL_ROOT), $language);
    }
    
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Build current page url
     *
     * @param string $language
     *
     * @return string
     */
    public static function current($language = Languages::DEFAULT_LANGUAGE)
    {
        $url = self::clearLanguage(url()->current());

        return self::localize($url, $language);
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Build category page url
     *
     * @param null|string $slug
     * @param string $language
     *
     * @return null|string
     */
    public static function category($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        if (!$slug)
        {
            return self::UNDEFINED_URL;
        }

        $url = self::concatParts([
            url(self::URL_ROOT),
            self::CATEGORY_PAGE,
            $slug
        ]);

        return self::localize($url, $language);
    }

    /**
     * Build category page url
     *
     * @param null|string $slug
     * @param int $page
     * @param string $language
     *
     * @return null|string
     */
    public static function categoryPerPage($slug = null, $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
        if (!$slug) {
            return self::UNDEFINED_URL;
        }

        if ($page < 1)
        {
            $page = 1;
        }

        $url = self::concatParts([
            url(self::URL_ROOT),
            self::CATEGORY_PAGE,
            $slug
        ]);
        
        if ($page > 1) {
            $url = self::concatParts([$url, $page]);
        }

        return self::localize($url, $language);
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Build product page url
     *
     * @param null|string $slug
     * @param string $language
     *
     * @return null|string
     */
    public static function product($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        if (!$slug) {
            return self::UNDEFINED_URL;
        }

        $url = self::concatParts([
            url(self::URL_ROOT),
            self::PRODUCT_PAGE,
            $slug
        ]);

        return self::localize($url, $language);
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Clear language param in the given url
     *
     * @param null|string $url
     *
     * @return string
     */
    public static function clearLanguage($url = null)
    {
        if (!$url) {
            return self::UNDEFINED_URL;
        }

        $url = preg_replace(Languages::SUPPORTED_LANGUAGES_REGULAR, self::UNDEFINED_URL_PART, $url);

        return trim($url, self::URL_ROOT);
    }


    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Localize given url with a given language
     *
     * @param null|string $url
     * @param string $language
     *
     * @return string
     */
    public static function localize($url = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        if (!$url) {
            return self::UNDEFINED_URL;
        }
        if (!$language) {
            $language = Languages::DEFAULT_LANGUAGE;
        }

        if ($language == Languages::DEFAULT_LANGUAGE) {
            return $url;
        }

        return self::concatParts([$url, $language]);
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Concat url parts
     *
     * @param null|array $parts
     * @param string $separator
     *
     * @return string
     */
    public static function concatParts($parts = null, $separator = self::URL_PARTS_SEPARATOR)
    {
        if (!$parts || !$separator) {
            return self::UNDEFINED_URL_PART;
        }

        $result = '';

        foreach ($parts as $part) {
            if (preg_match('/^http:|https:/i', $part)) {
                $result .= trim($part, $separator);
            } else {
                $result .= $separator . trim($part, $separator);
            }
        }

        return $result;
    }
}
