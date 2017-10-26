{{--Modal call BEGIN--}}
<div class="modal fade" id="ModalCall" tabindex="-1" role="dialog" aria-labelledby="myModalCall">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                        data-call-close
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLOGIN">{{ trans('to-order-call.callback') }}</h4>
                <div class="arrow-down-modal">
                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                </div>
            </div>
            <div class="modal-body">

                <p>{{ trans('to-order-call.text') }}</p>

                <form class="form-horizontal" role="form">

                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="text"
                                   class="form-control"
                                   data-call-name
                                   placeholder="{{ trans('to-order-call.name') }}">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="text"
                                   class="form-control"
                                   data-call-phone-number
                                   placeholder="{{ trans('to-order-call.phone_number') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit"
                                    data-call-submit
                                    class="le-button">
                                {{ trans('to-order-call.to_order_call') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>