<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jurusan extends CI_Model
{

    public function getjurusan()
    {
        $query = "SELECT * FROM tb_jurusan";
        return $this->db->query($query);
    }
    public function getjurusanbyid($id)
    {
        $query = "SELECT * FROM tb_jurusan WHERE id_jurusan = '$id'";
        return $this->db->query($query);
    }
}
