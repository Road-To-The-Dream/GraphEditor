<div class="main">
    <div class="container content">
        <div class="row justify-content-center">
            <div class="shadow-lg p-3 mt-2 mb-5 bg-white rounded elem-form">
                <div class="col-12 text-center">
                    <p class="text-form">Ваш логин:</p>
                </div>
                <div class="form-group mb-0 input-group-sm">
                    <input type="text" class="form-control mt-2 mb-3" id="FirstName" style="font-size:20px"
                           aria-describedby="FirstName" placeholder="Enter First Name" autofocus>
                    <small id="emailHelp" class="form-text text-muted"></small>
                    <div class="form-group ml-2">
                        <p class="text-danger" id="messageError"></p>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <input class="btn btn-success btn-md btn-block mt-2 btn-sm" type="button" name="btn_login"
                                   value="Login"
                                   onclick="AjaxLogin('FirstName', 'messageError', '<?= $configuration['baseHost'] ?>')"/>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <?php
    require_once 'template/footer.php';
    ?>
</div>
<script src="/js/HandlerLogin.js"></script>