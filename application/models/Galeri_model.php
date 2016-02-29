<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends MY_Model
{
    public $table = 'galeri_produk';
    public $primary_key = 'id_galeri';

    public function __construct()
    {
        $this->has_many['items'] = array('id_tags','id_gambar_produk');
        $this->pagination_delimiters = array('<li>','</li>');
        $this->pagination_arrows = array('<span aria-hidden="true">&laquo;</span>','<span aria-hidden="true">&raquo;</span>');
        parent::__construct();
    }

    public $rules = array(
        'insert' => array(
            'title' => array('field'=>'title','label'=>'Title','rules'=>'trim|required')
        ),
        'update' => array(
            'title' => array('field'=>'title','label'=>'Title','rules'=>'trim|required'),
            'menu_id' => array('field'=>'menu_id', 'label'=>'ID', 'rules'=>'trim|is_natural_no_zero|required')
        )
    );
}