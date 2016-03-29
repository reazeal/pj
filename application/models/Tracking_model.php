<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking_model extends MY_Model
{
    public $table = 'tracking';
    public $primary_key = 'tracking_id';    
    public function __construct()
    {
        parent::__construct();
        
    }

	public function get_nomor()
    {
		$urut = "";
		$this->db->select("max(right(kode,4)) as urut");
		$this->db->like("kode","TRX",'after');
		$query = $this->db->get('petugas');
		foreach ($query->result() as $atributy) {
			$urut = $atributy->urut;
		}
		
		return $urut;
	}

	public function get_tracking_list()
    {
       
        $query = $this->db->get('tracking');
        $parents = array(''=>'Silahkan Pilih...');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $row)
            {
                $parents[$row->tracking_id] = $row->noseri_alat." [".$row->nopol."]";
            }
        }
        return $parents;
    }
    
    
    public function get_data_tracking($search, $sort, $order, $limit, $offset)
    {
    				$data = array();
    				$this->db->start_cache();
    				
    				$this->db->select("
	       				tracking_id,
						alat_id,
						noseri_alat,
						pemasangan_id,
						nomor_seri_gps,
						nopol,
	       				no_pendaftaran,
						nama_konsumen,
						posisi_lat,
						posisi_long,
						status
       				");
       				
       				if(!empty($search)){
						$this->db->like('noseri_alat',$search,'both');
						$this->db->or_like('nomor_seri_gps',$search,'both');
						$this->db->or_like('nopol',$search,'both');
						$this->db->or_like("no_pendaftaran",$search,'both');
						$this->db->or_like("nama_konsumen", $search,'both');
						$this->db->or_like("posisi_lat", $search,'both');
						$this->db->or_like("posisi_long", $search,'both');
						$this->db->or_like("status", $search,'both');
					}
					
					if(!empty($sort)){$this->db->order_by($sort, $order);}else{$this->db->order_by('created_at', 'DESC');}
					$query = $this->db->get('tracking', $limit, $offset);
		        	if(!empty($search)){ $totaly2 = $query->num_rows();}else{ $totaly2 = $this->db->count_all('tracking'); }
			
					if ($totaly2 > 0) {
						foreach ($query->result() as $atributy) {
								
								$data[] = array(
										'tracking_id' => $atributy->tracking_id,
										'alat_id' => $atributy->alat_id,
										'noseri_alat' => $atributy->noseri_alat,
										'pemasangan_id' => $atributy->pemasangan_id,
										'nomor_seri_gps' => $atributy->nomor_seri_gps,
										'nopol' => $atributy->nopol,
										'nama_konsumen' => $atributy->nama_konsumen,
										'posisi_lat' => $atributy->posisi_lat,
										'posisi_long' => $atributy->posisi_long,
										'status' => $atributy->status,
										'no_pendaftaran' => $atributy->no_pendaftaran
									);
						}
						
					} 
					
			return array('total'=>$totaly2,'rows' => $data);
			$this->db->stop_cache();
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