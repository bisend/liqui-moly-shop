<section id="gaming">
    <div class="grid-list-products">
        <h1 class="section-title">{{ $model->currentCategory->name }} {{ $model->countCategoryProducts }}</h1>

        <div class="control-bar">

            @include('partial.category-page.sort-menu')

            <div class="grid-list-buttons">
                <ul>
                    <li class="grid-list-button-item active" data-grid-li>
                        {{--<a data-toggle="tab" href="#grid-view" data-grid-view-btn>--}}
                        <a href="javascript:void(0);" data-grid-view-btn>
                            <i class="fa fa-th-large"></i>
                        </a>
                    </li>

                    <li class="grid-list-button-item" data-list-li>
                        {{--<a data-toggle="tab" href="#list-view">--}}
                        <a href="javascript:void(0);" data-list-view-btn>
                            <i class="fa fa-th-list"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div><!-- /.control-bar -->

        <div class="tab-content">

            {{--<div id="grid-view" class="products-grid fade tab-pane in active">--}}
            <div id="grid-view" class="products-grid fade tab-pane in active" data-product-grid>

                <div class="product-grid-holder">
                    <div class="row no-margin">

                        @foreach($model->categoryProducts as $categoryProduct)
                            <div class="col-xs-12 col-sm-6 col-md-4 no-margin product-item-holder hover" data-product-holder>
                                <div class="product-item">

                                    <div class="image">
                                        <a href="{{ url_product($categoryProduct->name_slug, $model->language) }}">
                                            <img src="{{ $categoryProduct->images[0]->medium }}"
                                                 alt="{{ $categoryProduct->name }}">
                                            {{--<img src="/img/900.jpg" alt="{{ $categoryProduct->name }}">--}}
                                        </a>
                                    </div>
                                    <div class="body">

                                        <div class="title">
                                            <a href="{{ url_product($categoryProduct->name_slug, $model->language) }}">
                                                {{ $categoryProduct->name }}
                                            </a>
                                        </div>

                                        <div class="star-holder inline">
                                            <div class="star" data-score="4">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($categoryProduct->avg_rating != null)
                                                        @if($i <= $categoryProduct->avg_rating)
                                                            <img src="/img/star-on.png" alt="{{  $i }}">
                                                        @else
                                                            <img src="/img/star-off.png" alt="{{  $i }}">
                                                        @endif
                                                    @else
                                                        <img src="/img/star-on.png" alt="{{  $i }}">
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="product-comments">
                                            @if($categoryProduct->avg_rating != null)
                                                <a href="javascript:void(0);"
                                                   data-go-to-review-id="{{ $categoryProduct->id }}"
                                                   data-go-to-review-slug="{{ $categoryProduct->name_slug }}"
                                                   title="{{ trans('layout.title_reviews') }}">
                                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                    <span></span>
                                                    {{ $categoryProduct->reviews->count() }}
                                                </a>
                                            @else
                                                <a href="javascript:void(0);" title="{{ trans('layout.title_reviews') }}"
                                                   data-set-review-slug="{{ $categoryProduct->name_slug }}"
                                                   data-set-review-id="{{ $categoryProduct->id }}">
                                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                    <span></span>
                                                    {{ trans('layout.leave_review') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="prices">

                                        {{--<div class="price-current">{{ $categoryProduct->products[0]->price }} грн</div>--}}
                                        <div class="price-current">{{ $categoryProduct->price }} грн</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="javascript:void(0);"
                                               data-in-cart="false"
                                               data-add-to-cart="{{ $categoryProduct->id }}"
                                               class="le-button">{{ trans('layout.add_to_cart') }}</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist"
                                               data-in-wish-list="false"
                                               data-add-to-wish-list="{{ $categoryProduct->id }}"
                                               href="javascript:void(0);">{{ trans('layout.add_to_wish_list') }}</a>
                                            <!--  <a class="btn-add-to-compare" href="#">Порівняти</a> -->
                                        </div>
                                    </div>
                                </div><!-- /.product-item -->
                            </div><!-- /.product-item-holder -->
                        @endforeach

                    </div><!-- /.row -->
                </div><!-- /.product-grid-holder -->

                @include('partial.category-page.pagination')
            </div><!-- /.products-grid #grid-view -->

        </div><!-- /.tab-content -->
    </div><!-- /.grid-list-products -->

</section><!-- /#gaming -->
