<?php
class Barang
{
    private $db;
    
    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function tampilBarang()
    {
        $stmt = $this->db->prepare("SELECT * FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hapusBarang($kode)
    {
        $stmt = $this->db->prepare("DELETE FROM barang WHERE kode = :kode");
        $stmt->bindParam(':kode', $kode);
        return $stmt->execute();
    }

    public function updateBarang($kode,$nama,$harga,$stok)
    {
        $stmt = $this->db->prepare("UPDATE barang SET nama = :nama, harga = :harga, stok = :stok WHERE kode = :kode");
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    public function ambilBykode($kode)
    {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE kode = :kode");
        $stmt->bindParam(':kode', $kode);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function tambahBarang($kode,$nama,$harga,$stok)
    {
        $stmt = $this->db->prepare("INSERT barang VALUES (:kode, :nama, :harga, :stok)");
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }
 


}

?>