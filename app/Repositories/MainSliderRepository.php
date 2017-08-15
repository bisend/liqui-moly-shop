<?php

namespace App\Repositories;


use App\DatabaseModels\MainSlider;
use App\Helpers\Languages;

/**
 * Class MainSliderRepository
 * @package App\Repositories
 */
class MainSliderRepository
{
    /**
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMainSliderByLanguage($language = Languages::DEFAULT_LANGUAGE)
    {
        return MainSlider::with([
            'images'
        ])->get([
            'id',
            'image_id',
            "big_text_$language as big_text",
            "medium_text_$language as medium_text",
            "small_text_$language as small_text",
            "button_text_$language as button_text",
            "url_$language as url"
        ]);
    }
}