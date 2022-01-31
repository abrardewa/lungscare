<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelakun extends CI_Model
{
    public function Alldata()
    {
        return $this->db->get('akun')->result_array();
    }
    public function insert_data($data)
    {
        $this->db->insert('akun', $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('akun');
    }

    public function ambil_id($id)
    {
        return $this->db->get_where('akun', ['id' => $id])->row_array();
    }
    public function updatedata($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
