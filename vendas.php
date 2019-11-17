<?php
	$aa=$_GET['notaFiscal'];
?>

<?php

	include ("classes/Mysql.php");
    if(isset($_POST['acao'])){
		$id = $_POST['produto'];
		$sql = MySql::conectar()->prepare( "SELECT * from tb_produtos id where id=" . $_POST['produto']);
		$sql->execute();
		$pro = $sql->fetch();
		$nota_fiscal = $aa;
		$codBarras = $pro['codBarras'];
		$descricao = $pro['descricao'];
		$quant = $_POST['qty'];
		$valor = $pro['venda'];
	   $sql = MySql::conectar()->prepare( "INSERT INTO `tb_venda_produtos` VALUES (null,?,?,?,?,?)" );
	   $sql->execute( array($nota_fiscal, $codBarras, $descricao, $quant, $valor) );
	}

	if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    MySql::conectar()->exec( "DELETE FROM `tb_venda_produtos` WHERE id = $id" );
}
?>

<div class="container-fluid">



    <form   method="post"  enctype="multipart/form-data">

        <input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="notaFiscal" value="<?php echo $_GET['notaFiscal']; ?>" />
        <select name="produto" style="width:650px; "class="chzn-select" required>
            <option></option>
            <?php

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

        <input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 50px; height:30px; padding-top:6px; padding-bottom: 4px; margin-left: 6px; font-size:15px;margin-right: 5px;" / required>
        <input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
        <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
        <Button type="submit" name="acao" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
    </form>
    <br/>
    <table class="table table-bordered" id="resultTable" data-responsive="table" style="background-color: white">
        <thead>
        <tr>
            <th> Codigo de Barras</th>
            <th> Descrição </th>
            <th> Preco </th>
            <th> Quantidade </th>
            <th> Ação </th>
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

                <td><?php echo $row['quant']; ?></td>

                <td width="90"><a href="?pg=vendas&notaFiscal=<?php echo $aa ?>&deletar= <?php echo $row['id']; ?> "><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancelar </button></a></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <th colspan="4"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
            <td colspan="1"><strong style="font-size: 12px; color: #222222;">
                    <?php

                    $sdsd=$_GET['notaFiscal'];
                    $resultas = MySql::conectar()->prepare("SELECT sum(valor*quant) FROM tb_venda_produtos WHERE n_nota_fiscal= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                        $fgfg=$rowas['sum(valor*quant)'];
                        echo $fgfg;
                    }
                    ?>
                </strong></td>
            
        </tr>

        </tbody>
    </table><br>
    <a href="?pg=pagamento&total=<?php echo $fgfg;?>&notaFiscal=<?php echo $aa?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> Salvar</button></a>
</div>
