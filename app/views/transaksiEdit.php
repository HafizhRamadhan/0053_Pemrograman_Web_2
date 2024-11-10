<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Transaksi</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="publik/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="publik/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../php-adminlte" class="brand-link">
      <span class="brand-text font-weight-bold ms-4">Home</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="index.php?move=barang" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Barang</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="index.php?move=pelanggan" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Pelanggan</p>
            </a>
            </li>
            <li class="nav-item">
                <a href="index.php?move=transaksi" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Transaksi</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Data Transaksi</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data Transaksi</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <?php if (!$transaksi): ?>
                        <div class="alert alert-danger">
                            Tidak ada data transaksi
                        </div>
            <?php else: ?>
            <form method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">ID TRANSAKSI</label>
                    <input type="text" class="form-control" name="id"  value="<?php echo $transaksi['id']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">KODE BARANG</label>
                    <input type="text" class="form-control" name="kode_barang"  value="<?php echo $transaksi['kode_barang']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="id_pelanggan" class="form-label">ID PELANGGAN</label>
                    <input type="text" class="form-control" name="id_pelanggan"  value="<?php echo $transaksi['id_pelanggan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">JUMLAH</label>
                    <input type="number" class="form-control" name="jumlah"  value="<?php echo $transaksi['jumlah']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="index.php?move=transaksi" class="btn btn-secondary">Batal</a>
            </form>
            <?php endif; ?>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="publik/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=".publik/AdminLTE-3.2.0/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="publik/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="publik/AdminLTE-3.2.0/dist/js/demo.js"></script>
</body>
</html>
