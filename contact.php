<?php
require_once('dashboard/config/conn.php');

// Dados para inserção
$nome = $_POST['name'];
$email = $_POST['email'];
$empresa = $_POST['company'];
$mensagem = $_POST['message'];

// Consulta SQL de inserção
$sql = "INSERT INTO email (mail_name,
                           mail_email,
                           mail_company,
                           mail_message
                           ) VALUES (
                            '$nome',
                            '$email',
                            '$empresa',
                            '$mensagem'
                            )";

// Executar a consulta e verificar se foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    header("Location: ./?msg=success");
} else {
    header("Location: ./?msg=error");
}

// Fechar a conexão
$conn->close();
?>