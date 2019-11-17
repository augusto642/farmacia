<?php
include ('classes/Mysql.php');
$id=$_GET['id'];
$sql= MySql::conectar()->prepare("SELECT * FROM `tb_produtos` where id=$id");
$sql->execute();
$produto= $sql->fetch();


?>



<h3 class="page-header">Produto <?php echo $produto['id']?></h3>

<div class="row">
    <div class="col-md-4">
        <p><strong>Descricao</strong></p>
        <p><?php echo $produto['descricao']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Codigo INterno</strong></p>
        <p><?php echo $produto['codInterno']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Codigo de Barras</strong></p>
        <p><?php echo $produto['codBarras']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Fornecedor</strong></p>
        <p><?php echo $produto['fornecedor']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Valor de Custo</strong></p>
        <p><?php echo $produto['custo']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Valor de Venda</strong></p>
        <p><?php echo $produto['venda']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Quantidade</strong></p>
        <p><?php echo $produto['quantidade']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Principio Ativo</strong></p>
        <p><?php echo $produto['principio']?></p>
    </div>

</div>

<hr />
<div id="actions" class="row">
    <div class="col-md-12">
        <a href="?pg=produtos" class="btn btn-primary">Fechar</a>
        <a href="?pg=editar-produto&id=<?php echo $produto['id']?>" class="btn btn-dark">Editar</a>
        <a href="pg=produto&deletar=<?php echo $produto['id']?>" class="btn btn-danger">Excluir</a>
    </div>
</div>
<br>
<script>
    $modal=('#delete-modal').modal('show');
</script>

