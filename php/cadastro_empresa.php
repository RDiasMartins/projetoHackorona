<?php
    session_start();
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

    <div style="text-anchor: middle;">
        <main role="main">
            <div style="background-color: #333; height:10rem;" class="jumbotron">
                <div style="color: white;" class="container">
                    <h2 style="font-size:3rem;" class="display-3 text-bold font-weight-normal">Cadastro de empresa</h2>
                </div>
            </div>
        </main>
    </div>

    <div class="container">
        <?php
            if(empty($_POST)){

                if(isset($_GET['cnpjjaexiste'])){
                    echo'
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>CNPJ já cadastrado!</strong> Tente novamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    ';
                }

                if(isset($_GET['cpfjaexiste'])){
                    echo'
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>CPF já cadastrado!</strong> Tente novamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    ';
                }

                if(isset($_GET['emailjaexiste'])){
                    echo'
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>E-mail já cadastrado!</strong> Tente novamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    ';
                }
        ?>
        <form class="form formEmpresa" action = "cadastro_empresa.php" method = "POST">
            <div class = "row">
                <div class = "col-lg-4 col-sm-12">
                    <label style="padding: 1rem;"> Razão Social </label>
                    <input type="text" name="razao_social" id="razao_social" class="form-control" required="required"
                        <?php
                            if(isset($_SESSION["razao_social"])){
                                echo'value="'.$_SESSION["razao_social"].'"';
                            }
                        ?>
                    />

                    <label style="padding: 1rem;"> Nome Fantasia </label>
                    <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" required="required"
                        <?php
                            if(isset($_SESSION["nome_fantasia"])){
                                echo'value="'.$_SESSION["nome_fantasia"].'"';
                            }
                        ?>
                    />

                    <label style="padding: 1rem;"> CNPJ </label>
                    <input type="text" name="cnpj" id="cnpj" class="form-control cnpj" required="required" placeholder="00.000.000/0000-00"
                        <?php
                            if(isset($_SESSION["cnpj"]) && !isset($_GET["cnpjjaexiste"])){
                                echo'value="'.$_SESSION["cnpj"].'"';
                            }
                        ?>
                    />

                    <label style="padding: 1rem;" for="categoria"> Categoria </label>
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="beleza_saude">Beleza/Saúde</option>
                        <option value="comercio">Comércio</option>
                        <option value="gastronomia">Gastronomia</option>
                        <option value="entretenimento">Entretenimento</option>
                        <option value="viagem">Viagem</option>
                    </select>

                    <label style="padding: 1rem;"> Telefone </label>
                    <input type="tel" name="telefone" id="telefone" class="form-control phone" required="required" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                        <?php
                            if(isset($_SESSION["telefone"])){
                                echo'value="'.$_SESSION["telefone"].'"';
                            }
                        ?>
                    />
                </div>

                <div class = "col-lg-4 col-sm-12">
                    <div class="row">
                        <div class = "col">
                            <label style="padding: 1rem;"> CEP </label>
                            <input type="text" name="cep" id="cep" class="form-control cep" required="required"
                                <?php
                                    if(isset($_SESSION["cep"])){
                                        echo'value="'.$_SESSION["cep"].'"';
                                    }
                                ?>
                            />
                        </div>
                        <div class = "col-lg-4">
                            <label style="padding: 1rem;"> Número </label>
                            <input type="number" name="numero" id="numero" class="form-control" required="required"
                            <?php
                                if(isset($_SESSION["numero"])){
                                    echo'value="'.$_SESSION["numero"].'"';
                                }
                            ?>
                            />
                        </div>
                    </div>

                    <label style="padding: 1rem;"> Estado </label>
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

                    <label style="padding: 1rem;"> Cidade </label>
                    <input type="text" name="cidade" id="cidade" class="form-control" required="required"
                    <?php
                        if(isset($_SESSION["cidade"])){
                            echo'value="'.$_SESSION["cidade"].'"';
                        }
                    ?>
                    />

                    <label style="padding: 1rem;"> Bairro </label>
                    <input type="text" name="bairro" id="bairro" class="form-control" required="required"
                    <?php
                        if(isset($_SESSION["bairro"])){
                            echo'value="'.$_SESSION["bairro"].'"';
                        }
                    ?>
                    />

                    <label style="padding: 1rem;"> Rua </label>
                    <input type="text" name="rua" id="rua" class="form-control" required="required"
                    <?php
                        if(isset($_SESSION["rua"])){
                            echo'value="'.$_SESSION["rua"].'"';
                        }
                    ?>
                    />
                </div>

                <div class = "col-lg-4 col-sm-12">
                    <label style="padding: 1rem;"> Nome completo </label>
                    <input type="text" name="nome" id="nome" class="form-control" required="required"
                    <?php
                        if(isset($_SESSION["nome"])){
                            echo'value="'.$_SESSION["nome"].'"';
                        }
                    ?>
                    />

                    <label style="padding: 1rem;"> CPF </label>
                    <input type="text" name="cpf" id="cpf" class="form-control cpf" required="required" placeholder="000.000.000-00"
                    <?php
                        if(isset($_SESSION["cpf"]) && !isset($_GET["cpfjaexiste"])){
                            echo'value="'.$_SESSION["cpf"].'"';
                        }
                    ?>
                    />

                    <label style="padding: 1rem;"> E-mail </label>
                    <input type="email" name="email" id="email" class="form-control email" required="required" placeholder="exemplo@email.com"
                    <?php
                        if(isset($_SESSION["email"]) && !isset($_GET["emailjaexiste"])){
                            echo'value="'.$_SESSION["email"].'"';
                        }
                    ?>
                    />

                    <label style="padding: 1rem;"> Confirmação </label>
                    <input type="email" name="email" id="conf_email" class="form-control email" required="required" placeholder="exemplo@email.com"/>

                    <div class="row">
                        <div class = "col">
                            <label style="padding: 1rem;"> Senha </label>
                            <input type="password" name="senha" id="senha" class="form-control password" required="required"/>
                        </div>
                        <div class = "col">
                            <label style="padding: 1rem;"> Confirmação </label>
                            <input type="password" name="senha" id="conf_senha" class="form-control password" required="required"/>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <button type="submit" class="btn btn-dark btn-block">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

        <?php
            }
            else{
                session_start();

                include "conexao_pdo.php";

                $razao_social=$_POST["razao_social"];
                $nome_fantasia=$_POST["nome_fantasia"];
                $cnpj=$_POST["cnpj"];
                $telefone=$_POST["telefone"];
                $cep=$_POST["cep"];
                $cidade=$_POST["cidade"];
                $bairro=$_POST["bairro"];
                $rua=$_POST["rua"];
                $numero=$_POST["numero"];
                $nome=$_POST["nome"];
                $cpf=$_POST["cpf"];
                $email=$_POST["email"];
                $senha=$_POST["senha"];

                //Verifica Email
                $validaEmail = $link->prepare("SELECT cnpj from empresa WHERE email=:email");
                $validaEmail -> bindValue(":email", $email);

                $validaEmail -> execute();

                //Verifica CPF
                $validaCPF = $link->prepare("SELECT cnpj from empresa WHERE cpf=:cpf");
                $validaCPF -> bindValue(":cpf", $cpf);

                $validaCPF -> execute();

                //Verifica CNPJ
                $validaCNPJ = $link->prepare("SELECT cnpj from empresa WHERE cnpj=:cnpj");
                $validaCNPJ -> bindValue(":cnpj", $cnpj);

                $validaCNPJ -> execute();

                //Valida Cadastro
                $flagEmail=true;
                $flagCPF=true;
                $flagCNPJ=true;

                $stringHeader='Location: cadastro_empresa.php?';

                if($validaCNPJ->rowCount()>0){
                    $flagCNPJ=false;

                    if($stringHeader=='Location: cadastro_empresa.php?'){
                        $stringHeader.='cnpjjaexiste=true';
                    }else{
                        $stringHeader.='&cnpjjaexiste=true';
                    }
                }

                if($validaCPF->rowCount()>0){
                    $flagCPF=false;

                    if($stringHeader=='Location: cadastro_empresa.php?'){
                        $stringHeader.='cpfjaexiste=true';
                    }else{
                        $stringHeader.='&cpfjaexiste=true';
                    }
                }

                if($validaEmail->rowCount()>0){
                    $flagEmail=false;

                    if($stringHeader=='Location: cadastro_empresa.php?'){
                        $stringHeader.='emailjaexiste=true';
                    }else{
                        $stringHeader.='&emailjaexiste=true';
                    }
                }

                if($flagCNPJ && $flagCPF && $flagEmail){
                    $sth = $link->prepare('INSERT into empresa (razao_social, nome_fantasia, cnpj, categoria, telefone, cep, estado, cidade, bairro, rua, numero, nome, cpf, email, senha)
                    values (:razao_social, :nome_fantasia, :cnpj, :categoria, :telefone, :cep, :estado, :cidade, :bairro, :rua, :numero, :nome, :cpf, :email, :senha)');

                    $sth->bindValue(':razao_social', $razao_social, PDO::PARAM_STR);
                    $sth->bindValue(':nome_fantasia', $nome_fantasia, PDO::PARAM_STR);
                    $sth->bindValue(':cnpj', $cnpj, PDO::PARAM_STR);
                    $sth->bindValue(':categoria', $categoria, PDO::PARAM_STR);
                    $sth->bindValue(':telefone', $telefone, PDO::PARAM_STR);
                    $sth->bindValue(':cep', $cep, PDO::PARAM_STR);
                    $sth->bindValue(':estado', $estado, PDO::PARAM_STR);
                    $sth->bindValue(':cidade', $cidade, PDO::PARAM_STR);
                    $sth->bindValue(':bairro', $bairro, PDO::PARAM_STR);
                    $sth->bindValue(':rua', $rua, PDO::PARAM_STR);
                    $sth->bindValue(':numero', $numero, PDO::PARAM_STR);
                    $sth->bindValue(':nome', $nome, PDO::PARAM_STR);
                    $sth->bindValue(':cpf', $cpf, PDO::PARAM_STR);
                    $sth->bindValue(':email', $email, PDO::PARAM_STR);
                    $sth->bindValue(':senha', $senha, PDO::PARAM_STR);
                    $sth->execute();

                    header('Location: ../index.php');
                }else{
                    $_SESSION["razao_social"]=$razao_social;
                    $_SESSION["nome_fantasia"]=$nome_fantasia;
                    $_SESSION["cnpj"]=$cnpj;
                    $_SESSION["categoria"]=$categoria;
                    $_SESSION["telefone"]=$telefone;
                    $_SESSION["cep"]=$cep;
                    $_SESSION["estado"]=$estado;
                    $_SESSION["cidade"]=$cidade;
                    $_SESSION["bairro"]=$bairro;
                    $_SESSION["rua"]=$rua;
                    $_SESSION["numero"]=$numero;
                    $_SESSION["nome"]=$nome;
                    $_SESSION["cpf"]=$cpf;
                    $_SESSION["email"]=$email;

                    header($stringHeader);
                }
            }
        ?>

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
