<?php
require_once 'app/models/Pelanggan.php';

class PelangganControl
{
    private $pelangganCntrl;

    public function __construct($dbConnection)
    {
        $this->pelangganCntrl = new Pelanggan($dbConnection);
    }

    public function tampilSemua()
    {
        $pelanggan = $this->pelangganCntrl->tampilPelanggan();
        require_once 'app/views/pelangganView.php';
    }
    // Untuk detail
    public function tampilByid($id)
    {
        $pelanggan = $this->pelangganCntrl->ambilByid($id);
        require_once 'app/views/DetailView.php';
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];

            $this->pelangganCntrl->tambahPelanggan($id,$nama,$alamat);
            header("Location: index.php?move=pelanggan");
        }
        require_once 'app/views/pelangganTambah.php';
    }

    public function edit($id)
    {
        $pelanggan = $this->pelangganCntrl->ambilByid($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];

            $this->pelangganCntrl->updatePelanggan($id,$nama,$alamat);
            header("Location: index.php?move=pelanggan");
        }
        require_once 'app/views/pelangganEdit.php';
    }       

    public function hapus($id)
    {
        $this->pelangganCntrl->hapusPelanggan($id);
        header('Location: index.php?move=pelanggan');
    }

}


?>