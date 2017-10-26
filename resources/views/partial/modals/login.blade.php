<!-- Modal LOGIN BEGIN-->
<div class="modal fade modal-log-mob" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLOGIN">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close"
                        data-login-close
                        data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>


                <div class="row">
                    <div class="col-md-6 no-margin-right">
                        <a class="modal-header-btn-active btn-login">{{ trans('layout.login') }}</a>
                    </div>

                    <div class="col-md-6 no-margin-left">
                        <a data-toggle="modal"
                           data-target="#ModalRegistr"
                           data-dismiss="modal"
                           aria-label="Close"
                           class="le-button modal-header-btn btn-registr">{{ trans('layout.registration') }}</a>
                    </div>
                </div>

                <div class="arrow-down-modal">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>

            </div>
            <div class="modal-body">

                {{--FORM--}}
                <form class="form-horizontal" role="form" method="post" action="/login" data-login-form>
                    {{ csrf_field() }}
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   id="inputEmail3"
                                   data-login-email
                                   placeholder="{{ trans('layout.email') }}">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   id="inputPassword3"
                                   data-login-password
                                   placeholder="{{ trans('layout.password') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="checkbox">
                                <label>
                                    <input name="remember"
                                           data-login-remember
                                           type="checkbox"> {{ trans('layout.remember_me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit"
                                    data-login-submit
                                    class="le-button">{{ trans('layout.log_in') }}</button>
                        </div>
                    </div>
                </form>
                {{--FORM END--}}
                <a href="" data-toggle="modal"
                   data-target="#ModalReturnLogin"
                   data-dismiss="modal"
                   aria-label="Close"
                   class="restore-password">{{ trans('layout.restore_password') }}</a>

                <p>{{ trans('layout.not_registered') }}  <a data-toggle="modal"
                                               data-target="#ModalRegistr"
                                               data-dismiss="modal"
                                               aria-label="Close">{{ trans('layout.registration') }}</a></p>

            </div>
        </div>
    </div>
</div>
<!-- Modal LOGIN END-->