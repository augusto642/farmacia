<?php
include( 'classes/Mysql.php' );
$_SESSION['usuario']
?>
<div class="container-fluid">
    <div class="card" style="width: 800px;height: 520px;margin-left: 30px">

        <div style="margin-left: 100px;width: 500px;padding-left: 40px">
            <br/>
            <h3 style="margin-top: 15px">Adicionar Lembrete</h3>
            <fieldset>
                <form method="post" enctype="multipart/form-data">


                    <?php
                    if (isset( $_POST['acao'] )) {
                        $usuario = $_SESSION['usuario'];
                        $data = $_POST['data'];
                        $texto = $_POST['texto'];

                        $sql = MySql::conectar()->prepare( "INSERT INTO `tb_lembrete`  VALUES (null,?,?,?)" );
                        $sql->execute( array($texto, $data, $usuario) );


                    }
                    ?>


                    <div class="row">
                        <div class=" col-md-4" style="height: 100px;width: 250px">
                            <label for="exampleInputEmail1">Data para o Lembrete</label>
                            <input type="date" required type="text" class="form-control" name="data"
                                   placeholder="Digite a data que deve ser visto o lembrete">
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-md-4">
                            <label for="exampleInputEmail1">Texto</label>
                            <label>
                                <textarea style="height: 200px; width: 300px; border-radius: 4px" name="texto"
                                          placeholder="Digite o lembrete"></textarea>
                            </label>
                        </div>
                    </div>
<br/>
        </div>
        <div class="row">
            <div class="col-md-12"style="margin-left: 60px">
                <button type="submit" name="acao" class="btn btn-primary">Salvar</button>
                <a href="?pg=extras" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </div>
        </form>
        </fieldset>
    </div>
