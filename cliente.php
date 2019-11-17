<?php
include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    MySql::conectar()->exec( "DELETE FROM `tb_clientes` WHERE id = $id" );
}


?>

<?php
$sql=MySql::conectar()->prepare("SELECT * FROM `tb_clientes`");
$sql->execute();
$clientes= $sql->fetchAll();

    ?>



<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-2">
            <h2>Clientes</h2>
        </div>
        <div class="col-sm-6" >



        </div>
        <div class="col-sm-4 btn-lista">
            <a class="btn btn-primary" href="?pg=adicionar-cliente"><i class="fa fa-plus"></i> Novo Cliente</a>
            <a class="btn btn-default" href="?pg=cliente"><i class="fa fa-refresh"></i> Atualiza</a>
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
                    <th>Cpf</th>
                    <th>Data de Cadastro</th>
                    <th class="actions">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<?php foreach ($clientes as $value) : ?>
                    <td><?php echo $value['id']?></td>
                    <td><?php echo $value['nome']?></td>
                    <td><?php echo $value['cpf']?></td>
                    <td><?php echo $value['dataNascimento']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs" href="?pg=visualizar-cliente&id=<?php echo $value['id']; ?>">Visualizar</a>
                        <a class="btn btn-warning btn-xs" href="?pg=editar-cliente&id=<?php echo $value['id']; ?> ">Editar</a>
                        <a class="btn btn-danger btn-xs"  href="?pg=cliente&deletar=<?php echo $value['id']; ?>">Excluir</a>
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