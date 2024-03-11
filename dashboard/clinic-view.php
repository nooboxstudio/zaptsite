<?php
include('config/conn.php');
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: login");
    exit();
}


$id = $_GET['id'];

$level = $_SESSION['level'];

$sql = "SELECT * FROM clinic_list WHERE clinic_id =" . $id;
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

  
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  
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
            <a href="clinic-list" class="btn btn-primary">
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
              <h3 class="card-title"><b>SCHEMA:</b> <i><?php echo $view['clinic_schema']; ?></i></h3>
            </div>
            <!-- /.card-header -->
            <?php if($level == 2){?>
            <div class="card-body">
              <form action="clinic/clinic_update_query" method="post">
              <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>" disabled>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="">Schema:</label><br>
                    <input type="text" class="form-control" name="schema" value="<?php echo $view['clinic_schema']; ?>" disabled>
                  </div>
                  <div class="col-md-6">
                    <label for="">Clinica:</label>
                    <input type="text" class="form-control" name="clinica" value="<?php echo $view['clinic_name']; ?>" disabled>
                  </div>
                </div><br>
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="">Usuário:</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo $view['clinic_user']; ?>" disabled>
                  </div>
                  <div class="col-md-4">
                    <label for="">Senha:</label>
                    <input type="text" class="form-control" name="senha" value="<?php echo $view['clinic_pass']; ?>" disabled>
                  </div>
                  <div class="col-md-4">
                    <label for="">Status:</label>
                    <select name="status"  class="form-control" disabled>
                      <?php if($view['clinic_status'] == 1){ ?>
                        <option value="1" selected>Ativo</option>
                        <option value="0">Inativo</option>
                      <?php }else{?>
                        <option value="0" selected>Inativo</option
                        ><option value="1">Ativo</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <textarea name="obs" class="form-control" disabled>
                    <?php echo $view['clinic_obs']; ?>
                  </textarea>
                </div><br>
                <div class="form-row float-right">
                  <button type="submit" class="btn btn-primary disabled">
                    Atualizar &nbsp;
                    <i class="fa fa-edit"></i>
                  </button>
                </div>
              </form>
          </div>
          <?php }else{?>
            <div class="card-body">
              <form action="clinic/clinic_update_query" method="post">
              <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="">Schema:</label><br>
                    <input type="text" class="form-control" name="schema" value="<?php echo $view['clinic_schema']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="">Clinica:</label>
                    <input type="text" class="form-control" name="clinica" value="<?php echo $view['clinic_name']; ?>">
                  </div>
                </div><br>
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="">Usuário:</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo $view['clinic_user']; ?>">
                  </div>
                  <div class="col-md-4">
                    <label for="">Senha:</label>
                    <input type="text" class="form-control" name="senha" value="<?php echo $view['clinic_pass']; ?>">
                  </div>
                  <div class="col-md-4">
                    <label for="">Status:</label>
                    <select name="status"  class="form-control">
                      <?php if($view['clinic_status'] == 1){ ?>
                        <option value="1" selected>Ativo</option>
                        <option value="0">Inativo</option>
                      <?php }else{?>
                        <option value="0" selected>Inativo</option
                        ><option value="1">Ativo</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <textarea name="obs" class="form-control">
                    <?php echo $view['clinic_obs']; ?>
                  </textarea>
                </div><br>
                <div class="form-row float-right">
                  <button type="submit" class="btn btn-primary">
                    Atualizar &nbsp;
                    <i class="fa fa-edit"></i>
                  </button>
                </div>
              </form>
          </div>
          <?php }?>
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


<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>

<?php
// Supondo que você tenha recebido $msg do PHP
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

// ... (outros códigos PHP)

// Se $msg for igual a 'success', inclua o script JavaScript
if ($msg == 'success') {
    echo '<script>
            $(document).ready(function() {
                toastr.success("Clinica Atualizada com Sucesso!");
            });
          </script>';
}
if ($msg == 'error') {
  echo '<script>
          $(document).ready(function() {
              toastr.error("Erro ao Atualizar a Clinica!");
          });
        </script>';
}
?>


</body>
</html>
