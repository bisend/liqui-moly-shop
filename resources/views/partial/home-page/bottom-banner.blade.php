@php($bottomBanner = $model->bottomBanner[0])
<div class="col-xs-12 col-lg-12 no-margin banner">
    <a href="{{ $bottomBanner->url }}">
        <div class="background-color-opscity"></div>
        <div class="banner-text theblue">
            <h2>{{ $bottomBanner->big_text }}</h2>
            <span class="tagline">{{ $bottomBanner->medium_text }}</span>
        </div>
        <img class="banner-image" alt="" src="{{ $bottomBanner->image->original }}">
    </a>
</div>