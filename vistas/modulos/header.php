<header class="main-header">
  
    <a href="../../index2.html" class="logo">
      <span class="logo-mini">Admin</span>
      <span class="logo-lg"><b>Admin</b> Usuarios</span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $admin["foto"] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $admin["nombre"] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo $admin["foto"] ?>" class="img-circle" alt="User Image">
                <p>
                <?php echo $admin["nombre"] ?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="salir" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>