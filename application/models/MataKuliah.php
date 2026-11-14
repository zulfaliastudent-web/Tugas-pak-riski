<?php

class MataKuliah extends CI_Model {

    public function getMataKuliahs() {
        return $this->db->get('tb_mata_kuliah')->result();
    }

    public function simpan($data) {
        return $this->db->insert('tb_mata_kuliah', $data);
    }

    public function ambil_data($kode) {
        return $this->db->get_where('tb_mata_kuliah', array(
            'kode' => $kode
        ))->row();
    }

    public function update($kode, $data) {
        $this->db->where('kode', $kode);
        return $this->db->update('tb_mata_kuliah', $data);
    }

    public function hapus($kode) {
        return $this->db->delete('tb_mata_kuliah', array(
            'kode' => $kode
        ));
    }
}