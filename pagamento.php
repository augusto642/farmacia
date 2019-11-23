<?php
include( 'classes/Mysql.php' );

?>

<div class="container-fluid">


    <div class="card" style="width: 800px; height: 450px; margin-left: 95px">

        <form id="finalizar" class="form-cliente" method="post" enctype="multipart/form-data" action="cupon-fiscal.php?cupon=<?php echo $_GET['notaFiscal']?>&total=<?php echo $_GET['total']?>">
            <div class="col-md-4 cc">
                <label>Forma de Pagamento
                    <select name="pagamento" style="width: 150px;height: 25px;margin-left: 38px">
                        <option>Dinheiro</option>
                        <option>Cartao Debito</option>
                        <option>Cartao Credito</option>
                    </select></label>
                <br>
                <br>
                Cliente
                    <select name="cliente" style="width: 140px;height: 25px">
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
                <br/>
                <br/>
                <br/>
                <label>Total
                    <input type="text" name="total" style="width: 150px" value="<?php echo $_GET['total']; ?>" disabled></label>
                <br/>
                <br/>


                <br/>
                <br/>

            <button type="submit" name="finalizar" style="background-color:#4caf50;color: white;border-color:#4caf50;cursor: pointer;width: 120px;height: 37px;margin-left: 100px;margin-top: 10px"> Finalizar</button>
</form>
            </div>
    <div class="col-md-3">
        <div class="card" style="width: 370px; height: 400px; margin-left: 100px;margin-top: 20px">
            <br/>
            <h3 style="margin-left: 60px">Lista de Compras</h3>
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
                $sql = MySql::conectar()->prepare( "SELECT * FROM tb_venda_produtos where n_nota_fiscal= '$n'" );
                $sql->execute();
                $item = $sql->fetchAll();
                $proID = array_column($item, 'codBarras');

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
                    <?php
                    ?>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
<br/>

</div>


