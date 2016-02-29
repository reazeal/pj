<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    public function __construct()
	 {
	 parent::__construct();
	 }
	 
	 public function get_event($tahun,$bulan)
	 {
	 	
	 	$this->db->select("
	 	DAY(tgl_event) hari, 
		GROUP_CONCAT( CONCAT(jenis_event,' : ',nama_event) SEPARATOR ' &raquo; ' ) as nama_event
	 	");
		$this->db->where('YEAR(tgl_event)',$tahun);
		$this->db->where('MONTH(tgl_event)',$bulan);
		$this->db->group_by('tgl_event');
		$data = $this->db->get('event_calendar');
					
		 return $data->result();
	 }
	 
	 
	 public function get_data_semuanya($num, $offset, $bahasa_kode)
	 {
	 	
	 	$this->db->select("a.*, c.username AS created_by, d.username AS updated_by, e.file, e.title AS judul_gambar, f.url");
    	$this->db->where('b.content_type','post');
		$this->db->where('b.published','1');
		$this->db->where('a.language_slug',$bahasa_kode);
		$this->db->join('contents b','a.content_id = b.id');
		$this->db->join('users  c',' c.id = a.created_by','left');
		$this->db->join('users  d',' d.id = a.updated_by','left');
		$this->db->join('images e ','a.content_id = e.content_id','left');
		$this->db->join('slugs f ','f.translation_id = a.id','left');
		$this->db->order_by('a.content_id', 'DESC');
		$data = $this->db->get('content_translations a', $num, $offset);
					
		 return $data->result();
	 } 
	 
	 
	 public function get_data_category($bahasa_kode)
	 {
	 	
	 	$this->db->select("a.*, c.username AS created_by, d.username AS updated_by, e.file, e.title AS judul_gambar, f.url");
    	$this->db->where('b.content_type','post');
		$this->db->where('b.published','1');
		$this->db->where('a.language_slug',$bahasa_kode);
		$this->db->join('contents b','a.content_id = b.id');
		$this->db->join('users  c',' c.id = a.created_by','left');
		$this->db->join('users  d',' d.id = a.updated_by','left');
		$this->db->join('images e ','a.content_id = e.content_id','left');
		$this->db->join('slugs f ','f.translation_id = a.id','left');
		$this->db->order_by('a.content_id', 'DESC');
		$this->db->limit('3');
		$data = $this->db->get('content_translations a');
					
		 return $data->result();
	 }
	 
	 
	 public function get_data_category_beneran($bahasa_kode)
	 {
	 	
	 		$this->db->select("CONCAT('$bahasa_kode','/',a.content_id) AS content_id,a.title, c.username AS created_by, d.username AS updated_by, e.file, e.title AS judul_gambar,CONCAT('$bahasa_kode','/',a.page_keywords) AS page_keywordc, a.page_keywords");
        	$this->db->where('b.content_type','category');
			$this->db->where('b.published','1');
			$this->db->where('a.language_slug',$bahasa_kode);
			$this->db->join('contents b','a.content_id = b.id');
			$this->db->join('users  c',' c.id = a.created_by','left');
			$this->db->join('users  d',' d.id = a.updated_by','left');
			$this->db->join('images e ','a.content_id = e.content_id','left');
			$data = $this->db->get('content_translations a');
					
		 return $data->result();
	 }
	 
	 
	  public function get_data_kategori($num, $offset, $bahasa_kode,$parent_id)
	 {
	 	
	 	$this->db->select("a.*, c.username AS created_by, d.username AS updated_by, e.file, e.title AS judul_gambar, f.url");
    	$this->db->where('b.content_type','post');
		$this->db->where('b.published','1');
		$this->db->where('a.language_slug',$bahasa_kode);
		$this->db->where('g.parent_id',$parent_id);
		$this->db->join('contents b','a.content_id = b.id');
		$this->db->join('users  c',' c.id = a.created_by','left');
		$this->db->join('users  d',' d.id = a.updated_by','left');
		$this->db->join('images e ','a.content_id = e.content_id','left');
		$this->db->join('slugs f ','f.translation_id = a.id','left');
		$this->db->join('contents g ','g.id = a.content_id ','left');
		$this->db->order_by('a.content_id', 'DESC');
		$data = $this->db->get('content_translations a', $num, $offset);
					
		 return $data->result();
	 }
	 
	 
	 public function get_data_tags($num, $offset, $bahasa_kode,$tags){
		$this->db->select("a.*, c.username AS created_by, d.username AS updated_by, e.file, e.title AS judul_gambar,f.url,
		CONCAT('$bahasa_kode','/',a.page_keywords) AS page_keywordc");
    	$this->db->like('a.page_keywords',$tags,'both');
    	$this->db->where('b.content_type','post');
		$this->db->where('b.published','1');
		$this->db->where('a.language_slug',$bahasa_kode);
		$this->db->join('contents b','a.content_id = b.id');
		$this->db->join('users  c',' c.id = a.created_by','left');
		$this->db->join('users  d',' d.id = a.updated_by','left');
		$this->db->join('images e ','a.content_id = e.content_id','left');
		$this->db->join('slugs f ','f.translation_id = a.id','left');
		$this->db->order_by('a.content_id', 'DESC');
		$data = $this->db->get('content_translations a', $num, $offset);
	 	
	 	return $data->result();
	 	
	 }
	 
}