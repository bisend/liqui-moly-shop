@php($topBanner = $model->topBanner[0])
<div class="col-xs-12 col-lg-12 no-margin banner">
    <a href="{{ $topBanner->url }}">
        <div class="background-color-opscity"></div>
        <div class="banner-text theblue">
            <h1>{{ $topBanner->big_text }}</h1>
            <span class="tagline">{{ $topBanner->medium_text }}</span>
        </div>
        <img class="banner-image" alt="" src="{{ $topBanner->image->original }}">
    </a>
</div>