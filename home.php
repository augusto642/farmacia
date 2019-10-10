<?php
include( 'classes/Mysql.php' );
$usuario = $_SESSION['usuario'];
?>
<div class="home">
    <div class="rom">
        <div class="col-md-4">
                <div class="card" style="width: 320px;height: 320px">
<div class="">
    <h2 class="h1-mensagem">Bem vindo</h2>
    <h3 class="h2-mensagem"><?php echo $usuario ?></h3>
</div>
                </div>

        </div>

        <div class="col-md-7">
            <div class="card" style="width: 630px;height: 350px">
                <div class="table-responsive col-md-12">
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Nome</th>
                            <th>Quantidade</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                        </tr>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-7">
            <div class="card" style="width: 992px;height: 150px">
                <?php
                $sql=MySql::conectar()->prepare("SELECT * FROM tb_lembrete");
                $sql->execute();
                $lembrete=$sql->fetchAll();
                ?>
            <?php
            foreach ($lembrete as $value):
            ?>

<table>
    <tr>
        <div class="card"  style="width: 220px;height: 128px; float: left; margin-top: 10px;margin-left: 12px ">
            <?php
            echo $value['texto'];
            ?>
        </div>

                <?php
                endforeach;
                ?>
                </tr>
                </table>

    </div>
</div>
    </div>


