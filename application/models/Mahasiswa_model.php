<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    // fungsi mengambil data mahasiswa
    function lihatData()
    {
        // SELECT mahasiswa.*, prodi.nama_prodi FROM mahasiswa LEFT JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi
        // return $this->db->get('mahasiswa')->result();
        $this->db->select('mahasiswa.*, prodi.nama_prodi');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function metodeResult()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }

    public function metodeRow()
    {
        // SELECT * FROM mahasiswa WHERE id_mahasiswa = 1;
        // return $this->db->where('id_mahasiswa', 1)->get('mahasiswa')->row();

        $query = $this->db->where('id_mahasiswa', 1);
        $query = $this->db->get('mahasiswa');
        return $query->row();
    }

    public function metodeResultArray()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function metodeRowArray()
    {
        $query = $this->db->where('id_mahasiswa', 1);
        $query = $this->db->get('mahasiswa');
        return $query->row_Array();
    }

    public function simpan($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    public function getById($id)
    {
        $query = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id]);
        return $query->row();
    }

    public function perbaharui($id, $data)
    {
        return $this->db->update('mahasiswa', $data, ['id_mahasiswa' => $id]);
    }

    public function hapus($id)
    {
        return $this->db->delete('mahasiswa', ['id_mahasiswa' => $id]);
    }
}
