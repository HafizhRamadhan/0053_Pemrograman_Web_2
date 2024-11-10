<?php
require_once 'app/models/Transaksi.php';

class TransaksiControl
{
    private $transaksiCntrl;

    public function __construct($dbConnection)
    {
        $this->transaksiCntrl = new Transaksi($dbConnection);
    }

    public function tampilSemua()
    {
        $transaksi = $this->transaksiCntrl->tampilTransaksi();
        require_once 'app/views/transaksiView.php';
    }
    // Untuk detail
    public function tampilByid($id)
    {
        $transaksi = $this->transaksiCntrl->ambilByid($id);
        require_once 'app/views/DetailView.php';
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id = $_POST['id'];
            $kode_barang = $_POST['kode_barang'];
            $id_pelanggan = $_POST['id_pelanggan'];
            $jumlah = $_POST['jumlah'];

            $this->transaksiCntrl->tambahTransaksi($id,$kode_barang,$id_pelanggan,$jumlah);
            header("Location: index.php?move=transaksi");
        }
        require_once 'app/views/transaksiTambah.php';
    }

    public function edit($id)
    {
        $transaksi = $this->transaksiCntrl->ambilByid($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $kode_barang = $_POST['kode_barang'];
            $id_pelanggan = $_POST['id_pelanggan'];
            $jumlah = $_POST['jumlah'];

            $this->transaksiCntrl->updateTransaksi($id,$kode_barang,$id_pelanggan,$jumlah);
            header("Location: index.php?move=transaksi");
        }
        require_once 'app/views/transaksiEdit.php';
    }       

    public function hapus($id)
    {
        $this->transaksiCntrl->hapusTransaksi($id);
        header('Location: index.php?move=transaksi');
    }

}


?>