<?php
include('../config/conn.php');
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: ../login");
    exit();
}

$schema = $_POST['schema'];
$clinica = $_POST['clinica'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$status = $_POST['status'];
$obs = $_POST['obs'];

// Supondo que você também tem o ID do registro que deseja atualizar
$id = $_POST['id']; // Substitua 'id' pelo nome correto do campo ID na sua tabela

// Usar instruções preparadas para evitar injeção de SQL
$sql = $conn->prepare("UPDATE clinic_list 
                       SET clinic_schema = ?, clinic_status = ?, clinic_name = ?, 
                           clinic_user = ?, clinic_pass = ?, clinic_obs = ?
                       WHERE clinic_id = ?");

// Verificar se a preparação da instrução foi bem-sucedida
if ($sql === FALSE) {
    die('Erro na preparação da consulta: ' . $conn->error);
}

// Vincular parâmetros e executar a consulta
$sql->bind_param("ssssssi", $schema, $status, $clinica, $usuario, $senha, $obs, $id);

if ($sql->execute() === TRUE) {
    header("Location: ../clinic-view?id=".$id."&msg=success");
} else {
    header("Location: ../clinic-view?id=".$id."&msg=error");
}

// Fechar a instrução preparada e a conexão com o banco de dados
$sql->close();
$conn->close();
?>
