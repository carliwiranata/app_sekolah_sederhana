<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{

    public function getsiswa()
    {
        $query = "SELECT nis,id_siswa,nama_siswa,jenis_kelamin,alamat,foto,nama_kelas,nama_jurusan
        FROM tb_siswa JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas
        JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_siswa.id_jurusan";
        return $this->db->query($query);
    }
    public function getsiswabyid($id)
    {
        $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id'";
        return $this->db->query($query);
    }
}
