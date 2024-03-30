<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'SMK AKP GALANG';

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username wajib diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]', [
            'required' => 'Password wajib diisi',
            'min_length' => 'Password minimal 5 karakter'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));

            $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
            // cek username
            if ($user) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // simpan data user pada session userdata
                    $this->session->set_userdata('nama', $user['nama']);
                    $this->session->set_userdata('level', $user['level']);
                    $this->session->set_userdata('id_user', $user['id_user']);

                    // cek level
                    if ($user['level'] == 'admin') {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Anda berhasil login sebagai admin
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Anda berhasil login sebagai petugas
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
                        redirect('petugas');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password anda salah
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username belum terdaftar
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
                redirect('auth');
            }
        }
    }

    public function registrasi()
    {
        $data['title'] = 'SMK AKP GALANG';

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama wajib di isi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_user.username]', [
            'required' => 'Username wajib di isi',
            'is_unique' => 'Username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[konfirmasi_password]', [
            'required' => 'Password wajib diisi',
            'min_length' => 'Password minimal 5 karakter',
            'matches' => 'Password harus sama dengan konfirmasi password'
        ]);
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|min_length[5]|matches[password]', [
            'required' => 'Password wajib diisi',
            'min_length' => 'Password minimal 5 karakter',
            'matches' => 'Konfirmasi password harus sama dengan password'
        ]);

        // cek validasi
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/registrasi', $data);
        } else {
            // simpan data inputan pada variabel
            $nama = htmlspecialchars($this->input->post('nama'));
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));

            // cara pertama pakai md5
            // cara kedua pakai password_hash
            // $password = md5($password);
            $password = password_hash($password, PASSWORD_DEFAULT);

            // masukkan variabel ke dalam array data sesuai column di table
            $data = [
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'level' => 'petugas'
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Registrasi akun berhasil
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('auth/registrasi');
        }
    }

    public function logout()
    {
        // hapus userdata pada session
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
        // pesan
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Anda berhasil logout
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect('auth');
    }
}
