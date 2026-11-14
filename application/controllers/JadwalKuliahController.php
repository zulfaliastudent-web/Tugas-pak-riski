<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalKuliahController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('JadwalKuliah');
        $this->load->helper(array('url', 'form'));
    }

    // Menampilkan data jadwal kuliah
    public function index() {
        $data['jadwalkuliahs'] = $this->JadwalKuliah->getJadwalKuliahs();

        $this->load->view('JadwalKuliahView', $data);
    }

    // Menyimpan jadwal kuliah
    public function simpan() {
        $data = array(
            'hari' => $this->input->post('hari', TRUE),
            'jam'  => $this->input->post('jam', TRUE),
            'kode' => $this->input->post('kode', TRUE)
        );

        $this->JadwalKuliah->simpan($data);

        redirect('JadwalKuliahController');
    }

    // Mengambil data untuk diedit
    public function edit($id) {
        $data['jadwal'] = $this->JadwalKuliah->ambil_data($id);

        if (!$data['jadwal']) {
            show_404();
            return;
        }

        $this->load->view('edit_jadwalkuliah', $data);
    }

    // Memperbarui jadwal kuliah
    public function update() {
        $id = $this->input->post('id', TRUE);

        $data = array(
            'hari' => $this->input->post('hari', TRUE),
            'jam'  => $this->input->post('jam', TRUE),
            'kode' => $this->input->post('kode', TRUE)
        );

        $this->JadwalKuliah->update($id, $data);

        redirect('JadwalKuliahController');
    }

    // Menghapus jadwal kuliah
    public function hapus($id) {
        $this->JadwalKuliah->hapus($id);

        redirect('JadwalKuliahController');
    }
}