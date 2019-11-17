<div class="lista-cliente">
    <div class="row">
        <div class="col-lg-5">
            <h5>Relatório de vendas por: <a href = "main.php?pg=relatorios">mês</a> / cliente</h5>
        </div>
    </div>

    <div id="top" class="row">
        <div class="col-lg-5">
            <h2>Vendas por cliente</h2>
        </div>
    </div>


    <div id="list" class="row">
		<div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Compras</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include ('classes/Mysql.php');
                        $query = "SET lc_time_names = 'pt_BR';";
                        $sql=MySql::conectar()->prepare($query);
                        $sql->execute();
                        $query =  "SELECT cli.nome as nome
                                        , REPLACE(ROUND(SUM(ven.valor), 2), '.', ',') AS val 
                                        , COUNT(cli.id) as qtd
                                        
                                    FROM `tb_vendas` AS ven
                                    
                            INNER JOIN `tb_clientes` AS cli 
                                    ON ven.cliente = cli.id
                                        
                                GROUP BY cli.id 
                                
                                ORDER BY cli.nome asc";
                        $sql=MySql::conectar()->prepare($query);
                        $sql->execute();
                        $produtos= $sql->fetchAll();
                        foreach ($produtos as $value):
                            echo "	<tr>
                                        <td>" . ucfirst($value['nome']) . "</td>
                                        <td>{$value['qtd']}</td>
                                        <td>R$ {$value['val']}</td>
                                    </tr>";
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
	</div>
</div>