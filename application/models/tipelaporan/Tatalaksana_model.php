<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tatalaksana_model extends CI_Model
{
    public function get_data($id_laporan=NULL, $id_opd=NULL)
    {
        $this->db->from('tatalaksana');
        if($id_opd != NULL){
            $this->db->where('tatalaksana.id_opd', $id_opd);
        }
        if($id_laporan != NULL){
            $this->db->where('tatalaksana.id_laporan', $id_laporan);
        }
        $this->db->join('tatalaksana_opd', 'tatalaksana.id_laporan = tatalaksana_opd.id_laporan')
                    ->join('opd', 'opd.id_opd = tatalaksana_opd.id_opd');

        return $this->db->get()->result();
    }

    public function get_data_by_id($id)
    {
        $tdata = $this->db->get_where('tatalaksana', ['id_laporan' => $id])->result_array()[0];
        $topddata = $this->db->select('tatalaksana_opd.*, opd.nama_opd')
                                ->from('tatalaksana_opd')
                                ->join('opd', 'tatalaksana_opd.id_opd = opd.id_opd')
                                ->where('id_laporan', $id)->get()->result_array();
        return array('t' => $tdata, 'topd' => $topddata);
    }

    public function init_insert($id_opd, $datalaporan, $data)
    {
        $this->db->trans_start();
        $this->load->model('laporan_model', 'lp');
        $this->db->insert('laporan', 
                    [
                        'id_opd' => $datalaporan['id_opd'],
                        'id_tipe' => $datalaporan['id_tipe'],
                        'created_at' => date('Y-m-d H:i:s', time()),
                        'updated_at' => date('Y-m-d H:i:s', time()),
                    ]);
        $this->db->order_by('updated_at', 'DESC');
        $datalaporan = $this->db->get_where('laporan', ['id_opd' => $datalaporan['id_opd'], 'id_tipe' => $datalaporan['id_tipe'],])->result_array()[0];
        $datalaporan['tgl'] = $data['tgl'];
        $this->db->insert('tatalaksana', $datalaporan);
        // insert second etc. table data here

        // end
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return NULL;
        }
        return $datalaporan['id_laporan'];
    }

    public function update_data($id_laporan, $data)
    {
        $table = $data['nama_tabel'];
        unset($data['nama_tabel']);
        $insdata = array();
        if($data != NULL){
            for($i = 0; $i < sizeof(reset($data)); $i+=1){
                array_push($insdata, array(
                            'id_laporan' => $id_laporan,
                            'id_opd' => $data['id_opd'][$i],
                            'uji_kompetensi' => $data['uji_kompetensi'][$i],
                            'sop' => $data['sop'][$i],
                            'tata_naskah_dinas' => $data['tata_naskah_dinas'][$i],
                            'pakaian_dinas' => $data['pakaian_dinas'][$i],
                            'jam_kerja' => $data['jam_kerja'][$i],
                            'jml_nilai' => $data['jml_nilai'][$i],
                            'ket' => $data['ket'][$i]
                ));
            }
        }
        $this->db->trans_begin();
        if($table == 'tatalaksana_opd'){
            $this->db->delete('tatalaksana_opd',"id_laporan = $id_laporan");
            if($data != NULL){
                $this->db->insert_batch('tatalaksana_opd', $insdata);
            }
        }
        $this->db->trans_complete();
        
    }

    public function delete_data($id_laporan)
    {
        $this->db->trans_begin();
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('tatalaksana_opd');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('tatalaksana');
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        $this->db->trans_complete();
    }

}