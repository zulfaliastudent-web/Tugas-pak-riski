<?php

class MahasiswaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa');
    }

    // Menampilkan data mahasiswa
    public function index() {
        $this->getMahasiswas();
    }

    public function getMahasiswas() {
        $data['mahasiswas'] = $this->Mahasiswa->getMahasiswas();
        $this->load->view('MahasiswaView', $data);
    }

    // Menyimpan data mahasiswa
    public function simpan() {

        if ($this->input->method() !== 'post') {
            show_error('Metode tidak diizinkan', 405);
        }

        $data = array(
            'nim' => $this->input->post('nim', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'kelas' => $this->input->post('kelas', TRUE)
        );

        $this->Mahasiswa->simpan($data);

        redirect('MahasiswaController/getMahasiswas');
    }

    // Menampilkan halaman edit
    public function edit($nim) {

        $data['mahasiswa'] = $this->Mahasiswa->ambil_data($nim);

        if (!$data['mahasiswa']) {
            show_404();
        }

        $this->load->view('edit_mahasiswa', $data);
    }

    // Menyimpan perubahan data
    public function update($nim) {

        if ($this->input->method() !== 'post') {
            show_error('Metode tidak diizinkan', 405);
        }

        $data = array(
            'nama' => $this->input->post('nama', TRUE),
            'kelas' => $this->input->post('kelas', TRUE)
        );

        $this->Mahasiswa->update($nim, $data);

        redirect('MahasiswaController/getMahasiswas');
    }

    // Menghapus data
    public function hapus($nim) {

        if ($this->input->method() !== 'post') {
            show_error('Metode tidak diizinkan', 405);
        }

        $this->Mahasiswa->hapus($nim);

        redirect('MahasiswaController/getMahasiswas');
    }

}