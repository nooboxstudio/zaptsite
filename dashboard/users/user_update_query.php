<?php
include('../config/conn.php');
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: ../login");
    exit();
}

// Obter o ID do usuário a ser atualizado
$id = $_POST['id'];
$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$level = $_POST['level'];

// Usar instruções preparadas para evitar injeção de SQL
$sql = $conn->prepare("UPDATE users SET username=?, name=?, password=?, level=? WHERE id=?");

// Verificar se a preparação da instrução foi bem-sucedida
if ($sql === FALSE) {
    die('Erro na preparação da consulta: ' . $conn->error);
}

// Vincular parâmetros e executar a consulta
$sql->bind_param("ssssi", $username, $name, $password, $level, $id);

if ($sql->execute() === TRUE) {
    header("Location: ../user-view?id=$id&msg=success");
} else {
    header("Location: ../user-view?id=$id&msg=error");
}

// Fechar a instrução preparada e a conexão com o banco de dados
$sql->close();
$conn->close();
?>
