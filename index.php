<?php
     require_once 'app/config/database.php';
     require_once 'app/controllers/BarangControl.php';
     require_once 'app/controllers/PelangganControl.php';
     require_once 'app/controllers/TransaksiControl.php';

     // Koneksi ke database
     $dbConnection = getDBConnection();

     // Fungsi untuk mengambil parameter URL dengan default value
     function getParam($key, $default = '') {
          return isset($_GET[$key]) ? $_GET[$key] : $default;
     }

     // Membuat instance Controller
     $barangControl = new BarangControl($dbConnection);
     $pelangganControl = new PelangganControl($dbConnection);
     $transaksiControl = new transaksiControl($dbConnection);

     // Mendapatkan parameter dari URL
     $pindah     = getParam('move');
     $action_brg = getParam('action_brg');
     $action_plg = getParam('action_plg');
     $action_trs = getParam('action_trs');

     // Menangani aksi barang
     if ($action_brg == 'tambah') {
          $barangControl->tambah();
          exit();
     } else if ($action_brg == 'edit') {
          $kode = getParam('kode');
          $barangControl->edit($kode);
          exit();
     } else if ($action_brg == 'hapus') {
          $kode = getParam('kode');
          $barangControl->hapus($kode);
          exit();
     }

     // Menangani aksi pelanggan
     if ($action_plg == 'tambah') {
          $pelangganControl->tambah();
          exit();
     } else if ($action_plg == 'edit') {
          $id = getParam('id');
          $pelangganControl->edit($id);
          exit();
     } else if ($action_plg == 'hapus') {
          $id = getParam('id');
          $pelangganControl->hapus($id);
          exit();
     }

     // Menangani aksi transaksi
     if ($action_trs == 'tambah') {
          $transaksiControl->tambah();
          exit();
     } else if ($action_trs == 'edit') {
          $id = getParam('id');
          $transaksiControl->edit($id);
          exit();
     } else if ($action_trs == 'hapus') {
          $id = getParam('id');
          $transaksiControl->hapus($id);
          exit();
     }

     // Menentukan halaman utama berdasarkan parameter 'pindah'
     if ($pindah == 'barang') {
          $barangControl->tampilSemua();
     } else if ($pindah == 'pelanggan') {
          $pelangganControl->tampilSemua();
     } else if ($pindah == 'transaksi') {
          $transaksiControl->tampilSemua();
     } else {
          require_once 'app/views/userView.php';
     }
?>
