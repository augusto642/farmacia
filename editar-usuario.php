<?php
include ('classes/Mysql.php');

$id=$_GET['id'];
$sql= MySql::conectar()->prepare("SELECT * FROM `tb_usuarios` where id=$id");
$sql->execute();
$usuario= $sql->fetch();



?>





<div class="adicionar-usuario">
    <h3 class="page-header">Adicionar usuario</h3>
    <fieldset>
        <form class="form-cliente" method="post" enctype="multipart/form-data">


            <?php //
            if(isset($_POST['acao'])){
                $nome=$_POST['nome'];
                $cargo=$_POST['cargo'];
                $usuario=$_POST['usuario'];
                $senha=$_POST['senha'];

                //  $sql = MySql::conectar()->prepare("INSERT INTO `tb_usuarios`  VALUES (null,?,?,?,?)");
                // $ql->execute(array($nome,$cargo,$usuario,$senha));


            }
            ?>



            <div class="form-usuario">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" required type="text" class="form-control" name="nome" placeholder="Digite o Nome" value="<?php echo $usuario['nome'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Cargo</label>
                        <input type="text" required type="text" class="form-control" name="cargo" placeholder="Digite o Cargo" value="<?php echo $usuario['cargo'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text"  required type="text" class="form-control" name="usuario" placeholder="Digite o Usuario" value="<?php echo $usuario['usuario'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Senha</label>
                        <input type="password"  required type= "password" class="form-control" name="senha" placeholder="Digite a Senha" value="<?php echo $usuario['nome'];?>">
                    </div>

                </div>
            </div>



            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="?pg=usuario" class="btn btn-default">Cancelar</a>
                </div>
            </div>

        </form>
    </fieldset>
</div>

