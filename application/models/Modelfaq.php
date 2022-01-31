<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelfaq extends CI_Model
{
    public function Alldata()
    {
        return $this->db->get('faq')->result_array();
    }
    public function insert_data($data)
    {
        $this->db->insert('faq', $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('faq');
    }

    public function ambil_id($id)
    {
        return $this->db->get_where('faq', ['id' => $id])->row_array();
    }
    public function updatedata($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
