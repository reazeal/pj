<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends MY_Model
{
    public $table = 'klien';
    public $primary_key = 'no_pendaftaran';    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    
    public function get_data_pendaftaran($search, $sort, $order, $limit, $offset)
    {
    				$data = array();
    				$this->db->start_cache();
    				
    				$this->db->select("
	       				no_pendaftaran,
	       				DATE_FORMAT(tanggal,'%d-%m-%Y') as tanggal,
	       				nama,
	       				alamat,
	       				no_telp,
	       				no_hp,
	       				email,
	       				jenis,
	       				no_siup
       				");
       				
       				if(!empty($search)){
						$this->db->like('no_pendaftaran',$search,'both');
						$this->db->or_like("DATE_FORMAT(tanggal,'%d-%m-%Y')", $search,'both');
						$this->db->or_like("nama", $search,'both');
						$this->db->or_like("alamat", $search,'both');
						$this->db->or_like("no_telp", $search,'both');
						$this->db->or_like("no_hp", $search,'both');
						$this->db->or_like("no_siup", $search,'both');
					}
					
					if(!empty($sort)){$this->db->order_by($sort, $order);}else{$this->db->order_by('created_at', 'DESC');}
					$query = $this->db->get('klien', $limit, $offset);
		        	if(!empty($search)){ $totaly2 = $query->num_rows();}else{ $totaly2 = $this->db->count_all('klien'); }
			
					if ($totaly2 > 0) {
						foreach ($query->result() as $atributy) {
							
							$data[] = array(
										'no_pendaftaran' => $atributy->no_pendaftaran,
										'tanggal' => $atributy->tanggal,
										'nama' => $atributy->nama,
										'alamat' => $atributy->alamat,
										'no_telp' => $atributy->no_telp,
										'no_hp' => $atributy->no_hp,
										'email' => $atributy->email,
										'jenis' => $atributy->jenis,
										'no_siup' => $atributy->no_siup
									);
						}
						
					} 
					
			return array('total'=>$totaly2,'rows' => $data);
    }
    
    

    public $rules = array(
        'insert' => array(
            'parent_id' => array('field'=>'parent_id','label'=>'Parent ID','rules'=>'trim|is_natural|required'),
            'title' => array('field'=>'title','label'=>'Title','rules'=>'trim|required'),
            'short_title' => array('field'=>'short_title','label'=>'Short title','rules'=>'trim'),
            'slug' => array('field'=>'slug', 'label'=>'Slug', 'rules'=>'trim'),
            'order' => array('field'=>'order','label'=>'Order','rules'=>'trim|is_natural'),
            'teaser' => array('field'=>'teaser','label'=>'Teaser','rules'=>'trim'),
            'content' => array('field'=>'content','label'=>'Content','rules'=>'trim'),
            'page_title' => array('field'=>'page_title','label'=>'Page title','rules'=>'trim'),
            'page_description' => array('field'=>'page_description','label'=>'Page description','rules'=>'trim'),
            'page_keywords' => array('field'=>'page_keywords','label'=>'Page keywords','rules'=>'trim'),
            'content_id' => array('field'=>'content_id', 'label'=>'Content ID', 'rules'=>'trim|is_natural|required'),
            'content_type' => array('field'=>'content_type','label'=>'Content type','rules'=>'trim|required'),
            'published_at' => array('field'=>'published_at','label'=>'Published at','rules'=>'trim|datetime'),
		    'share_fb' => array('field'=>'share_fb','label'=>'Share Facebook','rules'=>'trim'),
            'language_slug' => array('field'=>'language_slug','label'=>'Language slug','rules'=>'trim|required')
        ),
        'update' => array(
            'parent_id' => array('field'=>'parent_id','label'=>'Parent ID','rules'=>'trim|is_natural|required'),
            'title' => array('field'=>'title','label'=>'Title','rules'=>'trim|required'),
            'short_title' => array('field'=>'short_title','label'=>'Short title','rules'=>'trim'),
            'slug' => array('field'=>'slug', 'label'=>'Slug', 'rules'=>'trim'),
            'order' => array('field'=>'order','label'=>'Order','rules'=>'trim|is_natural'),
            'teaser' => array('field'=>'teaser','label'=>'Teaser','rules'=>'trim'),
            'content' => array('field'=>'content','label'=>'Content','rules'=>'trim'),
            'page_title' => array('field'=>'page_title','label'=>'Page title','rules'=>'trim|required'),
            'page_description' => array('field'=>'page_description','label'=>'Page description','rules'=>'trim'),
            'page_keywords' => array('field'=>'page_keywords','label'=>'Page keywords','rules'=>'trim'),
            'translation_id' => array('field'=>'translation_id', 'label'=>'Translation ID', 'rules'=>'trim|is_natural_no_zero|required'),
            'content_id' => array('field'=>'content_id', 'label'=>'Content ID', 'rules'=>'trim|is_natural_no_zero|required'),
            'content_type' => array('field'=>'content_type','label'=>'Content type','rules'=>'trim|required'),
            'published_at' => array('field'=>'published_at','label'=>'Published at','rules'=>'trim|datetime'),
            'language_slug' => array('field'=>'language_slug','label'=>'language_slug','rules'=>'trim|required')
        ),
        'insert_featured' => array(
            'file_name' => array('field'=>'file_name','label'=>'File name','rules'=>'trim'),
            'content_id' => array('field'=>'content_id','label'=>'Contend ID','rules'=>'tirm|is_natural_no_zero|required')
        )
    );
}