<?php
class Pelanggan
{
    private $db;
    
    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function tampilPelanggan()
    {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hapusPelanggan($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pelanggan WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updatePelanggan($id,$nama,$alamat)
    {
        $stmt = $this->db->prepare("UPDATE pelanggan SET nama = :nama, alamat = :alamat WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }

    public function ambilByid($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambahPelanggan($id,$nama,$alamat)
    {
        $stmt = $this->db->prepare("INSERT pelanggan VALUES (:id, :nama, :alamat)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }
 


}

?>