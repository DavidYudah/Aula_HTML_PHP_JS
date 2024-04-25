<?php
    $servidor = "localhost";
    $porta = "3306"; // Porta MySQL padrão 3306
    $usuario = "root";
    $senha = "fucapi";
    $banco = "beleza_estilo";

    try {
        $conn = new PDO("mysql:host=$servidor;port=$porta;dbname=$banco", $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
?>
