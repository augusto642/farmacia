<?php
include ('classes/Mysql.php');
?>
<div class="cadastro-cliente">
    <h3 class="page-header">Adicionar Fornecedor</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data">

        <?php
        if (isset( $_POST['acao'] )) {
            $nome = $_POST['nome'];
            $cnpj = $_POST['cpf'];
            $inscricao = $_POST['inscricao'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $cep = $_POST['cep'];
            $uf = $_POST['uf'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];

            $sql = MySql::conectar()->prepare("INSERT INTO `tb_fornecedores` VALUES (null,?,?,?,?,?,?,?,?,?,?,?)");
            $sql->execute(array($nome,$cnpj,$inscricao,$endereco,$numero,$bairro,$cidade,$cep,$uf,$telefone,$email));


        }
        ?>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" required type="text" class="form-control" name="nome" placeholder="Digite o Nome">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Cnpj</label>
                <input type="number" required type="number" class="form-control" name="cpf" placeholder="Digite o cpf">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Inscrição Estadual</label>
                <input type="number" required type="number" class="form-control" name="inscricao"
                       placeholder="Digite a Data de Nascimento">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Endereco</label>
                <input type="text" required type="text" class="form-control" name="endereco"
                       placeholder="Digite o Endereco">
            </div>
            <div class="form-group col-sm-2">
                <label for="exampleInputEmail1">Numero</label>
                <input type="number" required type="number" class="form-control" name="numero"
                       placeholder="Digite o Numero da residencia">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Bairro</label>
                <input type="text" required type="text" class="form-control" name="bairro"
                       placeholder="Digite o Bairro">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Cidade</label>
                <input type="text " required type="text" class="form-control" name="cidade"
                       placeholder="Digite a cidade">
            </div>

            <div class="form-group col-md-4">
                <label>Cep</label>
                <input type="text " required type="text" class="form-control" name="cep" placeholder="Digite o cep">
            </div>
            <div class="form-group col-md-2">
                <label>UF</label>
                <input type="text" required type="text" class="form-control" name="uf" placeholder="Digite o Uf">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Telefone</label>
                <input type="tel" required type="tel" class="form-control" name="telefone"
                       placeholder="Digite o Telefone">
            </div>


            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" required type="tel" class="form-control" name="email" placeholder="Digite o valor">
            </div>

        </div>


        <hr/>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Salvar</button>
                <a href="?pg=fornecedores" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>