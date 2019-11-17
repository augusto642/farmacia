<?php

include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    MySql::conectar()->exec( "DELETE FROM `tb_clientes` WHERE id = $id" );
}


?>

<?php
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql= MySql::conectar()->prepare("SELECT * FROM `tb_clientes` where id=$id");
    $sql->execute();
    $cliente= $sql->fetch();
}


?>



  <h3 class="page-header">Cliente<?php echo $cliente['id']?></h3>

<div class="row">
    <div class="col-md-4">
      <p><strong>Nome</strong></p>
  	  <p><?php echo $cliente['nome']?></p>
    </div>

	<div class="col-md-4">
      <p><strong>Cpf</strong></p>
  	  <p><?php echo $cliente['cpf']?></p>
    </div>

	<div class="col-md-4">
      <p><strong>Data Nascimento</strong></p>
  	  <p><?php echo $cliente['dataNascimento']?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Endereco</strong></p>
  	  <p><?php echo $cliente['endereco']?></p>
    </div>

	<div class="col-md-4">
      <p><strong>Numero</strong></p>
  	  <p><?php echo $cliente['numero']?></p>
    </div>

	<div class="col-md-4">
      <p><strong>bairro</strong></p>
  	  <p><?php echo $cliente['bairro']?></p>
    </div>

    <div class="col-md-4">
      <p><strong>Telefone</strong></p>
  	  <p><?php echo $cliente['telefone']?></p>
    </div>

	<div class="col-md-4">
      <p><strong>Celular</strong></p>
  	  <p><?php echo $cliente['celular']?></p>
    </div>

	<div class="col-md-4">
      <p><strong>Email</strong></p>
  	  <p><?php echo $cliente['email']?></p>
    </div>

 </div>

 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="?pg=cliente" class="btn btn-primary">Fechar</a>
	 <a href="?pg=editar-cliente&id=<?php echo $cliente['id']?>" class="btn btn-dark">Editar</a>
	 <a href="?pg=cliente&deletar=<?php echo $cliente['id']?>" class="btn btn-danger">Excluir</a>
   </div>
 </div>
     <br>
<script>
  $modal=('#delete-modal').modal('show');
</script>

