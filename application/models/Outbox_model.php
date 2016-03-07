<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Outbox_model extends MY_Model
{
    public $table = 'outbox';
    //public $primary_key = 'id';    
    public function __construct()
    {
        parent::__construct();
        
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