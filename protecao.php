<?php

session_start(); // Inicia sessão

if (!isset($_SESSION['usuario_id'])) {
    // Usuário não está logado, redireciona para a página de login
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Protegida</title>
</head
