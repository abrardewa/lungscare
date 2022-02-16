<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelpemeriksa extends CI_Model
{
    public function Alldata()
    {
        return $this->db->get('user')->result_array();
    }
    public function insert_data($data)
    {
        $this->db->insert('user', $data);
    }
    // public function hapus_data($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('guru');
    // }

    public function ambildata($nama)
    {
        return $this->db->get_where('user', ['nama' => $nama])->row_array();
    }
    // public function updatedata($where, $data, $table)
    // {

    //     $this->db->where($where);
    //     $this->db->update($table, $data);
    // }
    // public function jumlahdata()
    // {
    //     $this->db->select('*');
    //     $this->db->from('guru');
    //     return $this->db->get()->num_rows();
    // }
}
