<!-- Modal   Buy one click -->
@php($isUserAuth = auth()->check() ? true : false)
<div class="modal fade" id="buy-one-click" tabindex="-1" role="dialog" aria-labelledby="myModal-buy-one-click">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        data-buy-one-click-close
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLOGIN">ШВИДКЕ ЗАМОВЛЕННЯ ТОВАРУ</h4>
                <div class="arrow-down-modal">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>
            <div class="modal-body">

                <h2 class="product-title-one-click">{{ $model->product->name }}</h2>

                <form class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <input type="hidden"
                           data-buy-one-click-product-id
                           value="{{ $model->product->id }}">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text"
                                   class="form-control"
                                   data-buy-one-click-name
                                   value="{{ $isUserAuth ? auth()->user()->name : '' }}"
                                   placeholder="Ім'я">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="text"
                                   class="form-control"
                                   data-buy-one-click-phone-number
                                   value="{{ $isUserAuth ? auth()->user()->profile->phone_number : '' }}"
                                   placeholder="Ваш номер телефону">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit"
                                    data-buy-one-click-submit
                                    class="le-button">
                                Замовити
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>