{{--Modal Register BEGIN--}}
<div class="modal fade modal-reg-mob" id="ModalRegistr" tabindex="-1" role="dialog" aria-labelledby="myModalREGISTR">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                        data-register-close
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="row">
                    <div class="col-md-6 no-margin-right">
                        <a data-toggle="modal"
                           data-target="#ModalLogin"
                           data-dismiss="modal"
                           aria-label="Close"
                           class="le-button modal-header-btn btn-login">
                            {{ trans('layout.login') }}
                        </a>
                    </div>

                    <div class="col-md-6 no-margin-left">
                        <a class="modal-header-btn-active btn-registr">
                            {{ trans('layout.registration') }}
                        </a>
                    </div>
                </div>
                <div class="arrow-down-modal">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>


            </div>
            <div class="modal-body">

                {{--FORM--}}
                <form class="form-horizontal" role="form" method="post" action="/register" data-register-form>
                    {{ csrf_field() }}

                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="text"
                                   placeholder="{{ trans('layout.name') }}"
                                   name="name"
                                   data-register-name
                                   class="form-control"
                                   id="inputLogin3">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="email"
                                   name="email"
                                   data-register-email
                                   class="form-control"
                                   id="inputEmail3"
                                   placeholder="{{ trans('layout.email') }}">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="password"
                                   name="password"
                                   data-register-password
                                   class="form-control"
                                   id="inputPassword3"
                                   placeholder="{{ trans('layout.password') }}">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="password"
                                   name="password_confirmation"
                                   data-register-password-confirmation
                                   class="form-control"
                                   id="inputPassword3"
                                   placeholder="{{ trans('layout.repeat_password') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit"
                                    data-register-submit
                                    class="le-button">{{ trans('layout.to_register') }}</button>
                        </div>
                    </div>
                </form>
                {{--FORM--}}

                <p>{{ trans('layout.already_registered') }}
                    <a href=""
                       data-toggle="modal"
                       data-target="#ModalLogin"
                       data-dismiss="modal"
                       aria-label="Close">
                        {{ trans('layout.sign_in') }}
                    </a>
                </p>

            </div>
        </div>
    </div>
</div>