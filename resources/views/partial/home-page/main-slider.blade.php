{{--{{ dd($model) }}--}}
<div class="col-xs-12 col-sm-8 col-md-7 homebanner-holder">
    <!-- ========================================== SECTION – HERO ========================================= -->
    <div id="hero">
        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm owl-carousel-big-banner">

            @foreach($model->mainSlider as $slide)
                <div class="item" style="background-image: url({{ $slide->images->main_slider }});">
                    <div class="background-color-opscity"></div>
                    <div class="container-fluid">
                        <div class="caption vertical-center text-left">
                            <div class="big-text fadeInDown-1">
                                {{ $slide->big_text }}
                            </div>

                            <div class="excerpt fadeInDown-2">
                                {{ $slide->medium_text }}
                            </div>
                            <div class="small fadeInDown-2">
                                {{ $slide->small_text }}
                            </div>
                            <div class="button-holder fadeInDown-3">
                                <a href="{{ $slide->url }}" class="big le-button ">{{ $slide->button_text }}</a>
                            </div>
                        </div><!-- /.caption -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.item -->
            @endforeach

        </div><!-- /.owl-carousel -->
    </div>
    <!-- ========================================= SECTION – HERO : END ========================================= -->
</div><!-- /.homebanner-holder -->