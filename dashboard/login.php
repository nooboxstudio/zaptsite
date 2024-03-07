<?php
// Incluir a conexão com o banco de dados
include('config/conn.php');

// Configurar o tempo de vida da sessão para 8 horas (em segundos)
$session_lifetime = 8 * 60 * 60; // 8 horas
session_set_cookie_params($session_lifetime);

// Início da sessão após configurar o cookie
session_start();

// Verificar se o usuário já está logado
if (isset($_SESSION['username'])) {
    // Se estiver logado, redirecionar para a página inicial
    header("Location: ./");
    exit();
}

// Processar o formulário de login se o método for POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar as credenciais
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Verificar se o usuário foi encontrado
    if ($result->num_rows > 0) {
        // Iniciar a sessão e armazenar o nome de usuário na variável de sessão
        $_SESSION['username'] = $username;

        // Redirecionar para a página inicial
        header("Location: ./");
        exit();
    } else {
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dashboard | Zapt System</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="text-center">
        <form class="form-signin border rounded shadow-lg" action="login.php" method="post">
            <img class="mb-4 rounded mx-auto d-block" src="img/favicon.png" alt="logo zapt" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Dashboard</h1>
            <label for="username" class="sr-only">Usuário</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="usuário" required autofocus>
            <label for="password" class="sr-only">Senha</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="senha" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2003-<?php echo date("Y") ?></p>
        </form>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>
