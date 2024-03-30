<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kelas extends CI_Model
{

    public function getkelas()
    {
        $query = "SELECT * FROM tb_kelas";
        return $this->db->query($query);
    }
}
