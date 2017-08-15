<?php

namespace App\Repositories;

use App\DatabaseModels\BottomBanner;

/**
 * Class BottomBannerRepository
 * @package App\Repositories
 */
class BottomBannerRepository
{
    /**
     * @param $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getBottomBannerByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return BottomBanner::with([
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