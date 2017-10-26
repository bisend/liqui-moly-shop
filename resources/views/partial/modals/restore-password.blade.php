{{--Modal  Restore password BEGIN--}}
<div class="modal fade" id="ModalReturnLogin" tabindex="-1" role="dialog" aria-labelledby="myModalRETURNLOGIN">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                        data-restore-password-close
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLOGIN">{{ trans('layout.restoring_password') }}</h4>

                <div class="arrow-down-modal">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>

            </div>
            <div class="modal-body">

                <p>{{ trans('layout.restoring_text') }}</p>

                {{--FORM--}}
                <form class="form-horizontal"
                      action="/restore-password"
                      method="post"
                      role="form" data-restore-password-form>

                    {{ csrf_field() }}

                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="email"
                                   data-restore-password-email
                                   name="email"
                                   class="form-control"
                                   id="inputEmail3"
                                   placeholder="{{ trans('layout.email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit"
                                    data-restore-password-submit
                                    class="le-button">{{ trans('layout.restore_password') }}</button>
                        </div>
                    </div>
                </form>
                {{--FORM--}}
            </div>
        </div>
    </div>
</div>