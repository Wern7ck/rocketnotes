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

// Processar inserção de nova conta a pagar
if (isset($_POST['submit'])) {
    $id_empresa = $_POST['id_empresa'];
    $data_pagar = $_POST['data_pagar'];
    $valor = $_POST['valor'];

    // Inserir no banco de dados
    $query_inserir_conta = "INSERT INTO tbl_conta_pagar (id_empresa, data_pagar, valor) 
                            VALUES ('$id_empresa', '$data_pagar', '$valor')";
    if ($conexao->query($query_inserir_conta) === TRUE) {
        // Redirecionar para a página inicial após inserção bem sucedida
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao inserir conta a pagar: " . $conexao->error;
    }
}

// Editar conta

if (isset($_GET['editar'])) {
    $id_conta_pagar = $_GET['id_conta_pagar'];
    // Implementar lógica para editar conta a pagar
    // Exemplo: UPDATE tbl_conta_pagar SET ... WHERE id_conta_pagar = $id_conta_pagar
    header('Location: index.php');
    exit;
}

// Excluir conta 

if (isset($_POST['excluir'])) {
    $id_conta_pagar = $_POST['id_conta_pagar'];
    $query_excluir = "DELETE FROM tbl_conta_pagar WHERE id_conta_pagar = $id_conta_pagar";
    if ($conexao->query($query_excluir) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao excluir conta a pagar: " . $conexao->error;
    }
}

// Marcar conta como paga

if (isset($_POST['marcar_pago'])) {
    $id_conta_pagar = $_POST['id_conta_pagar'];
    $query_marcar_pago = "UPDATE tbl_conta_pagar SET pago = 1 WHERE id_conta_pagar = $id_conta_pagar";
    if ($conexao->query($query_marcar_pago) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao marcar conta como pago: " . $conexao->error;
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>