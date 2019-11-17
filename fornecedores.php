<?php
include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    MySql::conectar()->exec( "DELETE FROM `tb_fornecedores` WHERE id = $id" );
}
?>
<?php
$sql=MySql::conectar()->prepare("SELECT * FROM `tb_fornecedores`");
$sql->execute();
$fornecedores= $sql->fetchAll();
 ?>


<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-3">
            <h2>Fornecedores</h2>
        </div>
        <div class="col-sm-5" >

        </div>
        <div class="col-sm-4 btn-lista">
            <a class="btn btn-primary" href="?pg=adicionar-fornecedor"><i class="fa fa-plus"></i> Novo Fornecedor</a>
            <a class="btn btn-default" href="?pg=fornecedor"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>


 <hr />
    <div id="list" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cnpf</th>
                    <th>cidade</th>
                    <th class="actions">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<?php foreach ($fornecedores as $value) : ?>
                    <td><?php echo $value['id']?></td>
                    <td><?php echo $value['nome']?></td>
                    <td><?php echo $value['cnpj']?></td>
                    <td><?php echo $value['cidade']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs" href="?pg=visualizar-fornecedor&id=<?php echo $value['id']; ?>">Visualizar</a>
                        <a class="btn btn-warning btn-xs" href="?pg=editar-fornecedor&id=<?php echo $value['id']; ?> ">Editar</a>
                        <a class="btn btn-danger btn-xs"  href="?pg=fornecedores&deletar=<?php echo $value['id']; ?>">Excluir</a>
                    </td>
                </tr>

                <?php endforeach; ?>

                </tbody>
            </table>

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
