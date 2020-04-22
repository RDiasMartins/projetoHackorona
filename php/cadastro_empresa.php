<?php
// Include and instantiate the class.
    require_once 'Mobile_Detect.php';
    $detect = new Mobile_Detect;

    if( $detect->isMobile()){
        $dispositivo= "_mob";
    }
    else{
    	$dispositivo= "";

    }
?>
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

    <div style="font-size: 1.125rem; text-anchor: middle;">
        <main role="main">
            <div style="background-color: #333;" class="jumbotron">
                <div style="color: white;"class="container">
                    <h2 class="display-3 text-bold font-weight-normal titulo<?=$dispositivo;?>">Cadastro de empresa</h2>
                    <p class="float-right">Cadastro de cliente
                        <a class="btn btn-warning btn-sm" href="../php/cadastro_cliente.php">Aqui</a>
                    </p>
                </div>
            </div>
        </main>
    </div>

    <div class="container-fluid">
        <?php
            if(empty($_POST)){
        ?>
            <form class="form formEmpresa" action = "cadastro_empresa.php" method = "POST" style="margin-left:7%;">
                <div class = "row" style="width:100%;">
                    <div class = "col-lg-3 offset-lg-0 col-sm-8 offset-sm-1" style="position:absolute;">
                        <b> <p style="font-size:17px; border-bottom:1px solid silver;"> Dados da empresa </p> </b>
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

                <div class = "row" style="width:100%;">
                    <div class = "col-lg-3 offset-lg-3  col-sm-8 offset-sm-1" style="margin-left:30%; position:absolute;">
                        <b> <p style="font-size:17px; border-bottom:1px solid silver;"> Endereço </p> </b>
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
                        <b> <p style="font-size:17px; border-bottom:1px solid silver;"> Dados do proprietário </p> </b>
                        <label style="padding-top:5%"> Nome completo: </label>
                        <input type="text" name="nome" id="nome" class="form-control" required="required"/>

                        <label style="padding-top:5%"> CPF: </label>
                        <input type="text" name="cpf" id="cpf" class="form-control cpf" required="required" placeholder="000.000.000-00"/>

                        <label style="padding-top:5%"> E-mail: </label>
                        <input type="email" name="email" id="email" class="form-control email" required="required" placeholder="nome@email.com"/>

                        <label style="padding-top:5%"> Confirmação: </label>
                        <input type="email" name="email" id="conf_email" class="form-control email" required="required" placeholder="nome@email.com"/>

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
        <?php
            }
            else{
                session_start();

                include "conexao_pdo.php";

                $razao_social=$_POST["razao_social"];
                $nome_fantasia=$_POST["nome_fantasia"];
                $cnpj=$_POST["cnpj"];
                $categoria=$_POST["categoria"];
                $telefone=$_POST["telefone"];
                $cep=$_POST["cep"];
                $estado=$_POST["estado"];
                $cidade=$_POST["cidade"];
                $bairro=$_POST["bairro"];
                $rua=$_POST["rua"];
                $numero=$_POST["numero"];
                $nome=$_POST["nome"];
                $cpf=$_POST["cpf"];
                $email=$_POST["email"];
                $senha=$_POST["senha"];

                $sth = $link->prepare("SELECT cnpj from empresa WHERE email=:email");
                $sth -> bindValue(":email", $email);

                $sth -> execute();

                if($sth->rowCount()>0){

                }else{
                    $sth = $link->prepare('INSERT into empresa (razao_social, nome_fantasia, cnpj, categoria, telefone, cep, estado, cidade, bairro, rua, numero, nome, cpf, email, senha)
                    values (:razao_social, :nome_fantasia, :cnpj, :categoria, :telefone, :cep, :estado, :cidade, :bairro, :rua, :numero, :nome, :cpf, :email, :senha)');

                    $sth->bindValue(':razao_social', $razao_social, PDO::PARAM_STR);
                    $sth->bindValue(':nome_fantasia', $nome_fantasia, PDO::PARAM_STR);
                    $sth->bindValue(':cnpj', $cnpj, PDO::PARAM_INT);
                    $sth->bindValue(':categoria', $categoria, PDO::PARAM_STR);
                    $sth->bindValue(':telefone', $telefone, PDO::PARAM_INT);
                    $sth->bindValue(':cep', $cep, PDO::PARAM_INT);
                    $sth->bindValue(':estado', $estado, PDO::PARAM_STR);
                    $sth->bindValue(':cidade', $cidade, PDO::PARAM_STR);
                    $sth->bindValue(':bairro', $bairro, PDO::PARAM_STR);
                    $sth->bindValue(':rua', $rua, PDO::PARAM_STR);
                    $sth->bindValue(':numero', $numero, PDO::PARAM_INT);
                    $sth->bindValue(':nome', $nome, PDO::PARAM_STR);
                    $sth->bindValue(':cpf', $cpf, PDO::PARAM_INT);
                    $sth->bindValue(':email', $email, PDO::PARAM_STR);
                    $sth->bindValue(':senha', $senha, PDO::PARAM_STR);
                    $sth->execute();

                    header('Location: ../index.php');
                }
            }
        ?>

    </div>

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
