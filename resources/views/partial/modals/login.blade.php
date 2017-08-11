<!-- Modal LOGIN BEGIN-->
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLOGIN">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


                <div class="row">
                    <div class="col-md-6 no-margin-right">
                        <a class="modal-header-btn-active btn-login">Вхід</a>
                    </div>

                    <div class="col-md-6 no-margin-left">
                        <a data-toggle="modal" data-target="#ModalRegistr"  data-dismiss="modal" aria-label="Close" class="le-button modal-header-btn btn-registr">Реєстрація</a>
                    </div>
                </div>

                <div class="arrow-down-modal">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="email" class="form-control incorrect-field" id="inputEmail3" placeholder="Електронна адреса">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Запам'ятати мене?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="le-button">Увійти</button>
                        </div>
                    </div>
                </form>

                <a href="" data-toggle="modal" data-target="#ModalReturnLogin" data-dismiss="modal" aria-label="Close" class="restore-password">Відновити пароль</a>

                <p>Ви ще не зареєстровані?  <a data-toggle="modal" data-target="#ModalRegistr"  data-dismiss="modal" aria-label="Close">Реєстрація</a></p>

            </div>
        </div>
    </div>
</div>
<!-- Modal LOGIN END-->