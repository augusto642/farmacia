
<?php
include ('classes/Mysql.php');

$id=$_GET['id'];
$sql= MySql::conectar()->prepare("SELECT * FROM `tb_produtos` where id=$id");
$sql->execute();
$produto= $sql->fetch();



?>
<div class="cadastro-cliente">
    <h3 class="page-header">Editar Produto</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data">

        <?php
        if (isset( $_POST['acao'] )) {
            $descricao = $_POST['descricao'];
            $codInterno = $_POST['codInterno'];
            $codBarras = $_POST['codBarras'];
            $fornecedor = $_POST['fornecedor'];
            $custo = $_POST['custo'];
            $venda = $_POST['venda'];
            $quantidade = $_POST['quantidade'];
            $principio = $_POST['principio'];

              $sql = MySql::conectar()->prepare("INSERT INTO `tb_clientes` VALUES (null,?,?,?,?,?,?,?,?)");
            $sql->execute(array($descricao,$codInterno,$codBarras,$fornecedor,$custo,$venda,$quantidade,$principio));


        }
        ?>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Descricao</label>
                <input type="text" required type="text" class="form-control" name="descricao" value="<?php echo $produto['descricao'];?>">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Codigo Interno</label>
                <input type="number" required type="number" class="form-control" name="codInterno" value="<?php echo $produto['codInterno'];?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Codigo de Barras</label>
                <input type="number" required type="number" class="form-control" name="codBarras" value="<?php echo $produto['codBarras'];?>">
            </div>
            <div class="form-group col-sm-5">
                <label for="exampleInputEmail1">Fornecedor</label>
                <input type="text" required type="text" class="form-control" name="fornecedor" value="<?php echo $produto['fornecedor'];?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label>Valor de custo</label>
                <input type="number" required type="number" class="form-control" name="custo" value="<?php echo $produto['custo']?>">
            </div>

            <div class="form-group col-md-3">
                <label>Valor de venda</label>
                <input type="number" required type="number" class="form-control" name="venda" value="<?php echo $produto['venda']?>">
            </div>
            <div class="form-group col-md-3">
                <label>Quantidade</label>
                <input type="number" required type="number" class="form-control" name="quantidade" value="<?php echo $produto['quantidade'];?>">
            </div>
        </div>
        <div class="row">

            <div class="form-group col-md-5">
                <label >Principio Ativo</label>
                <input type="text" required type="text" class="form-control" name="principio" value="<?php echo $produto['principio']?>">
            </div>

        </div>


        <hr/>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Atualizar</button>
                <a href="?pg=fornecedores" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>