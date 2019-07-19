<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    public function gets()
    {
        return $this->db->select('surat')->result();
    }

    public function get_surat($id) // get Surat berdasarkan ID
    {
        $table = $this->get_tipe_surat($id);
        $temp = $this->db->get($table)->row_array();
        if($temp == NULL){
            return -1; // error code
        }
        return $temp;
    }

    public function get_by_id($id){
        return $this->db->get_where('surat', array('id_surat' => $id))->result()[0]->id_tipe;
    }

    public function get_tipe_surat($id){
        $res = $this->get_by_id($id);
        return $this->_get_nama_surat($res);
    }

    private function _get_nama_surat($id) // get Nama Surat berdasarkan tipe surat
    {
        $temp = $this->db->get_where('tipe_surat', array('id_tipe' => $id))->result();
        return $temp[0]->nama_surat;
    }
}

/* End of file Surat_model.php */