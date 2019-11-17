
<?php
include ('classes/Mysql.php');
$id=$_GET['id'];
    $sql= MySql::conectar()->prepare("SELECT * FROM `tb_usuarios` where id=$id");
    $sql->execute();
    $usuario= $sql->fetch();



?>



  <h3 class="page-header">Usuario <?php echo $usuario['id'];?></h3>
<?php
?>
<br>
<br>
<div class="visualizar-usuario">
<div class="row">
    <div class="col-md-3">
      <p><strong>Nome</strong></p>
  	  <p><?php echo $usuario['nome'];?></p>
    </div>

	<div class="col-md-3">
      <p><strong>Cargo</strong></p>
  	  <p><?php echo $usuario['cargo'];?></p>
    </div>

	<div class="col-md-3">
      <p><strong>Usuario</strong></p>
  	  <p><?php echo $usuario['usuario'];?></p>
    </div>

    <div class="col-md-3">
      <p><strong>Senha</strong></p>
  	  <p><?php echo $usuario['senha'];?></p>
    </div>

 </div>
</div>
<br>
<br>
 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="?pg=usuario" class="btn btn-primary">Fechar</a>
	 <a href="?pg=editar-usuario&id=<?php echo $usuario['id']?>" class="btn btn-dark">Editar</a>
	 <a href="?pg=usuario&deletar=<?php echo $usuario['id']?>" class="btn btn-danger">Excluir</a>
   </div>
 </div>


