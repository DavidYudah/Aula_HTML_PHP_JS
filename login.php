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

    // Call the function and assign the result to a variable
    $functionResult = someFunction();

    if ($stmt->rowCount() === 1) {
        // Login bem sucedido
        session_start(); // Inicia sessão
        $_SESSION['usuarios_id'] = $stmt->fetchColumn(0); // Armazena o ID do usuário na sessão
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descriptions" content="catalogo de produtos de beleza e saude">
    <meta name="keywords" content="Maquiagem, acessorios, bolsas femininas">
    <meta name="author" content="Profª Adiane">
    <title>beleza&stilo</title>
    <link rel="stylesheet" href="./css_s/login.css">
    <link rel="stylesheet" href="./css_s/estilo.css">
    <link rel="stylesheet" href="./css_s/resp.css">
</head>
<body>
    <header>
       
        <nav class="navbar">
            <div class="logo">
                <h1> Beleza & Estilo</h1>
            </div>
            <div class="menu">
                <a id="botao" href="cadastrar.html">Cadastrar-se!</a>
            </div>
        </nav>
        <img src="./img/horizontal-banne.jpg" alt="banner"></div>
        <h1>Login</h1>
        <?php if (isset($mensagemErro)): ?>
    <p style="color: red;"><?php echo $mensagemErro; ?></p>
  <?php endif; ?>


    </header> 
      
<main>

    <form  action="cadastrar.php" method="post" id="loginForm">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Entrar</button>
    </form>

</main>
    <div class="cadastrar"> 
        <a href="#">Esquici a senha!</a>
        <br><br>
    
    </div>
    <br><br>

    <footer>
        <a href="https://fucapi.edu.br/">
            <img width="50" height="50" src="https://www.unirede.net/wp-content/uploads/2012/12/fucapi-logo.png" alt="">
            <p>Desenvolvido pela turma de Informática </p>   
        </a>
        <br>
        <p>&copy; Beleza & Estilo 2024 </p>
    </footer>
     <script src="./js/script.js"></script>
</body>
</html>
