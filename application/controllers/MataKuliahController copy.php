<?php

class MataKuliahController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MataKuliah');
    }

    public function index() {
        $data['matakuliahs'] = $this->MataKuliah->getMataKuliahs();
        $this->load->view('MataKuliahView', $data);
    }

    public function simpan() {
        $data = array(
            'kode' => $this->input->post('kode'),
            'mata_kuliah' => $this->input->post('mata_kuliah'),
            'sks' => $this->input->post('sks')
        );

        $this->MataKuliah->simpan($data);
        redirect('matakuliah');
    }

    public function edit($kode) {
        $data['mk'] = $this->MataKuliah->ambil_data($kode);
        $this->load->view('edit_matakuliah', $data);
    }

    public function update() {
        $kode = $this->input->post('kode');

        $data = array(
            'mata_kuliah' => $this->input->post('mata_kuliah'),
            'sks' => $this->input->post('sks')
        );

        $this->MataKuliah->update($kode, $data);
        redirect('matakuliah');
    }

    public function hapus($kode) {
        $this->MataKuliah->hapus($kode);
        redirect('matakuliah');
    }
}