<?php

class MahasiswaModel
{
    private $tabel = "Mahasiswa";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM Mahasiswa');
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM Mahasiswa WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function deleteMahasiswa($id)
    {
        $this->db->query("DELETE FROM Mahasiswa WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function createMahasiswa($data)
    {
        //validation
        if (empty($data["nama"]) || empty($data["nrp"]) || empty($data["jurusan"])) {
            return -1;
        }

        $query = "INSERT INTO Mahasiswa
                    VALUES 
                    (null,:nama,:nrp,:jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data["nama"]);
        $this->db->bind('nrp', $data["nrp"]);
        $this->db->bind('jurusan', $data["jurusan"]);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateMahasiswa($data)
    {
        if (empty($data["id"]) || empty($data["nama"]) || empty($data["nrp"]) || empty($data["jurusan"])) {
            return -1;
        }

        $query = "UPDATE Mahasiswa SET
                    nama=:nama,
                    nrp=:nrp,
                    jurusan=:jurusan
                    WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $data["id"]);
        $this->db->bind('nama', $data["nama"]);
        $this->db->bind('nrp', $data["nrp"]);
        $this->db->bind('jurusan', $data["jurusan"]);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
