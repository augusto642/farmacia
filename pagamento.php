<?php
include( 'classes/Mysql.php' );
$total = $_GET['total'];
if (isset( $_POST['desconto'] )) {
    $v = $_POST['desc'];
    $t = $v / 100;
    $resp = $total * $t;
    $r = $total - $resp;
    $total = $r;
    $_SESSION['total'] = $total;
}

?>
<?php

if (isset( $_POST['acao'] )) {
    $valor = $_SESSION['total'];
    $data = date( "m.d.y" );
    $vendedor = $_SESSION['nome'];
    $cliente = $_POST['cliente'];
    $n_NotaFiscal = $_GET['notaFiscal'];
    $pagamento = $_POST['pagamento'];

    $sql = MySql::conectar()->prepare( "INSERT INTO `tb_vendas` VALUES (null,?,?,?,?,?,?)" );
    $sql->execute( array($valor, $data, $vendedor, $cliente, $n_NotaFiscal, $pagamento) );
}

?>
<div class="container-fluid">
    <div class="card" style="width: 800px; height: 450px; margin-left: 95px">
        <form class="form-cliente" method="post" enctype="multipart/form-data">
            <div class="col-md-4 cc">
                <label>Forma de Pagamento:
                    <select name="pagamento" style="width: 200px">
                        <option>Dinheiro</option>
                        <option>Debito</option>
                        <option>Credito</option>
                    </select></label>
                <br>
                <br>
                <label>Cliente:
                    <select name="cliente" style="width: 200px">
                        <option>Nao Identificado</option>
                        <?php
                        $sql = MySql::conectar()->prepare( "SELECT * FROM tb_clientes" );
                        $sql->execute();
                        $cli = $sql->fetchAll();
                        foreach ($cli as $value) :
                            ?>
                            <option><?php echo $value['nome'] ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </label>
                <button>Adicionar cliente</button>
                <br>
                <br>
                <br>
                <br>
                <label>Total: </label> <input type="text" name="total" value="<?php echo $total; ?>" disabled>
                <br/>
                <br/>
                <form class="form-pag" style="margin-top: 300px">
                    <label>Desconto %</label> <input type="number" name="desc" style="width: 70px" min="0.00" max="10">
                    <button type="submit" name="desconto" class="btn btn-primary" style="width: 80px; height: 32px">
                        Aplicar
                    </button>
                    <br>
                </form>
                <br>

                <br/>
                <br/>
                <a href="#"><button class="btn btn-success btn-large btn-block" name="acao"><i
                                class="icon icon-save icon-large"></i> Finalizar
                    </button>
                </a>
        </form>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 350px; height: 350px; margin-left: 100px">
            <h3>Lista de Compras:</h3>
            <br>
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th>Cod</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                </tr>
                </thead>
                <?php
                $n = $_GET['notaFiscal'];
                $sql = MySql::conectar()->prepare( "SELECT * FROM tb_venda_produtos where n_nota_fiscal= $n" );
                $sql->execute();
                $item = $sql->fetchAll();

                foreach ( $item

                as $value ) :
                ?>


                <tbody>
                <tr>
                    <td><?php echo $value['codBarras'] ?></td>
                    <td><?php echo $value['descricao'] ?></td>
                    <td><?php echo $value['quant'] ?></td>
                    <td><?php echo $value['valor'] ?></td>

                    <?php
                    endforeach;
                    ?>

                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>



