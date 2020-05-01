<div class="modal fade" id="ModalCompra" tabindex="-1" role="dialog" aria-labelledby="ModalLoginCompra" aria-hidden="true">
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
                <h3>Você deseja finalizar a compra?</h3>
                <div class = "float-right">
                    <a class="btn btn-md btn-warning" href="../php/cuponsCadastrados.php" role="button">Cancelar</a>
                    <a class="btn btn-md btn-warning" href="finaliza_compra.php?codigo='.$linha['codigo'].'&cpf='.$_SESSION['cpf'].'" role="button">Finalizar</a>
                </div>
            </div>
        </div>
    </div>
</div>
