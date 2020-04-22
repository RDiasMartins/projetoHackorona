<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Cadastro - Empresa </title>
    <link rel="shortcut icon" href="../images/logo.png" >
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.min.css" />
    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>

</head>
<body>
    <!-- Menu -->
    <?php
        include "../inc/menu_cadastro.inc";
    ?>
    <br/><br/>
    <div class="container-fluid" style="height:150px;">
        <main role="main">
            <div style="background-color: #333;" class="jumbotron">
                <div style="color: white;"class="container">
                    <h2 class="display-4 font-weight-normal" style="position:absolute; margin-top:-30px;">Cadastre-se</h2>
                </div>
            </div> 
        </main>
    </div>
    <?php
        if(isset($_SESSION["conf_email"])){
            if(!$_SESSION["conf_email"]){
                echo'
                    <div class="alert alert-warning " role="alert">
                         <strong>E-mail já cadastrado!</strong> Tente novamente com outro endereço.
                    </div>
                ';
                $_SESSION["conf_email"]=true;
            }
        }
    ?>
        <form class="form formCliente" action = "salvar_empresa.php" method = "POST" style="margin-left:7%;">
            <div class = "row" style="width:100%;">
                <div class = "col-lg-3 offset-lg-0    col-sm-8 offset-sm-1" style="position: absolute;">
                    <label style="padding-top:5%"> Razão Social: </label>
                    <input type="text" name="razao_social" id="razao_social" class="form-control" required="required"/>
                
                    <label style="padding-top:5%"> Nome Fantasia: </label>
                    <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" required="required"/>
                
                    <label style="padding-top:5%"> CNPJ: </label>
                    <input type="text" name="cnpj" id="cnpj" class="form-control cnpj" required="required" placeholder="00.000.000/0000-00"/>
                
                    <label for="categoria" style="padding-top:5%"> Categoria: </label>
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="beleza_saude">Beleza/Saúde</option>
                        <option value="comercio">Comércio</option>
                        <option value="gastronomia">Gastronomia</option>
                        <option value="entretenimento">Entretenimento</option>
                        <option value="viagem">Viagem</option>
                    </select>
                
                    <label style="padding-top:5%"> Telefone: </label>
                    <input type="tel" name="telefone" id="telefone" class="form-control phone" required="required" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"/>
                </div>
            </div>
            
            <div class = "row" >
                <div class = "col-lg-3 offset-lg-3  col-sm-8 offset-sm-1" style="position: absolute; margin-left:31%">
                    <div class="row">
                        <div class = "col-lg-7 offset-lg-0    col-sm-8 offset-sm-1">
                            <label style="padding-top:5%"> CEP: </label>
                            <input type="text" name="cep" id="cep" class="form-control cep" required="required"/>
                        </div>
                        <div class = "col-lg-5 offset-lg-0    col-sm-8 offset-sm-1">
                            <label style="padding-top:5%"> Número: </label>
                            <input type="number" name="numero" id="numero" class="form-control" required="required"/>
                        </div>
                    </div>

                    <label for="estado" style="padding-top:5%"> Estado: </label>
                    <select name="estado" id="estado" class="form-control">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="EX">Estrangeiro</option>
                    </select>

                    <label style="padding-top:5%"> Cidade: </label>
                    <input type="text" name="cidade" id="cidade" class="form-control" required="required"/>
                
                    <label style="padding-top:5%"> Bairro: </label>
                    <input type="text" name="bairro" id="bairro" class="form-control" required="required"/>
                
                    <label style="padding-top:5%"> Rua: </label>
                    <input type="text" name="rua" id="rua" class="form-control" required="required"/>
                </div>
            </div>

            <div class = "row" style="width:100%;">
                <div class = "col-lg-3 offset-lg-8    col-sm-8 offset-sm-1">
                    <p style="font-size:17px; border-bottom:1px solid silver; padding: 30px 0px 10px 0px"> Dados do proprietário </p>
                    <label style="padding-top:5%"> Nome: </label>
                    <input type="text" name="nome" id="nome" class="form-control" required="required"/>
                
                    <label style="padding-top:5%"> CPF: </label>
                    <input type="text" name="cpf" id="cpf" class="form-control cpf" required="required" placeholder="000.000.000-00"/>
                
                    <label style="padding-top:5%"> Email: </label>
                    <input type="email" name="email" id="email" class="form-control email" required="required" placeholder="nome@email.com"/>
                
                    <div class="row">
                        <div class = "col-lg-6 offset-lg-0    col-sm-8 offset-sm-1">
                            <label style="padding-top:15%;"> Senha: </label>
                            <input type="password" name="senha" id="senha" class="form-control password" required="required"/>
                        </div>
                        <div class = "col-lg-6 offset-lg-0    col-sm-8 offset-sm-1">
                            <label style="padding-top:15%"> Confirmação: </label>
                            <input type="password" name="senha" id="conf_senha" class="form-control password" required="required"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row" style="width:100%;">
                <div class = "col offset-lg-10 offset-sm-5">
                    <p style="padding-top:30px;"><button type="submit" class="btn btn-warning">Cadastrar</button></p>
                </div>
            </div>
        </form>

    <!-- Rodapé -->
    <?php
        include "../inc/rodape.inc";

        include "../inc/ModalContato.inc";
    ?>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validaform.min.js"></script>
</body>
</html>
