<section>
  <header>
   <div class="fundo" style="background-color:#333; margin-bottom:5%; -webkit-text-stroke-width: 2px; -webkit-text-stroke-color: white;">
        <div class="p-4 p-md-5 text-white ">
            <h2 style="font-family: consolas;" class="display-4 text-bold font-weight-normal">Cadastramento de cupons</h2>
        </div>
    </div>
    </header>

    <div class="container">
        <form action="cadastroCupons.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="material-icons">title</i>
                    </div>
                    <input type="file" name="imagemCupom" id="imagemCupom" class="form-control" required= "required"/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="material-icons">title</i>
                    </div>
                    <input type="text" name="titulo" id="titulo" placeholder="Titulo" class="form-control" required= "required"/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="material-icons">edit</i>
                    </div>
                    <input type="text" name="descricao" id="descricao" placeholder="descricao" class="form-control" required= "required"
                    />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <input type="number" name="valor" id="valor" placeholder="Valor" class="form-control" required= "required"
                    />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <input type="number" name="desconto" id="desconto" placeholder="Porcentagem de Desconto" class="form-control" required= "required"
                    />
                </div>
            </div>
            <div class="float-right">
                <button type="submit" style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Cadastrar Cupom</button>
            </div>
        </form>
    </div>
</section>
