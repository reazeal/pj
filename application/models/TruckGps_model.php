<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TruckGps_model extends MY_Model
{
    public $table = 'truck_gps';
    public $primary_key = 'id';    
    public function __construct()
    {
        parent::__construct();
        
    }
    
	public function get_truck_list()
    {
       
        $query = $this->db->get('truck_gps');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $row)
            {
				$data[$row->id] = array(
					'id' => $row->id,
					'nama' => $row->nama,
					'status' => $row->status,
					'foto' => $row->foto,
					'lat' => $row->lat,
					'lon' => $row->lon
				);
              
            }
        }
        return $data;
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