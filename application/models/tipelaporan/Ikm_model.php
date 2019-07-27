<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ikm_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $ret = NULL; $temp = NULL;
        // $this->db->start_cache();
        $this->db->from('ikm');
        if($id_opd != NULL){ // per opd
            $this->db->where('ikm.id_opd', $id_opd);
        }
        if($id_laporan != NULL){ // laporan spesifik
            $this->db->where('ikm.id_laporan', $id_laporan);
        }
        // $ret = json_encode($this->db->get()->result_array(), JSON_PRETTY_PRINT);
        // $this->db->stop_cache();
        // $this->db->flush_cache();
        // foreach()
        $this->db->join('ikm_opd', 'ikm.id_laporan = ikm_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = ikm_opd.id_opd');
        // $temp = $this->db->get()->result_array();
        // $temp = json_encode($temp, JSON_PRETTY_PRINT);
        // printf("<pre>%s</pre>", $temp);
        // echo $this->db->get_compiled_select();
        // die();
        return $this->db->get()->result_array();
    }
}