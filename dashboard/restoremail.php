<?php
include('config/conn.php');
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: login");
    exit();
}


$mail_id = $_GET['id'];

$sqlUpdate = "UPDATE email SET is_deleted = 0 WHERE mail_id =" . $mail_id;
if ($conn->query($sqlUpdate) === TRUE) {

    header("Location: ./");

}


?>