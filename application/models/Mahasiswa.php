<?php

class Mahasiswa extends CI_Model {

    // Menampilkan semua data
    public function getMahasiswas() {
        return $this->db->get('tb_mahasiswa')->result();
    }

    // Menyimpan data
    public function simpan($data) {
        return $this->db->insert('tb_mahasiswa', $data);
    }

    // Mengambil satu data berdasarkan NIM
    public function ambil_data($nim) {
        return $this->db->get_where('tb_mahasiswa', array(
            'nim' => $nim
        ))->row();
    }

    // Mengubah data
    public function update($nim, $data) {
        $this->db->where('nim', $nim);
        return $this->db->update('tb_mahasiswa', $data);
    }

    // Menghapus data
    public function hapus($nim) {
        $this->db->where('nim', $nim);
        return $this->db->delete('tb_mahasiswa');
    }

}