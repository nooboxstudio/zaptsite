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

$sqlUpdate = "UPDATE email SET is_read = 1 WHERE mail_id =" . $mail_id;
if ($conn->query($sqlUpdate) === TRUE) {

$sql = "SELECT * FROM email WHERE mail_id =" . $mail_id;

}
// Executa a query
$result = $conn->query($sql);

$view = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Zapt System</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- jQuery CDN -->
    <script src="js/jquery-3.7.1.js"></script>

    <!-- DataTables CDN -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    
</head>
</head>
    
</head>
<body class="w-full h-auto">
<main>
    <header class="w-full bg-gray-800 text-white p-2 flex gap-4 content-center place-items-center">
        <img src="img/favicon.png" alt="" class="w-12 y-12">
        <span class="font-semibold text-xl "><a href="./">Zapt System</a></span>

        <?php include_once("parts/menu.php")?>
    </header>
    
    <section id="content-wrap" class="p-4 w-full dataTable table-auto">
    <div class="flex-1 w-full grid grid-cols-2">
    <div class="p-10 justify-start">
        <a href="./" class="hover:opacity-75">
        <div class="flex gap-2 border-2 border-blue-200 rounded-xl p-2 w-32 content-center justify-center">
            <img src="img/return.png" class="h-6" alt="">
            <b>Voltar</b>
        </div>
        </a>
    </div>
    <div class="p-10 flex gap-10 justify-end">
        <div>
            <span>
                <a href="setunread?id=<?php echo $view['mail_id'] ?>">
                    <img 
                        src="img/mail.png" 
                        alt="Marcar como não lido" 
                        title="Marcar como não lido"
                        class="opacity-50 h-6"
                    >
                </a>
            </span>
        </div>
        <div>
            <span>
                <a href="settrash?id=<?php echo $view['mail_id'] ?>">
                    <img 
                        src="img/trashin.png" 
                        alt="Excluir" 
                        title="Excluir"
                        class="opacity-50 h-6"
                    >
                </a>
            </span>
        </div>
        <div>
            <span>
                <a href="#" onclick="window.print();">
                    <img 
                        src="img/print.png" 
                        alt="Imprimir" 
                        title="Imprimir"
                        class="opacity-50 h-6"
                    >
                </a>
            </span>
        </div>
    </div>
    </div>
    <hr>
    <div class="p-10 flex grid-cols-2 grid grid-flow-col justify-stretch gap-10">
        <div>
        <span><b>Nome:</b></span>
        <p class="mt-5"><?php echo $view['mail_name'] ?></p>
        </div>
        <div>
        <span><b>E-mail:</b></span>
        <p class="mt-5">
            <a 
                href="mailto:<?php echo $view['mail_email'] ?>?subject=Resposta contato via site, Zapt System"
                target="_blank"
                class="text-blue-600"
                title="Responder"

            >
            <?php echo $view['mail_email'] ?>
            </a>
        </p>
        </div>
        <div>
        <span><b>Empresa:</b></span>
        <p class="mt-5"><?php echo $view['mail_company'] ?></p>
        </div>
    </div>
    <hr>
    <div class="p-10 w-full">
        <div class="w-full">
        <span><b>Mensagem:</b></span>
        <p class="w-full mt-5"><?php echo $view['mail_message'] ?></p>
        </div>
    </div>
    </section>

    

    
    

</main>
</body>
</html>