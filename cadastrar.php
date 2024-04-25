<?php

include('conexao.php'); // Conexão com o banco de dados

// Receber os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];

// Preparar a consulta SQL
$sql = "INSERT INTO usuarios (nome, email, telefone, endereco, senha) VALUES (:nome, :email, :telefone, :endereco, :senha)";

// Criar um objeto de consulta PDO
$stmt = $conn->prepare($sql);

// Vincular os valores aos parâmetros da consulta
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':senha', $senha); // Criptografar a senha antes de salvar

// Executar a consulta
if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $conn->errorInfo();
}

// Fechar a conexão com o banco de dados
$conn = null;
?>
