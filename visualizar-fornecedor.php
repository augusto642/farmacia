<?php
/*if(isset($_GET['id'])){
    $id= (int)$_GET['id'];
    $sql= MySql::conectar()->prepare("SELECT * FROM `tb_fornecedores` where id=$id");
    $sql->execute();
    $fornecedor= $sql->fetch();
}

*/
$fornecedor=0?><!-- apagar -->

<div class="visualizar-fornecedor">

<h3 class="page-header">Fornecedor #1<?php $fornecedor['id'];?></h3>

<div class="row">
    <div class="col-md-4">
        <p><strong>Nome</strong></p>
        <p>Lorem ipsum dolor sit amet<?php $fornecedor['Nome'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Cnpj</strong></p>
        <p>123.456.789-0<?php $fornecedor['cpf'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Inscrição Estadual</strong></p>
        <p>1234567/2013<?php $fornecedor['inscricao'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Endereco</strong></p>
        <p>In vel sollicitudin leo, id fermentum augue.<?php $fornecedor['endereco'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Numero</strong></p>
        <p>1234<?php $fornecedor['numero'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>bairro</strong></p>
        <p>Rua julio de castilho<?php $fornecedor['bairro'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Cidade</strong></p>
        <p>Cachoeira do sul <?php $fornecedor['cidade'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Cep</strong></p>
        <p>96500000</p>
    </div>

    <div class="col-md-2">
        <p>
            <strong>UF</strong>
        </p>
        <p>RS <?php echo $fornecedor['uf'];?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Telefone</strong></p>
        <p>5137246758<?php $fornecedor['telefone']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Email</strong></p>
        <p>email@email.com<?php $fornecedor['email']?></p>
    </div>

</div>

<hr />
<div id="actions" class="row">
    <div class="col-md-12">
        <a href="?pg=fornecedor" class="btn btn-primary">Fechar</a>
        <a href="?pg=editar-fornecedor" class="btn btn-dark">Editar</a>
        <a href="<?php echo $fornecedor['id']?>" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
    </div>
</div>
</div>
<br>
<script>
    $modal=('#delete-modal').modal('show');
</script>

