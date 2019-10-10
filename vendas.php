

<div class="container-fluid">

<?php
$aa=$_GET['notaFiscal'];
?>

    <form action="php" method="post" >

        <input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="notaFiscal" value="<?php echo $_GET['notaFiscal']; ?>" />
        <select name="product" style="width:650px; "class="chzn-select" required>
            <option></option>
            <?php
            include('classes/Mysql.php');
            $result = MySql::conectar()->prepare("SELECT * FROM tb_produtos");
            $result->bindParam(':userid', $res);
            $result->execute();
            for($i=0; $row = $result->fetch(); $i++){
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['codInterno']; ?> - <?php echo $row['descricao']; ?> - <?php echo 'R$' .$row['venda']; ?></option>
                <?php
            }
            ?>
        </select>
        <input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
        <input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
        <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
        <Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
    </form>
    <table class="table table-bordered" id="resultTable" data-responsive="table">
        <thead>
        <tr>
            <th> Nombre Producto</th>
            <th> Nombre generico </th>
            <th> Categoria / Descripccion </th>
            <th> Precio </th>
            <th> Qty </th>
            <th> Cantidad </th>
            <th> lucro </th>
            <th> Accion </th>
        </tr>
        </thead>
        <tbody>

        <?php
        $id=$_GET['notaFiscal'];

        $result = MySql::conectar()->prepare("SELECT * FROM tb_venda_produtos WHERE n_nota_fiscal= :userid");
        $result->bindParam(':userid', $id);
        $result->execute();
        for($i=1; $row = $result->fetch(); $i++){
            ?>
            <tr class="record">
                <td hidden><?php echo $row['codInterno']; ?></td>
                <td><?php echo $row['codBarras']; ?></td>
                <td><?php echo $row['descricao']; ?></td>
                <td><?php echo $row['valor']; ?></td>
                <td>
                    <?php
                    $ppp=$row['valor'];
                    echo formatMoney($ppp, true);
                    ?>
                </td>
                <td><?php echo $row['quant']; ?></td>

                <td width="90"><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&nota=<?php echo $_GET['notaFiscal']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <th> </th>
            <th>  </th>
            <th>  </th>
            <th>  </th>
            <th>  </th>
            <td> Cantidad total: </td>
            <td> Lucro total: </td>
            <th>  </th>
        </tr>
        <tr>
            <th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
            <td colspan="1"><strong style="font-size: 12px; color: #222222;">
                    <?php
                    function formatMoney($number, $fractional=false) {
                        if ($fractional) {
                            $number = sprintf('%.2f', $number);
                        }
                        while (true) {
                            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                            if ($replaced != $number) {
                                $number = $replaced;
                            } else {
                                break;
                            }
                        }
                        return $number;
                    }
                    $sdsd=$_GET['notaFiscal'];
                    $resultas = MySql::conectar()->prepare("SELECT sum(valor) FROM tb_venda_produtos WHERE n_nota_fiscal= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                        $fgfg=$rowas['sum(valor)'];
                        echo formatMoney($fgfg, true);
                    }
                    ?>
                </strong></td>
            <td colspan="1"><strong style="font-size: 12px; color: #222222;">

            </td>
            <th></th>
        </tr>

        </tbody>
    </table><br>
    <a rel="facebox" href=""><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> Guardar</button></a>
</div>

