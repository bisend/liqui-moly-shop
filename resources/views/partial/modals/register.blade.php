{{--Modal Register BEGIN--}}
<div class="modal fade " id="ModalRegistr" tabindex="-1" role="dialog" aria-labelledby="myModalREGISTR">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="row">
                    <div class="col-md-6 no-margin-right">
                        <a data-toggle="modal" data-target="#ModalLogin"  data-dismiss="modal" aria-label="Close" class="le-button modal-header-btn btn-login">Вхід</a>
                    </div>

                    <div class="col-md-6 no-margin-left">
                        <a class="modal-header-btn-active btn-registr">Реєстрація</a>
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
                            <input type="user" class="form-control" id="inputLogin3" placeholder="Ім'я">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Підтвердіть пароль">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="le-button">ЗАРЕЄСТРУВАТИСЯ</button>
                        </div>
                    </div>
                </form>
                <p>Вже зареєстровані? <a href="" data-toggle="modal" data-target="#ModalLogin"  data-dismiss="modal" aria-label="Close">Увійдіть</a></p>

            </div>
        </div>
    </div>
</div>