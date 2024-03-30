<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_guru extends CI_Model
{

    public function getguru()
    {
        $query = "SELECT * FROM tb_guru";
        return $this->db->query($query);
    }

    public function getgurubyid($id)
    {
        $query = "SELECT * FROM tb_guru WHERE id_guru = '$id'";
        return $this->db->query($query);
    }
}
