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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard V2 | Zapt System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="dist/img/favicon.png" type="image/x-icon">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
      @media print{
        .btn, footer{
          display: none;
        }
      }
    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php include_once('structure/topbar.php') ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
      <img src="dist/img/favicon.png" alt="Zapt Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Zapt System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <?php include_once("structure/sidebar.php") ?>
      </nav>
      <!-- /.sidebar-menu -->


    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="./" class="btn btn-primary">
              <i class="fa fa-arrow-left"></i> &nbsp; Voltar
            </a>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
  
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Contato via Site</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h6><i>Empresa:</i> <b><?php echo $view['mail_company'] ?></b></h6>
                <h6><i>De:</i> <b><?php echo $view['mail_email'] ?></b> &nbsp;&nbsp;
                  <span class="mailbox-read-time float-right"><?php 
                $dataFormatada = date('d/M/Y H:i', strtotime($view['date_in']));
                echo $dataFormatada ?></span></h6>
                  <h6><i>Nome:</i> <b><?php echo $view['mail_name'] ?></b></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                <a href="mailto:<?php echo $view['mail_email'] ?>?subject=Resposta contato via site, Zapt System" title="Responder">
                  <span class="btn btn-default btn-sm">
                    <i class="fa fa-reply"></i>
                  </span>
                </a> &nbsp;
                <a href="mail/send-to-trash?id=<?php echo $view['mail_id'] ?>" class="btn btn-default btn-sm" title="Delete">
                    <i class="far fa-trash-alt"></i>
                </a>
                  
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" title="Print" onclick="window.print();">
                  <i class="fas fa-print"></i>
                </button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p><?php echo $view['mail_message'] ?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white">
              
            </div>
          </div>
          
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include_once("structure/footer.php") ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#emails").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
      
    }).buttons().container().appendTo('#emails_wrapper .col-md-6:eq(0)');
  });
</script>



</body>
</html>
