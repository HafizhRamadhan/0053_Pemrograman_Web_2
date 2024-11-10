<?php
require_once 'app/models/Barang.php';

class BarangControl
{
    private $barangCntrl;

    public function __construct($dbConnection)
    {
        $this->barangCntrl = new Barang($dbConnection);
    }

    public function tampilSemua()
    {
        $barang = $this->barangCntrl->tampilBarang();
        require_once 'app/views/barangView.php';
    }
    // Untuk detail
    public function tampilBykode($kode)
    {
        $barang = $this->barangCntrl->ambilBykode($kode);
        require_once 'app/views/DetailView.php';
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $this->barangCntrl->tambahBarang($kode, $nama, $harga, $stok);
            header("Location: index.php?move=barang");
        }
        require_once 'app/views/barangTambah.php';
    }

    public function edit($kode)
    {
        $barang = $this->barangCntrl->ambilBykode($kode);
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $this->barangCntrl->updateBarang($kode, $nama, $harga, $stok);
            header("Location: index.php?move=barang");
        }
        require_once 'app/views/barangEdit.php';
    }       

    public function hapus($kode)
    {
        $this->barangCntrl->hapusBarang($kode);
        header('Location: index.php?move=barang');
    }

}


?>