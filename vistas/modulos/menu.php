<aside class="main-sidebar">
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $admin["foto"] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $admin["nombre"] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de navegacion</li>
        <li>
          <a href="usuarios">
              <i class="fa fa-users"></i><span>Usuarios</span>
          </a>
        </li>
        <li>
          <a href="roles">
              <i class="fa fa-link"></i><span>Roles</span>
          </a>
        </li>
      </ul>

    </section>
  </aside>