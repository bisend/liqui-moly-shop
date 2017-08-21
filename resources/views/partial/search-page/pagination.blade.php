@php($pages = \App\Helpers\Paginator::createPagination($model->page, $model->searchProductsLimit, $model->countSearchProducts))
@php($isPrev = array_shift($pages))
@php($isNext = array_pop($pages))
{{--{{ dd($pages) }}--}}
@if($model->countSearchProducts >= $model->searchProductsLimit)
    <div class="pagination-holder">
        <div class="row">

            {{--<div class="col-xs-12 col-sm-6 text-left">--}}
            <div class="col-xs-12 col-sm-12 text-left">
                <ul class="pagination ">

                    {{--PREV PAGE--}}
                    @if($isPrev)
                        <li>
                            <a href="{{ url_search_per_page($model->series . ($model->sort == 'price-asc' || $model->sort == 'price-desc' ? ('/' . $model->sort) : ''), $model->page - 1, $model->language) }}"
                               class="disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                        </li>
                    @else
                        <li>
                            <a><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                        </li>
                    @endif


                    {{--MAIN LINKS--}}
                    @foreach($pages as $page)
                        <li class="{{ $page == $model->page ? 'current' : '' }}">
                            @if($page == '...')
                                <a>
                                    {{ $page }}
                                </a>
                            @else
                                @if($page == $model->page)
                                    <a>
                                        {{ $page }}
                                    </a>
                                @else
                                    <a href="{{ url_search_per_page($model->series . ($model->sort == 'price-asc' || $model->sort == 'price-desc' ? ('/' . $model->sort) : ''), $page, $model->language) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endif

                        </li>
                    @endforeach

                    {{--NEXT PAGE--}}
                    @if($isNext)
                        <li>
                            <a href="{{ url_search_per_page($model->series . ($model->sort == 'price-asc' || $model->sort == 'price-desc' ? ('/' . $model->sort) : ''), $model->page + 1, $model->language) }}">
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