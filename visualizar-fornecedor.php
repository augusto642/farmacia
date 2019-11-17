<?php

include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    MySql::conectar()->exec( "DELETE FROM `tb_fornecedores` WHERE id = $id" );
}


?>

<?php
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql= MySql::conectar()->prepare("SELECT * FROM `tb_fornecedores` where id=$id");
    $sql->execute();
    $fornecedor= $sql->fetch();
}


?>

<div class="visualizar-fornecedor">

<h3 class="page-header">Fornecedor #1<?php $fornecedor['id'];?></h3>

<div class="row">
    <div class="col-md-4">
        <p><strong>Nome</strong></p>
        <p><?php echo $fornecedor['nome'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Cnpj</strong></p>
        <p><?php echo $fornecedor['cnpj'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Inscrição Estadual</strong></p>
        <p><?php echo $fornecedor['inscricao'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Endereco</strong></p>
        <p><?php echo $fornecedor['endereco'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Numero</strong></p>
        <p><?php echo $fornecedor['numero'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>bairro</strong></p>
        <p><?php echo $fornecedor['bairro'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Cidade</strong></p>
        <p><?php echo $fornecedor['cidade'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Cep</strong></p>
        <p><?php echo $fornecedor['cep'];?></p>
    </div>

    <div class="col-md-2">
        <p>
            <strong>UF</strong>
        </p>
        <p><?php echo $fornecedor['uf'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Telefone</strong></p>
        <p><?php echo $fornecedor['telefone']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Email</strong></p>
        <p><?php echo $fornecedor['email']?></p>
    </div>

</div>

<hr />
<div id="actions" class="row">
    <div class="col-md-12">
        <a href="?pg=fornecedores" class="btn btn-primary">Fechar</a>
        <a href="?pg=editar-fornecedor&id=<?php echo $fornecedor['id']?> " class="btn btn-dark">Editar</a>
        <a href="?pg=fornecedores&deletar=<?php echo $fornecedor['id']?>" class="btn btn-danger">Excluir</a>
    </div>
</div>
</div>
<br>
<script>
    $modal=('#delete-modal').modal('show');
</script>

