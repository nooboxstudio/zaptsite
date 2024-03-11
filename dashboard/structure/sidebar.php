<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="./" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
          E-Mails
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="./" class="nav-link">
            <i class="fa fa-envelope-open nav-icon"></i>
            <p>Caixa de Entrada</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="mail-trash" class="nav-link">
            <i class="fa fa-trash nav-icon"></i>
            <p>Lixo Eletrônico</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="clinic-list" class="nav-link">
        <i class="nav-icon fa fa-medkit"></i>
        <p>
          Clinicas
        </p>
      </a>
    </li>
    <?php if (($lvl = $_SESSION['level']) == 0) { ?>
    <li class="nav-item">
        <a href="user-list.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
                Usuários
            </p>
        </a>
    </li>
<?php } ?>


  </ul>