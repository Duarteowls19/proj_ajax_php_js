<?php /*
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Origin: *");
*/

// Informações de conexão com o banco de dados
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main_owls_db";

try {
    // Criação da conexão PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuração do modo de erros do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário
        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];

        // Insere os dados no banco de dados
        $stmt = $conn->prepare("INSERT INTO first_test (name, email, msg) VALUES (:name, :email, :msg)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':msg', $msg);
        $stmt->execute();

        <> ,.çÇÇççç;;:<>ÇÇççççÇÇÇÇÇçç{}[\\\|||]

        echo 'enviado com sucesso';
    }

} catch (PDOException $e) {
    exit("Erro na conexão: " . $e->getMessage());
}*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main_owls_db";

try {
    // Criação da conexão PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuração do modo de erros do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg'])) {
        // Obtém os valores dos campos do formulário
        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];

        // Insere os dados no banco de dados
        $stmt = $conn->prepare("INSERT INTO first_test (id,nome, email, msg) VALUES (null,:name, :email, :msg)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':msg', $msg);
        $stmt->execute();

        // Exemplo de retorno de resposta em JSON
        $response = [
            'success' => true,
            'message' => 'Dados do formulário recebidos e salvos com sucesso.'
        ];
        echo json_encode($response);
    } else {
        // Se algum campo estiver faltando, retorna uma resposta de erro em JSON
        $response = [
            'success' => false,
            'message' => 'Campos do formulário não foram enviados.'
        ];
        echo json_encode($response);
    }
} catch(PDOException $e) {
    // Em caso de erro na conexão ou na execução da consulta, retorna uma resposta de erro em JSON
    $response = [
        'success' => false,
        'message' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()
    ];
    echo json_encode($response);
}

?>