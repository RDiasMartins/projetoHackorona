<?php
    include "conexao_pdo.php";
    $cpf=$_SESSION["cpf"];

    $sth = $link->prepare('SELECT codigo
        FROM cupom_cliente
        WHERE cpf = :cpf');

    $sth -> bindValue(":cpf", $cpf);
    $sth->execute();
    print_r($sth);


    $sth = $link->prepare('SELECT codigo
        FROM cupom
        INNER JOIN cupom_cliente
        WHERE cupom_cliente.codigo=:cupom.codigo');
    $sth -> bindValue(":codigo", $codigo);
    $sth->execute();

    if($sth->rowCount()){
        $preco=0;
        while($linha=$sth->fetch()){
            $preco = $linha['valor'] - ($linha['valor'] * ($linha['desconto']/100));

            echo'
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="../imgCupom/'.$linha['imagemcupom'].'" class="card-img" width="100%" height="100%" >
                        <div class="card-body">
                        <p class="card-text"><h4 class="card-title">'.$linha['titulo'].'</h5></p>
                            <h5 class="card-title">Desconto: '.$linha['desconto'].'%</h4>
                            <div class="card-title">De:
                                <h5  style="color:red; text-decoration:line-through;" class="valor">R$'.$linha['valor'].'</h5>Por:
                                <h5 style="color:green;" class="novoValor">R$'.$preco.'</h5>
                            </div>
                            <p class="card-text ">'.$linha['descricao'].'</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="finaliza_compra.php?codigo='.$linha['codigo'].'&cpf='.$_SESSION['cpf'].'"style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Comprar</a>
                            </div>
                            <small class="text-muted">Duração de 6 meses</small>
                        </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }else{
        echo '<tr><td colspan="6"><h2 class=" display-5 text-center">Nenhum cupom cadastrado</h2></td></tr>';
    }
?>