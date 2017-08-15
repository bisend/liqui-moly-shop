<?php

namespace App\Repositories;


use App\DatabaseModels\TopBanner;
use App\Helpers\Languages;

/**
 * Class TopBannerRepository
 * @package App\Repositories
 */
class TopBannerRepository
{
    /**
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTopBannerByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return TopBanner::with([
            'image'
        ])
            ->get([
                'id',
                'image_id',
                "big_text_$language as big_text",
                "medium_text_$language as medium_text",
                "url_$language as url"
            ]);
    }
}