  <section>
    <?php
    $encontrou= false;
    if(!empty($_GET)){
        $codigo= $_GET["cupon"];
        $cupon= buscarCupon($codigo);
        if(!empty($cupon)){
            $encontrou= true;
        }
    }
    ?>
  
    <header>
       <div class="fundo" style="background-color:#FFDB58; margin-bottom:5%; -webkit-text-stroke-width: 2px; -webkit-text-stroke-color: white;">
            <div class="p-4 p-md-5 text-white ">
                <h2 class="display-4 text-bold font-weight-normal">Cadastrar Cupons de Desconto</h2>
            </div>
        </div>
    </header>
    <div class="container">
        <form action="cadastroCupons.php" method="post">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </div>
                    <input type="number" name="codigo" id="codigo" class="form-control"
                    <?php
                        $n_codigo = buscarCodigo("cupon");
                        echo'value="'.$n_codigo.'"';
                        ?>
                    readonly = "readonly"/>    
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="material-icons">title</i>
                    </div>
                    <input type="text" name="titulo" id="titulo" placeholder="Titulo" class="form-control" required= "required"
                    />
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
                <input type="hidden" name="alterar" 
                    <?php
                        if($encontrou){
                            echo 'value= "1"';
                        }else{
                            echo 'value= "0"';
                        }
                    ?>
                />
            <div class="float-right">
                <button type="submit" style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Cadastrar Cupon</button>
            </div>
        </form>
    </div>
</section>