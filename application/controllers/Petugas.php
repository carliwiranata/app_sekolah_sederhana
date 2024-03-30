<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'petugas') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda harus login terlebih dahulu
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('auth');
        }
    }



    public function index()
    {
        $data['title'] = 'SMK AKP GALANG';
        $data['siswa'] = $this->siswa->getsiswa()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function gantipassword()
    {
        $data['title'] = 'SMK AKP GALANG';

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[konfirmasi_password]', [
            'required' => 'Password wajib diisi',
            'min_length' => 'Password minimal 5 karakter',
            'matches' => 'Password harus sama dengan konfirmasi password'
        ]);
        $this->form_validation->set_rules('konfirmasi_password', 'Password', 'trim|required|min_length[5]|matches[password]', [
            'required' => 'Konfirmasi Password wajib diisi',
            'min_length' => 'Konfirmasi Password minimal 5 karakter',
            'matches' => 'Konfirmasi password harus sama dengan password'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('petugas/gantipassword', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $password = htmlspecialchars($this->input->post('password'));

            $password = password_hash($password, PASSWORD_DEFAULT);
            $id_user = $this->session->userdata('id_user');
            $where = ['id_user' => $id_user];
            $data = ['password' => $password];
            $this->db->update('tb_user', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Password berhasil diganti
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('petugas/gantipassword');
        }
    }
}
