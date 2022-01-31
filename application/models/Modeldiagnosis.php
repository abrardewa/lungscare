<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modeldiagnosis extends CI_Model
{
    public function Alldata()
    {
        return $this->db->get('pertanyaandiagnosis')->result_array();
    }
    public function insert_data($data)
    {
        $this->db->insert('pertanyaandiagnosis', $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pertanyaandiagnosis');
    }

    public function ambil_id($id)
    {
        return $this->db->get_where('pertanyaandiagnosis', ['id' => $id])->row_array();
    }
    public function updatedata($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function jumlahdata()
    {
        $this->db->select('*');
        $this->db->from('pertanyaandiagnosis');
        return $this->db->get()->num_rows();
    }
    public function gejala()
    {
        $this->db->select('gejala');
        return $this->db->get('pertanyaandiagnosis')->result_array();
    }
}
