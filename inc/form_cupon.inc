<div class="container">
    <form action="cadastroCupons.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="material-icons">add_photo_alternate</span>
                </div>&nbsp;
                <div class="custom-file">
                    <input type="file" name="imagemCupom" id="imagemCupom" class="custom-file-input" required="required" lang="es">
                    <label class="custom-file-label" for="inputGroupFile01">Enviar imagem</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="material-icons">title</i>
                </div>&nbsp;
                <input type="text" name="titulo" id="titulo" placeholder="Título" class="form-control" required= "required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="material-icons">edit</i>
                </div>&nbsp;
                <input type="text" name="descricao" id="descricao" placeholder="Descrição" class="form-control" required= "required"
                />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="material-icons">attach_money</i>
                </div>&nbsp;
                <input type="number" name="valor" id="valor" placeholder="Valor" class="form-control" required= "required"
                />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="material-icons">local_offer</i>
                </div>&nbsp;
                <input type="number" name="desconto" id="desconto" placeholder="Porcentagem de desconto" class="form-control" required= "required"
                />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="material-icons">calendar_today</i>
                </div>&nbsp;
                <input type="date" name="data_venda" id="data_venda" placeholder="Data de disponibilidade" class="form-control" required= "required"
                />
            </div>
        </div>
        <div class="float-right">
            <button type="submit" style=" color:black;"class="btn btn-warning btn-lg">Cadastrar Cupom</button>
        </div>
    </form>
</div>
