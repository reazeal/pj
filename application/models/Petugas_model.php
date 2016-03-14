<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends MY_Model
{
    public $table = 'petugas';
    public $primary_key = 'petugas_id';    
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

	public function get_petugas_list()
    {
       
        $query = $this->db->get('petugas');
        $parents = array(''=>'Silahkan Pilih...');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $row)
            {
                $parents[$row->petugas_id] = $row->nama." [".$row->kode."]";
            }
        }
        return $parents;
    }
    
    
    public function get_data_petugas($search, $sort, $order, $limit, $offset)
    {
    				$data = array();
    				$this->db->start_cache();
    				
    				$this->db->select("
	       				petugas_id,
						kode,
						nama,
						alamat,
						IF(foto='' OR foto IS NULL ,'no-user-image.gif',foto) as foto,
						DATE_FORMAT(tgl_lahir,'%d-%m-%Y') as tgl_lahir,
	       				no_ktp
       				");
       				
       				if(!empty($search)){
						$this->db->like('kode',$search,'both');
						$this->db->like('nama',$search,'both');
						$this->db->like('alamat',$search,'both');
						$this->db->like("DATE_FORMAT(tgl_lahir,'%d-%m-%Y')",$search,'both');
						$this->db->or_like("no_ktp", $search,'both');
					}
					
					if(!empty($sort)){$this->db->order_by($sort, $order);}else{$this->db->order_by('created_at', 'DESC');}
					$query = $this->db->get('petugas', $limit, $offset);
		        	if(!empty($search)){ $totaly2 = $query->num_rows();}else{ $totaly2 = $this->db->count_all('petugas'); }
			
					if ($totaly2 > 0) {
						foreach ($query->result() as $atributy) {
							
							$data[] = array(
										'foto' => $atributy->foto,
										'alamat' => $atributy->alamat,
										'nama' => $atributy->nama,
										'tgl_lahir' => $atributy->tgl_lahir,
										'kode' => $atributy->kode,
										'no_ktp' => $atributy->no_ktp,
										'petugas_id' => $atributy->petugas_id
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