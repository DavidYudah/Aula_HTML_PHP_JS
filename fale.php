<?php

include('conexao.php'); // Conexão com o banco de dados

// Receber os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$sms = $_POST['sms'];

// Preparar a consulta SQL
$sql = "INSERT INTO usuarios (nome, email, sms) VALUES (:nome, :email, :sms)";

// Criar um objeto de consulta PDO
$stmt = $conn->prepare($sql);

// Vincular os valores aos parâmetros da consulta
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':sms', $sms);


// Executar a consulta
if ($stmt->execute()) {
    echo "Mensagem Enviada com Sucesso!";
    header('Location: fale_conosco.html');
} else {
    echo "Erro ao cadastrar usuário: " . $conn->errorInfo();
}

// Fechar a conexão com o banco de dados
$conn = null;
?>
