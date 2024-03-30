<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
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
        $data['guru'] = $this->guru->getguru()->result_array();
        $data['siswa'] = $this->siswa->getsiswa()->result_array();
        $data['kelas'] = $this->kelas->getkelas()->result_array();
        $data['jurusan'] = $this->jurusan->getjurusan()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function guru()
    {
        $data['title'] = 'SMK AKP GALANG';
        $data['guru'] = $this->guru->getguru()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahguru()
    {
        $data['title'] = 'SMK AKP GALANG';

        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required', [
            'required' => 'Nama Guru wajib diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', [
            'required' => 'Jenis Kelamin wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
            'required' => 'Alamat wajib diisi'
        ]);
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'trim|required', [
            'required' => 'Mata Pelajaran wajib diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambahguru', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_guru = htmlspecialchars($this->input->post('nama_guru'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $mapel = htmlspecialchars($this->input->post('mapel'));

            $data = [
                'nama_guru' => $nama_guru,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'mapel' => $mapel
            ];
            $this->db->insert('tb_guru', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambah
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('admin/guru');
        }
    }

    public function editguru($id = 0)
    {
        $data['guru'] = $this->guru->getgurubyid($id)->row_array();
        if ($data['guru'] == null) {
            redirect('admin/guru');
        }

        $data['title'] = 'SMK AKP GALANG';
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required', [
            'required' => 'Nama Guru wajib diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', [
            'required' => 'Jenis Kelamin wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
            'required' => 'Alamat wajib diisi'
        ]);
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'trim|required', [
            'required' => 'Mata Pelajaran wajib diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editguru', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_guru = htmlspecialchars($this->input->post('nama_guru'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $mapel = htmlspecialchars($this->input->post('mapel'));

            $data = [
                'nama_guru' => $nama_guru,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'mapel' => $mapel
            ];
            $where = ['id_guru' => $id];
            $this->db->update('tb_guru', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di edit
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('admin/guru');
        }
    }

    public function hapusguru($id = 0)
    {
        $data['guru'] = $this->guru->getgurubyid($id)->row_array();
        if ($data['guru'] == null) {
            redirect('admin/guru');
        }

        $where = ['id_guru' => $id];
        $this->db->delete('tb_guru', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di hapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect('admin/guru');
    }

    public function jurusan()
    {
        $data['title'] = 'SMK AKP GALANG';
        $data['jurusan'] = $this->jurusan->getjurusan()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/jurusan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahjurusan()
    {
        $data['title'] = 'SMK AKP GALANG';

        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'trim|required', [
            'required' => 'Nama Jurusan wajib diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambahjurusan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_jurusan = htmlspecialchars($this->input->post('nama_jurusan'));

            $data = [
                'nama_jurusan' => $nama_jurusan
            ];
            $this->db->insert('tb_jurusan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di tambah
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('admin/jurusan');
        }
    }

    public function editjurusan($id = 0)
    {
        $data['jurusan'] = $this->jurusan->getjurusanbyid($id)->row_array();
        if ($data['jurusan'] == null) {
            redirect('admin/jurusan');
        }
        $data['title'] = 'SMK AKP GALANG';

        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'trim|required', [
            'required' => 'Nama Jurusan wajib diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editjurusan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_jurusan = htmlspecialchars($this->input->post('nama_jurusan'));

            $data = [
                'nama_jurusan' => $nama_jurusan,
            ];
            $where = ['id_jurusan' => $id];
            $this->db->update('tb_jurusan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di edit
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('admin/jurusan');
        }
    }

    public function hapusjurusan($id = 0)
    {
        $data['jurusan'] = $this->jurusan->getjurusanbyid($id)->row_array();
        if ($data['jurusan'] == null) {
            redirect('admin/jurusan');
        }

        $where = ['id_jurusan' => $id];
        $this->db->delete('tb_jurusan', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di hapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect('admin/jurusan');
    }

    public function siswa()
    {
        $data['title'] = 'SMK AKP GALANG';
        $data['siswa'] = $this->siswa->getsiswa()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahsiswa()
    {
        $data['title'] = 'SMK AKP GALANG';
        $data['kelas'] = $this->kelas->getkelas()->result_array();
        $data['jurusan'] = $this->jurusan->getjurusan()->result_array();

        $this->form_validation->set_rules('nis', 'Nis', 'trim|required|is_unique[tb_siswa.nis]', [
            'required' => 'Nis wajib diisi',
            'is_unique' => 'Nis sudah terdaftar'
        ]);
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required', [
            'required' => 'Nama siswa wajib diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', [
            'required' => 'Jenis Kelamin wajib diisi'
        ]);
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required', [
            'required' => 'Kelas wajib diisi'
        ]);
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required', [
            'required' => 'Jurusan wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
            'required' => 'Alamat wajib diisi'
        ]);

        // cek data 
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambahsiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nis = htmlspecialchars($this->input->post('nis'));
            $nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
            $id_jurusan = htmlspecialchars($this->input->post('id_jurusan'));
            $alamat = htmlspecialchars($this->input->post('alamat'));

            $config['upload_path'] = './assets/img/siswa/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1024 * 5;
            $this->load->library('upload', $config);

            // cek foto
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Upload gagal
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
                redirect('admin/tambahsiswa');
            } else {
                $foto = $this->upload->data();
            }

            $data = [
                'foto' => $foto['file_name'],
                'nis' => $nis,
                'nama_siswa' => $nama_siswa,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'id_kelas' => $id_kelas,
                'id_jurusan' => $id_jurusan
            ];
            $this->db->insert('tb_siswa', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil ditambahkan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('admin/siswa');
        }
    }

    public function editsiswa($id = 0)
    {

        $data['siswa'] = $this->siswa->getsiswabyid($id)->row_array();
        if ($data['siswa'] == null) {
            redirect('admin/siswa');
        }

        $data['title'] = 'SMK AKP GALANG';
        $data['kelas'] = $this->kelas->getkelas()->result_array();
        $data['jurusan'] = $this->jurusan->getjurusan()->result_array();

        $this->form_validation->set_rules('nis', 'Nis', 'trim|required', [
            'required' => 'Nis wajib diisi',
        ]);
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required', [
            'required' => 'Nama siswa wajib diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', [
            'required' => 'Jenis Kelamin wajib diisi'
        ]);
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required', [
            'required' => 'Kelas wajib diisi'
        ]);
        $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required', [
            'required' => 'Jurusan wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
            'required' => 'Alamat wajib diisi'
        ]);

        // CEK VALIDASI INPUTAN
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editsiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nis = htmlspecialchars($this->input->post('nis'));
            $nama_siswa = htmlspecialchars($this->input->post('nama_siswa'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $id_kelas = htmlspecialchars($this->input->post('id_kelas'));
            $id_jurusan = htmlspecialchars($this->input->post('id_jurusan'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $foto_lama = htmlspecialchars($this->input->post('foto_lama'));



            if ($_FILES['foto']['name']) {

                // hapus foto lama yang ada di folder nya
                unlink('./assets/img/siswa/' . $foto_lama);
                $config['upload_path'] = './assets/img/siswa/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 1024 * 5;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $foto = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data gagal ditambahkan
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
                    redirect('admin/editsiswa/' . $id);
                }
            } else {
                $foto = $foto_lama;
            }

            $data = [
                'nis' => $nis,
                'nama_siswa' => $nama_siswa,
                'jenis_kelamin' => $jenis_kelamin,
                'id_kelas' => $id_kelas,
                'id_jurusan' => $id_jurusan,
                'alamat' => $alamat,
                'foto' => $foto
            ];
            $where = ['id_siswa' => $id];
            $this->db->update('tb_siswa', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diupdate
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('admin/siswa');
        }
    }


    public function hapussiswa($id = 0)
    {
        $data['siswa'] = $this->siswa->getsiswabyid($id)->row_array();
        if ($data['siswa'] == null) {
            redirect('admin/siswa');
        }

        // menghapus gambar pada data siswa
        unlink('./assets/img/siswa/' . $data['siswa']['foto']);

        // hapus data isiswa yang ada di database
        $where = ['id_siswa' => $id];
        $this->db->delete('tb_siswa', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil dihapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect('admin/siswa');
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
            $this->load->view('admin/gantipassword', $data);
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
            redirect('admin/gantipassword');
        }
    }
}
