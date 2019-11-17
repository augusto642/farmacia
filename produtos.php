<?php
include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    MySql::conectar()->exec( "DELETE FROM `tb_produtos` WHERE id = $id" );
}


?>

<?php

$sql=MySql::conectar()->prepare("SELECT * FROM `tb_produtos`");
$sql->execute();
$produtos= $sql->fetchAll();
?>


<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-2">
            <h2>Produtos</h2>
        </div>
        <div class="col-sm-6" >

        </div>
        <div class="col-sm-4 btn-lista">
            <a class="btn btn-primary" href="?pg=adicionar-produto"><i class="fa fa-plus"></i> Novo Produto</a>
            <a class="btn btn-default" href="?pg=produto"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>


   <hr />
    <div id="list" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th>Cod</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th class="actions">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<?php foreach ($produtos as $value): ?>
                    <td><?php echo $value['codInterno']?></td>
                    <td><?php echo $value['descricao']?></td>
                    <td><?php echo $value['quantidade']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs" href="?pg=visualizar-produto&id=<?php echo $value['id']; ?>">Visualizar</a>
                        <a class="btn btn-warning btn-xs" href="?pg=editar-produto&id=<?php echo $value['id']; ?> ">Editar</a>
                        <a class="btn btn-danger btn-xs"  href="?pg=produtos&deletar=<?php echo $value['id']; ?>">Excluir</a>
                    </td>
                </tr>
<?php
endforeach;
?>
                </tbody>
            </table>
        </div>

    <div id="bottom" class="row">
        <div class="col-md-12">
            <ul class="pagination">
                <li class="disabled"><a>&lt; Anterior</a></li>
                <li class="disabled"><a>1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
            </ul><!-- /.pagination -->
        </div>
    </div> <!-- /#bottom -->
    </div>