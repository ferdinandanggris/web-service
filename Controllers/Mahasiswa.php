<?php

class Mahasiswa extends Controller
{
    public function index_get($data)
    {
        if (empty($data["id"])) {

            $mahasiswa = $this->model('MahasiswaModel')->getAllMahasiswa();

            response(
                [
                    "status" => true,
                    "data" => $mahasiswa
                ],
                200
            );
        } else {
            $mahasiswa = $this->model('MahasiswaModel')->getMahasiswaById($data["id"]);
            if ($mahasiswa) {
                response(
                    [
                        "status" => true,
                        "data" => $mahasiswa
                    ],
                    200
                );
            } else {
                response(
                    [
                        "status" => false,
                        "message" => "id tidak ditemukan!"
                    ],
                    400
                );
            }
        }
    }

    public function index_delete($data)
    {
        if (empty($data["id"])) {
            response(
                [
                    'status' => false,
                    'message' => "Masukkan id"
                ],
                400
            );
        } else {
            $mahasiswa = $this->model('MahasiswaModel')->deleteMahasiswa($data["id"]);
            if ($mahasiswa) {
                response(
                    [
                        "status" => true,
                        "id" => $data["id"], "message" => "Data Berhasil dihapus"
                    ],
                    202
                );
            } else {
                response([
                    "status" => false,
                    "message" => "id tidak ditemukan!"
                ], 404);
            }
        }
    }

    public function index_post($data)
    {
        if ($this->model('MahasiswaModel')->createMahasiswa($data) > 0) {
            response(
                [
                    "status" => true,
                    "message" => "Data mahasiswa berhasil ditambahkan!"
                ],
                200
            );
        } else {
            response(
                [
                    "status" => false,
                    "message" => "Gagal menambahkan data Mahasiswa!"
                ],
                400
            );
        }
    }

    public function index_put($data)
    {
        if ($this->model('MahasiswaModel')->updateMahasiswa($data) > 0) {
            response(
                [
                    "status" => true,
                    "message" => "Data mahasiswa berhasil diubah!"
                ],
                200
            );
        } else {
            response(
                [
                    "status" => false,
                    "message" => "Gagal mengubah data Mahasiswa!"
                ],
                400
            );
        }
    }
}
