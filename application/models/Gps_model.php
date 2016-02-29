<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gps_model extends MY_Model
{
    public $table = 'gps';
    public $primary_key = 'id';    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    
    public function get_data_gps($search, $sort, $order, $limit, $offset)
    {
    				$data = array();
    				$this->db->start_cache();
    				
    				$this->db->select("
	       				id,
						nomer_seri,
	       				DATE_FORMAT(tanggal_pembelian,'%d-%m-%Y') as tanggal_pembelian
       				");
       				
       				if(!empty($search)){
						$this->db->like('nomer_seri',$search,'both');
						$this->db->or_like("DATE_FORMAT(tanggal_pembelian,'%d-%m-%Y')", $search,'both');
					}
					
					if(!empty($sort)){$this->db->order_by($sort, $order);}else{$this->db->order_by('created_at', 'DESC');}
					$query = $this->db->get('gps', $limit, $offset);
		        	if(!empty($search)){ $totaly2 = $query->num_rows();}else{ $totaly2 = $this->db->count_all('gps'); }
			
					if ($totaly2 > 0) {
						foreach ($query->result() as $atributy) {
							
							$data[] = array(
										'nomer_seri' => $atributy->nomer_seri,
										'tanggal_pembelian' => $atributy->tanggal_pembelian,
										'id' => $atributy->id
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