<?php
include('config/conn.php');
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: login");
    exit();
}

$sql = "SELECT * FROM email WHERE is_deleted = 0 ORDER BY date_in DESC";


// Executa a query
$result = $conn->query($sql);

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
        
        <div class="flex w-full h-5 p-5 mb-10 -mt-5 gap-10">
            <!-- barra superior-->

        <span><a href="./" class="p-3 bg-blue-400 text-white rounded-lg flex items-center gap-2">Caixa Entrada</a></span>
        <span>
            <a href="trash" class="p-3 bg-red-600 text-white rounded-lg flex items-center gap-2 hover:bg-red-400 ">
                Lixeira
            </a>
        </span>
            
        </div>
        <hr class="mb-3">
    <table class="w-full border-spacing-2 text-center" id="emails">
    <thead>
        <tr class="text-gray-700 font-semibold">
            <th>E-mail</th>
            <th>Empresa</th>
            <th>Data</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($result->num_rows > 0) {
            // Loop pelos resultados
            while($row = $result->fetch_assoc()) {?>
            
            <tr <?php if($row['is_read'] == 0){ ?>
                class="text-gray-700 font-semibold"
            <?php } else{ ?>
                class="text-gray-600 font-flat"
            <?php } ?> >
                <td><a class="text-blue-600" href="mail_view?id=<?php echo $row['mail_id'] ?>"><?php echo $row['mail_email'] ?></a></td>
                <td><?php echo $row['mail_company'] ?></td>
                <td><?php 
                $dataFormatada = date('d/m/Y H:i', strtotime($row['date_in']));
                echo $dataFormatada ?></td>
                <td class="flex gap-2">
                    <a href="settrash?id=<?php echo $row['mail_id'] ?>">
                    <img 
                        src="img/trashin.png" 
                        alt="Excluir" 
                        title="Excluir"
                        class="opacity-50 h-6"
                    >
                </a>
                <?php if($row['is_read'] == 1){
                ?>
                <a href="setunread?id=<?php echo $row['mail_id'] ?>">
                    <img 
                        src="img/mail.png" 
                        alt="Marcar como não lido" 
                        title="Marcar como não lido"
                        class="opacity-50 h-6"
                    >
                </a>
                <?php
                    }else{?>
                    <img 
                        src="img/mail.png" 
                        alt="Marcar como não lido" 
                        title="Marcar como não lido"
                        class="opacity-25 h-6 cursor-pointer"
                    >

                    <?php }
                ?>
            </td>
    
            </tr>
            <?php }
                } else {?>
            <tr class="text-gray-600 font-flat">
            <td></td>
            <td>Nenhum Registro Encontrado</td>
            <td></td>
        </tr>
        <?php }
        ?>
    </tbody>
    </table>
    </section>

    <script>
  $(document).ready(function () {
    $('#emails').DataTable({
      "language": {
        "sEmptyTable":     "Nenhum registro encontrado",
        "sInfo":           "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered":   "(Filtrados de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ".",
        "sLengthMenu":     "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing":     "Processando...",
        "sZeroRecords":    "Nenhum registro encontrado",
        "sSearch":         "Pesquisar",
        "oPaginate": {
            "sNext":     "Próximo",
            "sPrevious": "Anterior",
            "sFirst":    "Primeiro",
            "sLast":     "Último"
        },
        "oAria": {
            "sSortAscending":  ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
      },
      "columnDefs": [{
            "targets": 2, // Índice da coluna a ser ordenada (posição 2)
            "orderable": true,
            "orderData": [2], // Índice da coluna de dados para ordenação
            "orderSequence": ["desc", "asc"] // Ordem descendente seguida por ascendente
        }],
    });
  });
</script>

    
    

</main>
</body>
</html>