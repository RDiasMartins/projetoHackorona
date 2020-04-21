<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <title> Validação de login </title>
    </head>
    <body>
        <?php
            include "conexao_pdo.php";

            $EmailLogar = $_POST["EmailLogin"];
            $SenhaLogar = $_POST["SenhaLogin"];

            $checkLogin = $_POST["checkLogin"];

            if($checkLogin==1){
                $_SESSION["tabela"]='cliente';

                $sth = $link->prepare('SELECT cpf, email, nome
                    FROM cliente
                    WHERE email =:email and senha=:senha');
                $sth->bindValue(':email', $EmailLogar, PDO::PARAM_STR);
                $sth->bindValue(':senha', $SenhaLogar, PDO::PARAM_STR);
                $sth->execute();

                $linha=$sth->fetch();

            }else{
                $_SESSION["tabela"]='empresa';

                $sth = $link->prepare('SELECT nome_fantasia, cnpj, nome, cpf, email, cep, estado, cidade, bairro, rua, numero
                    FROM empresa
                    WHERE email =:email and senha=:senha');
                $sth->bindValue(':email', $EmailLogar, PDO::PARAM_STR);
                $sth->bindValue(':senha', $SenhaLogar, PDO::PARAM_STR);
                $sth->execute();

                $linha=$sth->fetch();



            }

            if($linha){
                if($checkLogin==1){
                    $_SESSION["cpf"]=$linha['cpf'];
                    $_SESSION["EmailLogado"]=$linha['email'];
                    $_SESSION["NomeLogado"]=$linha['nome'];

                }
                else{
                    $_SESSION["cnpj"]=$linha['cnpj'];
                    $_SESSION["cpf"]=$linha['cpf'];
                    $_SESSION["EmailLogado"]=$linha['email'];
                    $_SESSION["nome_fantasia"]=$linha['nome_fantasia'];
                    $_SESSION["NomeProprietario"]=$linha['nome'];

                    $cep=$linha['cep'];
                    $rua=$linha['rua'];
                    $numero=$linha['numero'];
                    $bairro=$linha['bairro'];
                    $cidade=$linha['cidade'];
                    $estado=$linha['estado'];

                    $endereco=$cep."<br/>".$rua." ".$numero. " - ".$bairro."<br/>".$cidade. " - ". $estado;
                    $_SESSION["endereco"]=$endereco;
                }

                if($_SESSION["tabela"]=='cliente'){
                    $_SESSION["cliente"]=$EmailLogar;
                    header('Location: homeUsuario.php');

                }else{
                    $_SESSION["empresa"]=$EmailLogar;
                    header('Location: homeEmpresa.php');
                }
            }else{
                session_destroy();
        ?>
        <script>
            window.location.href= "../index.php";
            window.alert("Usuário inválido!");
        </script>
        <?php
            }

        ?>
    </body>
</html>
