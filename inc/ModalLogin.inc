<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="ModalLoginTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="ModalLoginTitulo2">&nbsp; Login</h5>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="modalLogin" action="php/validar_login.php" method="POST">
                    <div class = "form-group">
                        <div class = "input-group">
                            <div class = "input-group-addon">
                                <i class = "material-icons" style="color:black;">email</i> &nbsp;
                            </div>
                            <input type = "email" name = "EmailLogin"
                            class = "form-control" placeholder = "E-mail"/>
                        </div>
                    </div>
                    <div class = "form-group">
                        <div class = "input-group">
                            <div class = "input-group-addon">
                                <i class = "material-icons" style="color:black;">lock</i> &nbsp;
                            </div>
                            <input type = "password" name = "SenhaLogin" class = "form-control"
                            id = "senha"  placeholder = "Senha"/>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <select id="checkLogin" name="checkLogin" class="form-control">
                            <option value="1">Cliente</option>
                            <option value="2">Proprietário</option>
                        </select>
                    </div>
                    <div class = "float-right">
                        <a class="btn btn-md btn-warning" href="php/redireciona_cadastro.php" role="button">Cadastre-se</a>
                        <button type = "submit" class ="btn btn-md btn-warning">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
