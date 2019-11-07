<?php
include ('classes/Mysql.php');

?>
<div class="cadastro-cliente">
    <h3 class="page-header">Adicionar Produto</h3>
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

            $sql = MySql::conectar()->prepare("INSERT INTO `tb_produtos` VALUES (null,?,?,?,?,?,?,?,?)");
            $sql->execute(array($descricao,$codInterno,$codBarras,$fornecedor,$custo,$venda,$principio,$quantidade));


        }
        ?>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Descricao</label>
                <input type="text" required type="text" class="form-control" name="descricao" placeholder="Digite a Descroção do produto">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Codigo Interno</label>
                <input type="number" required type="number" class="form-control" name="codInterno" placeholder="Digite o codigo interno">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Codigo de Barras</label>
                <input type="number" required type="number" class="form-control" name="codBarras"
                       placeholder="Digite o Codigo de Barras">
            </div>
            <div class="form-group col-sm-5">
                <label for="exampleInputEmail1">Fornecedor</label>
                <label for="exampleInputEmail1">Usuario</label>
                <?php

                $sql=MySql::conectar()->prepare("SELECT * FROM tb_fornecedores");
                $sql->execute();
                $reg=$sql->fetchAll();
                $a=count($reg);
                $cont=0;

                ?>
                <select name="fornecedor" size="1" style="width: 292px; height: 38px; border-radius: 4px">
                    <?php  while($cont<$a) { ?>
                        <option value="<?php echo $reg[$cont]['id']; ?>">
                            <?php echo $reg[$cont]['nome'] ?>
                        </option>
                        <?php $cont++;
                    }
                    ?>
                </select>

        </div>

        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label>Valor de custo</label>
                <input type="number" required type="number" class="form-control" name="custo" placeholder="Digite o valor de custo do produto" step="0.01">
            </div>

            <div class="form-group col-md-3">
                <label>Valor de venda</label>
                <input type="number" required type="number" class="form-control" name="venda" placeholder="Digite o Valor de venda " step="0.01">
            </div>
            <div class="form-group col-md-3">
                <label>Quantidade</label>
                <input type="number" required type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade do produto">
            </div>
        </div>
        <div class="row">

            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Principio Ativo</label>
                <input type="text" required type="text" class="form-control" name="principio" placeholder="Digite o Principio Ativo">
            </div>

        </div>


        <hr/>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Salvar</button>
                <a href="?pg=produtos" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>