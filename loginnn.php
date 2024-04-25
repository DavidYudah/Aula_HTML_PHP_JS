<?php

require 'conexao.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Validação de login
    $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', password_hash($senha, PASSWORD_DEFAULT)); // Criptografa a senha
    $stmt->execute();
   
    $myArray = [1, 2, 3];
$lastElement = end($myArray); // Assign to a variable
// Now you can pass $lastElement by reference

$result = someFunction();
// Now pass $result by reference (if needed)


    if ($stmt->rowCount() === 1) {
        // Login bem sucedido
        session_start(); // Inicia sessão
        $_SESSION['usuario_id'] = $stmt->fetchColumn(0); // Armazena o ID do usuário na sessão
        header('Location: pagina_protegida.php'); // Redireciona para a página protegida
        exit;
    } else {
        // Login falhou
        $mensagemErro = "Email e/ou senha incorretos.";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($mensagemErro)): ?>
        <p style="color: red;"><?php echo $mensagemErro; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>

