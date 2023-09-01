<?php 
// Informações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main_owls_db";

try {
    // Criação da conexão PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuração do modo de erros do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exemplo de consulta
    $stmt = $conn->prepare("SELECT * FROM first_test");
    $stmt->execute();

    // Obtendo os resultados
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    exit(json_encode($result));
}catch(PDOException $e) {
    exit("Erro na conexão: " . $e->getMessage());
}
?>