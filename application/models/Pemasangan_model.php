<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasangan_model extends MY_Model
{
    public $table = 'pemasangan';
    public $primary_key = 'pemasangan_id';    
    public function __construct()
    {
        parent::__construct();
        
    }

	public function get_nomor()
    {
		$this->db->select("max(right(kode,4)) as urut");
		$this->db->like("kode","TRX",'after');
		$query = $this->db->get('petugas');
		foreach ($query->result() as $atributy) {
			$urut = $atributy->urut;
		}
		
		return $urut;
	}

	public function get_pendaftaran_list()
    {
       
        $query = $this->db->get('klien');
        $parents = array(''=>'Silahkan Pilih...');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $row)
            {
                $parents[$row->no_pendaftaran] = $row->no_pendaftaran." , Nama : ".$row->nama;
            }
        }
        return $parents;
    }


	public function get_gps_list()
    {
       
        $query = $this->db->get('gps');
        $parents = array(''=>'Silahkan Pilih...');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $row)
            {
                $parents[$row->id] = $row->nomer_seri;
            }
        }
        return $parents;
    }
    
    
    public function get_data_pemasangan($search, $sort, $order, $limit, $offset)
    {
    				$data = array();
    				$this->db->start_cache();
    				
    				$this->db->select("
	       				pemasangan_id,
						no_pendaftaran,
						nama,
						gps_id,
						nomor_seri,
						petugas_id,
						nama_petugas,
						nopol,
						merk_kendaraan,
						no_rangka_kendaraan,
						no_mesin_kendaraan
       				");
       				
       				if(!empty($search)){
						$this->db->like('no_pendaftaran',$search,'both');
						$this->db->like('nama',$search,'both');
						$this->db->like('nomor_seri',$search,'both');
						$this->db->like("nama_petugas",$search,'both');
						$this->db->or_like("nopol", $search,'both');
						$this->db->or_like("merk_kendaraan", $search,'both');
						$this->db->or_like("no_rangka_kendaraan", $search,'both');
						$this->db->or_like("no_mesin_kendaraan", $search,'both');
					}
					
					if(!empty($sort)){$this->db->order_by($sort, $order);}else{$this->db->order_by('created_at', 'DESC');}
					$query = $this->db->get('pemasangan', $limit, $offset);
		        	if(!empty($search)){ $totaly2 = $query->num_rows();}else{ $totaly2 = $this->db->count_all('pemasangan'); }
			
					if ($totaly2 > 0) {
						foreach ($query->result() as $atributy) {
							
							$data[] = array(
										'pemasangan_id' => $atributy->pemasangan_id,
										'no_pendaftaran' => $atributy->no_pendaftaran,
										'nama' => $atributy->nama,
										'gps_id' => $atributy->gps_id,
										'nomor_seri' => $atributy->nomor_seri,
										'nopol' => $atributy->nopol,
										'merk_kendaraan' => $atributy->merk_kendaraan,
										'no_rangka_kendaraan' => $atributy->no_rangka_kendaraan,
										'no_mesin_kendaraan' => $atributy->no_mesin_kendaraan,
										'petugas_id' => $atributy->petugas_id,
										'nama_petugas' => $atributy->nama_petugas
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