<ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>    
    </ul> 

    <span><i>Bem Vindo(a)!</i>  &nbsp;&nbsp;&nbsp; <b><?php echo strtoupper($_SESSION['name']) ?></b></span>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout" class="nav-link btn btn-danger" title="sair">
          <i class="fa fa-times nav-icon text-white"></i>
        </a>
      </li>
    </ul>  