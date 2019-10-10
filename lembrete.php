
<?php
include ('classes/Mysql.php');
?>

<div class="adicionar-usuario">
    <h3 class="page-header">Adicionar usuario</h3>
    <fieldset>
        <form class="form-cliente" method="post" enctype="multipart/form-data">


            <?php
            if(isset($_POST['acao'])){
                $usuario=$_POST['usuario'];
                $data=$_POST['data'];
                $texto=$_POST['texto'];

                $sql = MySql::conectar()->prepare("INSERT INTO `tb_lembrete`  VALUES (null,?,?,?)");
                $sql->execute(array($texto,$data,$usuario));


            }
            ?>



            <div class="form-usuario">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Usuario</label>
                        <?php

                        $sql=MySql::conectar()->prepare("SELECT * FROM tb_usuarios");
$sql->execute();
$reg=$sql->fetchAll();
$a=count($reg);
$cont=0;

                        ?>
                       <select name="usuario" size="1" style="width: 292px; height: 38px; border-radius: 4px">
                           <?php  while($cont<$a) { ?>
                               <option value="<?php echo $reg[$cont]['id']; ?>">
                                   <?php echo $reg[$cont]['nome'] ?>
                               </option>
                           <?php $cont++;
                           }
                           ?>
                       </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4" style="height: 100px">
                        <label for="exampleInputEmail1">Data para o Lembrete</label>
                            <input type="date" required type="text" class="form-control" name="data" placeholder="Digite a data que deve ser visto o lembrete">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Texto</label>
                        <label>
                            <textarea style="height: 200px; width: 300px; border-radius: 4px" name="texto" placeholder="Digite o Recado"></textarea>
                        </label>
                    </div>
                </div>


            </div>



            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="acao" class="btn btn-primary">Salvar</button>
                    <a href="?pg=usuario" class="btn btn-default">Cancelar</a>
                </div>
            </div>

        </form>
    </fieldset>
</div>

