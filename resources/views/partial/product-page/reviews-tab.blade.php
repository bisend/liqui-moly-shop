{{--@php($reviews = $model->product->reviews)--}}
@php($reviews = $model->productReviews)
<div class="tab-pane active" id="reviews">
    <div class="comments" data-product-reviews-container>
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

        @include('partial.product-page.pagination-reviews')
    </div><!-- /.comments -->





    <div class="add-review row">
        <div class="col-sm-8 col-xs-12">
            <div class="new-review-form">
                <h2 data-review-scroll>Залишити відгук</h2>
                <form id="contact-form"
                      class="contact-form"
                      data-add-review-form
                      method="post">
                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <input class="form-control"
                                   placeholder="Ім'я"
                                   data-add-review-name
                                   value="{{ auth()->check() ? auth()->user()->name : '' }}">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input class="form-control"
                                   placeholder="Електронна адреса"
                                   data-add-review-email
                                   value="{{ auth()->check() ? auth()->user()->email : '' }}">
                        </div>
                    </div><!-- /.field-row -->

                    <div class="field-row star-row">
                        <span>Оцінка: </span>
                        <div class="star-holder inline">
                            <div class="star" data-score="0" data-add-review-rating="0">
                                {{--@for($i = 1; $i <= 5; $i++)--}}
                                    {{--<img src="/img/star-off.png"--}}
                                         {{--data-rating-star="{{ $i }}"--}}
                                         {{--alt="{{ $i }}">--}}
                                {{--@endfor--}}
                            </div>
                        </div>
                    </div><!-- /.field-row -->

                    <div class="field-row">
                        <textarea placeholder="Ваш відгук"
                                  rows="8"
                                  data-add-review-text
                                  class="form-control le-input-textarea"></textarea>
                    </div><!-- /.field-row -->

                    <div class="buttons-holder">
                        <button type="submit"
                                data-add-review-submit
                                class="le-button huge">
                            Залишити відгук
                        </button>
                    </div><!-- /.buttons-holder -->
                </form><!-- /.contact-form -->
            </div><!-- /.new-review-form -->
        </div><!-- /.col -->
    </div><!-- /.add-review -->

</div><!-- /.tab-pane #reviews -->