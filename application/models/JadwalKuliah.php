<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalKuliah extends CI_Model {

    // Mengambil data jadwal beserta nama mata kuliah dan SKS
    public function getJadwalKuliahs() {
        $this->db->select('
            tb_jadwal_kuliah.id,
            tb_jadwal_kuliah.jam,
            tb_jadwal_kuliah.hari,
            tb_jadwal_kuliah.kode,
            tb_mata_kuliah.mata_kuliah,
            tb_mata_kuliah.sks
        ');

        $this->db->from('tb_jadwal_kuliah');

        $this->db->join(
            'tb_mata_kuliah',
            'tb_mata_kuliah.kode = tb_jadwal_kuliah.kode',
            'inner'
        );

        return $this->db->get()->result();
    }

    // Menyimpan data jadwal
    public function simpan($data) {
        return $this->db->insert('tb_jadwal_kuliah', $data);
    }

    // Mengambil satu jadwal berdasarkan ID
    public function ambil_data($id) {
        return $this->db
                    ->get_where('tb_jadwal_kuliah', array('id' => $id))
                    ->row();
    }

    // Mengubah data jadwal
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tb_jadwal_kuliah', $data);
    }

    // Menghapus data jadwal
    public function hapus($id) {
        return $this->db
                    ->where('id', $id)
                    ->delete('tb_jadwal_kuliah');
    }
}