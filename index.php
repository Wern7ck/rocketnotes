<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Pagar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Adicionar Conta a Pagar</h2>
    <form action="processar_conta.php" method="POST">
        <?php
        // Conexão com o banco de dados (substitua pelos seus dados de conexão)
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $banco = 'projeto_titan';
        $conexao = new mysqli($host, $usuario, $senha, $banco);

        // Verifica se houve erro na conexão
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Consulta para obter as empresas cadastradas
        $query_empresas = "SELECT id_empresa, nome FROM tbl_empresa";
        $result_empresas = $conexao->query($query_empresas);

        if ($result_empresas->num_rows > 0) {
            echo '<label for="id_empresa">Empresa:</label>';
            echo '<select id="id_empresa" name="id_empresa" required>';
            while ($row = $result_empresas->fetch_assoc()) {
                echo '<option value="' . $row["id_empresa"] . '">' . $row["nome"] . '</option>';
            }
            echo '</select><br><br>';
        } else {
            echo "Não há empresas cadastradas.";
        }
        ?>
        <label for="data_pagar">Data de Pagamento:</label>
        <input type="date" id="data_pagar" name="data_pagar" required><br><br>
        
        <label for="valor">Valor a Pagar:</label>
        <input type="number" id="valor" name="valor" step="0.01" required><br><br>
        
        <button type="submit" name="submit">Inserir</button>
    </form>




    <hr>

    <h2>Contas a Pagar</h2>
    <table>
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Data de Pagamento</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta para obter as contas a pagar
            $query_contas = "SELECT cp.id_conta_pagar, e.nome AS empresa, cp.data_pagar, cp.valor, cp.pago 
                             FROM tbl_conta_pagar AS cp
                             INNER JOIN tbl_empresa AS e ON cp.id_empresa = e.id_empresa";
            $result_contas = $conexao->query($query_contas);

            if ($result_contas->num_rows > 0) {
                while ($row = $result_contas->fetch_assoc()) {
                    // Formatando o valor
                    $valor_formatado = 'R$ ' . number_format($row["valor"], 2, ',', '.');

                    // Definindo o status com base no campo pago
                    $status = ($row["pago"] == 1) ? 'Pago' : 'A pagar';

                    echo '<tr>';
                    echo '<td>' . $row["empresa"] . '</td>';
                    echo '<td>' . $row["data_pagar"] . '</td>';
                    echo '<td>' . $valor_formatado . '</td>';
                    echo '<td>' . $status . '</td>';
                    echo '<td>';
                    echo '<form action="processar_conta.php" method="POST">';
                    echo '<input type="hidden" name="id_conta_pagar" value="' . $row["id_conta_pagar"] . '">';
                    echo '<button type="submit" name="editar">Editar</button>';
                    echo '<button type="submit" name="excluir">Excluir</button>';
                    if ($row["pago"] == 0) {
                        echo '<button type="submit" name="marcar_pago">Marcar como Pago</button>';
                    }
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo "<tr><td colspan='5'>Não há contas a pagar cadastradas.</td></tr>";
            }

            // Fechar conexão com o banco de dados
            $conexao->close();
            ?>
        </tbody>
    </table>

    <script>
        // Pode adicionar JavaScript aqui para funcionalidades adicionais
    </script>
</body>
</html>