<?php
include ('classes/Mysql.php');
?>
<div class="cadastro-cliente">
<h3 class="page-header">Adicionar Cliente</h3>
<form class="form-cliente" method="post" enctype="multipart/form-data">

<?php

   if(isset($_POST['acao'])){
		$nome=$_POST['nome'];
		$cpf=$_POST['cpf'];
		$dataNascimento=$_POST['dataNascimento'];
		$endereco=$_POST['endereco'];
		$numero=$_POST['numero'];
		$bairro=$_POST['bairro'];
		$telefone=$_POST['telefone'];
		$celular=$_POST['celular'];
		$email=$_POST['email'];

        $sql = MySql::conectar()->prepare("INSERT INTO `tb_clientes` VALUES (null,?,?,?,?,?,?,?,?,?)");
        $sql->execute(array($cpf,$nome,$dataNascimento,$endereco,$numero,$bairro,$telefone,$celular,$email));


    }

?>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" required type="text" class="form-control" name="nome" placeholder="Digite o Nome">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Cpf</label>
            <input type="number" required type="number" class="form-control" name="cpf" placeholder="Digite o cpf">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Data Nacimento</label>
            <input type="date" required type="date" class="form-control" name="dataNascimento" placeholder="Digite a Data de Nascimento">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="exampleInputEmail1">Endereco</label>
            <input type="text" required type="text" class="form-control" name="endereco" placeholder="Digite o Endereco">
        </div>
        <div class="form-group col-sm-2">
            <label for="exampleInputEmail1">Numero</label>
            <input type="number" required type="number" class="form-control" name="numero" placeholder="Digite o Numero da residencia">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Bairro</label>
            <input type="text" required type="text" class="form-control" name="bairro" placeholder="Digite o Bairro">
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Telefone</label>
            <input type="tel"  required type="tel" class="form-control" name="telefone" placeholder="Digite o Telefone">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Celular</label>
            <input type="tel" class="form-control" name="celular" placeholder="Digite o Celular">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="exampleInputEmail1">Email</label>
            <input type="email"  required type= "tel" class="form-control" name="email" placeholder="Digite o valor">
        </div>

    </div>



    <hr />

    <div class="row">
        <div class="col-md-12">
            <button type="submit" name="acao" class="btn btn-primary">Salvar</button>
            <a href="?pg=cliente" class="btn btn-default">Cancelar</a>
        </div>
    </div>

</form>
</div>