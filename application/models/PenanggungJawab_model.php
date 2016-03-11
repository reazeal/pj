<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PenanggungJawab_model extends MY_Model
{
    public $table = 'detail_penanggung_jawab';
    public $primary_key = 'penanggung_jawab_id';    
    public function __construct()
    {
        parent::__construct();
        
    }


	public function get_jawaban($id_pemasangan)
    {
		$dt_ar = array();
		$this->db->where("pemasangan_id",$id_pemasangan);
		$query = $this->db->get('detail_penanggung_jawab');
		$totaly2 = $query->num_rows();
		foreach ($query->result() as $ax) {
			$dt_ar[] = array(
				   'penanggung_jawab_id' => $ax->penanggung_jawab_id,
				   'pemasangan_id' => $ax->pemasangan_id,
				   'ktp' => $ax->ktp,
				   'nama' => $ax->nama,
				   'alamat' => $ax->alamat,
					'telp' => $ax->telp
				);  

		}
		return array('total'=>$totaly2,'rows' => $dt_ar);
		//return $dt_ar;
	}
}