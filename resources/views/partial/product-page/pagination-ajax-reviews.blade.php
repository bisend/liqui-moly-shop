@php($pages = \App\Helpers\Paginator::createPagination($mPage, $productReviewsLimit, $productReviewsCount))
@php($isPrev = array_shift($pages))
@php($isNext = array_pop($pages))
@if($productReviewsCount > $productReviewsLimit)
    <div class="pagination-holder">
        <div class="row">

            {{--<div class="col-xs-12 col-sm-6 text-left">--}}
            <div class="col-xs-12 col-sm-12 text-left">
                <ul class="pagination ">

                    {{--PREV PAGE--}}
                    @if($isPrev)
                        <li>
                            {{--<a href="{{ url_wish_list_per_page($mPage - 1, $model->language) }}"--}}
                            <a href="javascript:void(0);"
                               data-product-review-pagination="{{ $mPage - 1 }}"
                               class="disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                        </li>
                    @else
                        <li>
                            <a><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                        </li>
                    @endif


                    {{--MAIN LINKS--}}
                    @foreach($pages as $page)
                        <li class="{{ $page == $mPage ? 'current' : '' }}">
                            @if($page == '...')
                                <a>
                                    {{ $page }}
                                </a>
                            @else
                                @if($page == $mPage)
                                    <a>
                                        {{ $page }}
                                    </a>
                                @else
                                    {{--<a href="{{ url_wish_list_per_page($page, $model->language) }}">--}}
                                    <a href="javascript:void(0);"
                                       data-product-review-pagination="{{ $page }}" >
                                        {{ $page }}
                                    </a>
                                @endif
                            @endif

                        </li>
                    @endforeach

                    {{--NEXT PAGE--}}
                    @if($isNext)
                        <li>
                            {{--                            <a href="{{ url_wish_list_per_page($mPage + 1, $model->language) }}">--}}
                            <a href="javascript:void(0);"
                               data-product-review-pagination="{{ $mPage + 1 }}" >
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </li>
                    @else
                        <li>
                            <a>
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>


        </div><!-- /.row -->
    </div><!-- /.pagination-holder -->
@endif