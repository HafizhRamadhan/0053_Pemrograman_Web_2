<?php
class Transaksi
{
    private $db;
    
    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function tampilTransaksi()
    {
        $stmt = $this->db->prepare("SELECT * FROM transaksi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hapusTransaksi($id)
    {
        $stmt = $this->db->prepare("DELETE FROM transaksi WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateTransaksi($id,$kode_barang,$id_pelanggan,$jumlah)
    {
        $stmt = $this->db->prepare("UPDATE transaksi SET kode_barang = :kode_barang, id_pelanggan = :id_pelanggan, jumlah = :jumlah, bayar = jumlah *(SELECT harga FROM barang WHERE barang.kode = :kode_barang), tanggal=now() WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':jumlah', $jumlah);
        return $stmt->execute();
    }

    public function ambilByid($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM transaksi WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambahTransaksi($id,$kode_barang,$id_pelanggan,$jumlah)
    {
        $stmt = $this->db->prepare("INSERT transaksi VALUES (:id, :kode_barang, :id_pelanggan, :jumlah, jumlah *(SELECT harga FROM barang WHERE barang.kode = :kode_barang), now())");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':jumlah', $jumlah);
        return $stmt->execute();
    }
 


}

?>