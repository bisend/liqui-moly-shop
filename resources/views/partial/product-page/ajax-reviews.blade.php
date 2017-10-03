{{--@php($reviews = $model->productReviews)--}}
@if(count($reviews) > 0)
    @foreach($reviews as $review)
        <div class="comment-item">
            <div class="row no-margin">
                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                    <div class="avatar">
                        <img alt="avatar" src="/img/default-avatar.jpg">
                    </div><!-- /.avatar -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                    <div class="comment-body">
                        <div class="meta-info">
                            <div class="author inline">
                                <a class="bold">{{ $review->username }}</a>
                            </div>
                            <div class="star-holder inline">
                                <div class="star" data-score="4">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <img src="/img/star-on.png" alt="{{  $i }}">
                                        @else
                                            <img src="/img/star-off.png" alt="{{  $i }}">
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="date inline pull-right">
                                {{ $review->created_at }}
                            </div>
                        </div><!-- /.meta-info -->
                        <p class="comment-text">
                            {{ $review->review }}
                        </p><!-- /.comment-text -->
                    </div><!-- /.comment-body -->

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.comment-item -->
    @endforeach
@else
    Пусто
@endif

@include('partial.product-page.pagination-ajax-reviews')