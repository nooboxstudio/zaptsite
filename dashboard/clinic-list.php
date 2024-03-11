<?php
include('config/conn.php');
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: login");
    exit();
}

$sql = "SELECT * FROM clinic_list ORDER BY clinic_schema ASC";


// Executa a query
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CLINICAS | Zapt System</title>

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
            <h1 class="m-0">Clinicas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <a href="clinic-new" class="btn btn-primary">Cadastrar</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="emails" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Clinica</th>
                    <th>Schema</th>
                    <th>Status</th>
                    <th>Usuário</th>
                    <th>Senha</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
        if ($result->num_rows > 0) {
            // Loop pelos resultados
            while($row = $result->fetch_assoc()) {?>
                  <tr>
                    <td><a href="clinic-view?id=<?php echo $row['clinic_id'] ?>"><?php echo $row['clinic_name'] ?></a></td>
                    <td><?php echo $row['clinic_schema'] ?></td>
                    <td><?php if($row['clinic_status'] == 1){ ?>
                        Ativo
                      <?php }else{?>
                        Inativo
                      <?php } ?></td>
                    <td><?php echo $row['clinic_user'] ?></td>
                    <td><?php echo $row['clinic_pass'] ?></td>

                  </tr>
                  <?php } }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
      
    }).buttons().container().appendTo('#emails_wrapper .col-md-6:eq(0)');
  });
</script>



</body>
</html>
