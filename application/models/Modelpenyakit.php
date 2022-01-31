<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelpenyakit extends CI_Model
{
    public function Alldata()
    {
        return $this->db->get('penyakit')->result_array();
    }
    public function insert_data($data)
    {
        $this->db->insert('penyakit', $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penyakit');
    }

    public function ambil_id($id)
    {
        return $this->db->get_where('penyakit', ['id' => $id])->row_array();
    }
    public function jlhpenyakit()
    {
        $this->db->select('penyakit');
        return $this->db->get('penyakit')->result_array();
    }
    public function jlhgejala()
    {
        $this->db->select('gejala');
        return $this->db->get('penyakit')->result_array();
    }

    public function updatedata($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
