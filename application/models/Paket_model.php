<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends MY_Model
{
    public $table = 'paket';
    public $primary_key = 'paket_id';    
    public function __construct()
    {
        parent::__construct();
        
    }

	public function get_data_paket($search, $sort, $order, $limit, $offset)
    {
    				$data = array();
    				$this->db->start_cache();
    				
    				$this->db->select("
	       				paket_id,
						nama_paket,
						harga
       				");
       				
       				if(!empty($search)){
						$this->db->like('nama_paket',$search,'both');
						$this->db->or_like("harga", $search,'both');
					}
					
					if(!empty($sort)){$this->db->order_by($sort, $order);}else{$this->db->order_by('created_at', 'DESC');}
					$query = $this->db->get('paket', $limit, $offset);
		        	if(!empty($search)){ $totaly2 = $query->num_rows();}else{ $totaly2 = $this->db->count_all('paket'); }
			
					if ($totaly2 > 0) {
						foreach ($query->result() as $atributy) {
							
							$data[] = array(
										'nama_paket' => $atributy->nama_paket,
										'harga' => $atributy->harga,
										'paket_id' => $atributy->paket_id
									);
						}
						
					} 
					
			return array('total'=>$totaly2,'rows' => $data);
    }
    
    

    public $rules = array(
        'insert' => array(
            'nomer_seri' => array('field'=>'nomer_seri','label'=>'Nomer Seri','rules'=>'trim|is_natural|required'),
            'tanggal_pembelian' => array('field'=>'tanggal_pembelian','label'=>'Tanggal Pembelian','rules'=>'trim|required')
        ),
        'update' => array(
            'id' => array('field'=>'id','label'=>'id','rules'=>'trim|is_natural|required'),
            'nomer_seri' => array('field'=>'nomer_seri','label'=>'Nomer Seri','rules'=>'trim|is_natural|required'),
            'tanggal_pembelian' => array('field'=>'tanggal_pembelian','label'=>'Tanggal Pembelian','rules'=>'trim|required')
        )
    );
}