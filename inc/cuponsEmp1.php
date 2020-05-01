<div class="row">
<?php
    include "../php/conexao_pdo.php";
    $cnpj=$_SESSION["cnpj"];

    $sth = $link->prepare('SELECT *
        FROM cupom
        INNER JOIN empresa
        ON cupom.empresa=empresa.cnpj AND cupom.empresa=:cnpj' );
    $sth -> bindValue(":cnpj", $cnpj);
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
                                <a href="#"style="background-color:#FFDB58; color:white;"class="btn btn-warning btn-lg">Cadastrado</a>
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
</div>