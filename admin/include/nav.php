<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../img/logo_1.png" alt="CC logo" class="img-fluid brand-image img-circle elevation-3" style="opacity: .8;">
    <span class="brand-text font-weight-light">Clever Clothing</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image my-auto">
        <img src="../img/logo_1.png" class="img-circle elevation-2 proImage" alt="User Image" style="">
      </div>
      <div class="info">
        <a href="#" class="d-block text-sm"><?php echo $sUser;?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <?php
            if (is_array($_SESSION['ccpageRights'])) {

              foreach ($_SESSION['ccpageRights'] as $value) {
                if ($value['listing'] == 'Y') {
                  echo '<li class="nav-item"> <a href="'.$value['link'].'" class="nav-link">'.$value['icon'].'<p>'.$value['name'].'</p></a></li>';
                }
              }
            }
            else{
              echo "<script>location.href='include/logout.php'</script>";
            }
            ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>