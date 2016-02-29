<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends MY_Model
{
    private $featured_image;
    public $before_create = array('created_by');
    public $before_update = array('updated_by');
    public function __construct()
    {
        $this->featured_image = $this->config->item('cms_featured_image');
        $this->has_many['translations'] = array('Content_translation_model','content_id','id');
        parent::__construct();
    }
    
    
    public function get_data_tags($num, $offset, $bahasa_kode,$tags)
    {
    		$data_content_blog = array();
    		
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
					$data_content_blog = $this->db->get('content_translations a', $num, $offset);
					$totaly2 = $queryy2->num_rows();
			
					if ($totaly2 > 0) {
						foreach ($queryy2->result() as $atributy) {
							$data_content_blog[] = array(
								'id_content_translation' => $atributy->id,
								'content_id' => $atributy->content_id,
								'language_slug' => $atributy->language_slug,
								'title' => $atributy->title,
								'short_title' => $atributy->short_title,
								'teaser' => $atributy->teaser,
								'content' => $atributy->content,
								'page_title' => $atributy->page_title,
								'page_description' => $atributy->page_description,
								'page_keywords' => $atributy->page_keywords,
								'created_at' => $atributy->created_at,
								'updated_at' => $atributy->updated_at,
								'created_by' => $atributy->created_by,
								'updated_by' => $atributy->updated_by,
								'file' => $atributy->file,
								'url' => $atributy->url,
								'judul_gambar' => $atributy->judul_gambar,
								'page_keywordc' => $atributy->page_keywordc,
								'language_slug' => $atributy->language_slug
							);
						}
						
					} 
			
			
			return $data_content_blog;
    }
    
    
    public function get_data_link2($bahasa_kode,$content_id)
    {
    		$data_content_link2 = array();
    		
       				$this->db->select("f.url");
		        	$this->db->where('b.content_type','post');
					$this->db->where('b.published','1');
					$this->db->where('a.language_slug',$bahasa_kode);
					$this->db->where('a.content_id <',$content_id);
					$this->db->join('contents b','a.content_id = b.id');
					$this->db->join('users  c',' c.id = a.created_by','left');
					$this->db->join('users  d',' d.id = a.updated_by','left');
					$this->db->join('images e ','a.content_id = e.content_id','left');
					$this->db->join('slugs f ','f.translation_id = a.id','left');
					$this->db->limit(1);
					$this->db->order_by('a.content_id', 'DESC');
					$queryy2 = $this->db->get('content_translations a');
					$totaly2 = $queryy2->num_rows();
			
					if ($totaly2 > 0) {
						foreach ($queryy2->result() as $atributy2) {
							$data_content_link2[] = array(
								'url_back' => $atributy2->url
							);
						}
						
					} else{
						$data_content_link2[] = array(
								'url_back' => '-'
							);
					}
			
			
			return $data_content_link2;
    }
    
    
     public function get_data_link($bahasa_kode,$content_id)
    {
    		$data_content_link = array();
    		
       				$this->db->select("f.url");
		        	$this->db->where('b.content_type','post');
					$this->db->where('b.published','1');
					$this->db->where('a.language_slug',$bahasa_kode);
					$this->db->where('a.content_id >',$content_id);
					$this->db->join('contents b','a.content_id = b.id');
					$this->db->join('users  c',' c.id = a.created_by','left');
					$this->db->join('users  d',' d.id = a.updated_by','left');
					$this->db->join('images e ','a.content_id = e.content_id','left');
					$this->db->join('slugs f ','f.translation_id = a.id','left');
					$this->db->limit(1);
					//$this->db->order_by('a.content_id', 'DESC');
					$queryy1 = $this->db->get('content_translations a');
					$totaly1 = $queryy1->num_rows();
			
					if ($totaly1 > 0) {
						foreach ($queryy1->result() as $atributy1) {
							$data_content_link[] = array(
								'url_next' => $atributy1->url
							);
						}
						
					}else{
						$data_content_link[] = array(
								'url_next' => '-'
							);
					} 
			
			
			return $data_content_link;
    }
     
     
     public function get_data_konten_blog($bahasa_kode,$content_id)
    {
    		$data_content_blog = array();
    		
       		$this->db->select("a.*, c.username AS created_by, d.username AS updated_by, e.file, e.title AS judul_gambar,f.url");
		        	$this->db->where('b.content_type','post');
					$this->db->where('b.published','1');
					$this->db->where('a.language_slug',$bahasa_kode);
					$this->db->where('a.content_id',$content_id);
					$this->db->join('contents b','a.content_id = b.id');
					$this->db->join('users  c',' c.id = a.created_by','left');
					$this->db->join('users  d',' d.id = a.updated_by','left');
					$this->db->join('images e ','a.content_id = e.content_id','left');
					$this->db->join('slugs f ','f.translation_id = a.id','left');
					$queryy = $this->db->get('content_translations a');
					$totaly = $queryy->num_rows();
			
					if ($totaly > 0) {
						foreach ($queryy->result() as $atributy) {
							$data_content_blog[] = array(
								'id_content_translation' => $atributy->id,
								'content_id' => $atributy->content_id,
								'language_slug' => $atributy->language_slug,
								'title' => $atributy->title,
								'short_title' => $atributy->short_title,
								'teaser' => $atributy->teaser,
								'content' => $atributy->content,
								'page_title' => $atributy->page_title,
								'page_description' => $atributy->page_description,
								'page_keywords' => $atributy->page_keywords,
								'created_at' => $atributy->created_at,
								'updated_at' => $atributy->updated_at,
								'created_by' => $atributy->created_by,
								'updated_by' => $atributy->updated_by,
								'file' => $atributy->file,
								'url' => $atributy->url,
								'judul_gambar' => $atributy->judul_gambar,
								'language_slug' => $atributy->language_slug
							);
						}
						
					} 
			
			
			return $data_content_blog;
    }
    
    
    public function get_data_kategori($bahasa_kode)
    {
    		$data_content_category = array();
    		
       		$this->db->select("CONCAT('$bahasa_kode','/',a.content_id) AS content_id,a.title,a.page_keywords, c.username AS created_by, d.username AS updated_by, e.file, e.title AS judul_gambar,CONCAT('$bahasa_kode','/',a.page_keywords) AS page_keywordc");
        	$this->db->where('b.content_type','post');
			$this->db->where('b.published','1');
			$this->db->where('a.language_slug',$bahasa_kode);
			$this->db->join('contents b','a.content_id = b.id');
			$this->db->join('users  c',' c.id = a.created_by','left');
			$this->db->join('users  d',' d.id = a.updated_by','left');
			$this->db->join('images e ','a.content_id = e.content_id','left');
			$query = $this->db->get('content_translations a');
			$total = $query->num_rows();
			
			if ($total > 0) {
				foreach ($query->result() as $atribut) {
					$data_content_category[] = array(
						'content_id' => $atribut->content_id,
						'title' => $atribut->title,
						'page_keywordc' => $atribut->page_keywordc,
						'page_keywords' => $atribut->page_keywords
					);
				}
			} 
			
			
			return $data_content_category;
    }
    
    
    public function get_data_produk($bahasa_kode)
    {
    		$data_content_produk = array();
    		
       		$this->db->select('
			a.*, 
			b.language_name, 
			b.language_code, 
			b.slug 
			');
			$this->db->where('b.slug',$bahasa_kode);
			$this->db->join('languages b ','a.id_languages = b.id');
			$queryxx = $this->db->get('daftar_produk a');
			$totalxx = $queryxx->num_rows();
			
			if ($totalxx > 0) {
				foreach ($queryxx->result() as $atributxxx) {
					$data_content_produk[] = array(
						'judul_produk' => $atributxxx->judul_produk,
						'diskripsi_produk' => $atributxxx->diskripsi_produk,
						'gambar' => $atributxxx->gambar
					);
				}
				
			} 
			
			return $data_content_produk;
    }
    
    public function get_slider()
    {
    		$data_content_slider = array();
    		
       		$queryx = $this->db->get('slider_banner');
			$totalx = $queryx->num_rows();
			
			if ($totalx > 0) {
				foreach ($queryx->result() as $atributx) {
					$data_content_slider[] = array(
						'id' => $atributx->id,
						'file' => $atributx->file,
						'caption' => $atributx->caption,
						'description' => $atributx->description
					);
				}
				
			} 
			
			return $data_content_slider;
    }

    public function get_latest($bahasa_kode)
    {
    		$data_content = array();
    		
       		$this->db->select("a.*, c.username AS created_by, d.username AS updated_by, e.file, 
        	e.title AS judul_gambar,
        	f.url
        	");
        	$this->db->where('b.content_type','post');
			$this->db->where('b.published','1');
			$this->db->where('a.language_slug',$bahasa_kode);
			$this->db->join('contents b','a.content_id = b.id');
			$this->db->join('users  c',' c.id = a.created_by','left');
			$this->db->join('users  d',' d.id = a.updated_by','left');
			$this->db->join('images e ','a.content_id = e.content_id','left');
			$this->db->join('slugs f ','f.translation_id = a.id','left');
			$this->db->order_by('a.id','DESC');
			$this->db->limit(6);
			$query = $this->db->get('content_translations a');
			$total = $query->num_rows();
			
			if ($total > 0) {
				foreach ($query->result() as $atribut) {
					$data_content[] = array(
						'id_content_translation' => $atribut->id,
						'content_id' => $atribut->content_id,
						'language_slug' => $atribut->language_slug,
						'title' => $atribut->title,
						'short_title' => $atribut->short_title,
						'teaser' => $atribut->teaser,
						'content' => $atribut->content,
						'page_title' => $atribut->page_title,
						'page_description' => $atribut->page_description,
						'page_keywords' => $atribut->page_keywords,
						'created_at' => $atribut->created_at,
						'updated_at' => $atribut->updated_at,
						'created_by' => $atribut->created_by,
						'updated_by' => $atribut->updated_by,
						'file' => $atribut->file,
						'url' => $atribut->url,
						'judul_gambar' => $atribut->judul_gambar,
						'language_slug' => $atribut->language_slug
					);
				}
				
			} 
			
			return $data_content;
    }
    
    
    public function created_by($data)
    {
        $data['created_by'] = $this->user_id;
        return $data;
    }

    public function updated_by($data)
    {
        $data['updated_by'] = $this->user_id;
        return $data;
    }

    public function get_content_list($content_type = 'post', $language_slug = NULL)
    {
        $this->db->select('contents.id as content_id, contents.content_type, contents.parent_id, contents.featured_image, contents.order, contents.published, contents.published_at, content_translations.id as translation_id, content_translations.language_slug, content_translations.short_title as translation_title, content_translations.rake as translation_rake,
		content_translations.share_fb
		');
        $this->db->where('contents.content_type',$content_type);
        if(isset($language_slug))
        {
            $this->db->where('content_translations.language_slug',$language_slug);
        }
        $this->db->join('content_translations','contents.id = content_translations.content_id');
        $query = $this->db->get('contents');
        if($query->num_rows()>0)
        {
            $list_content = array();
            foreach ($query->result() as $row)
            {
                if(!array_key_exists($row->content_id,$list_content))
                {
                    $featured_image = '';
                    if (strlen($row->featured_image) > 0) $featured_image = site_url('media/' . $this->featured_image . '/' . $row->featured_image);
                    $list_content[$row->content_id] = array(
                        'content_type' => $row->content_type,
                        'published' => $row->published,
                        'published_at' => $row->published_at,
                        //'created_at' => $row->created_at,
                        'featured_image' => $featured_image,
                        //'last_update' => $page->updated_at,
                        //'deleted' => $page->deleted_at,
                        'translations' => array(),
                        'title' => '');
                }
                $list_content[$row->content_id]['translations'][$row->language_slug] = array(
                            'translation_id' => $row->translation_id,
                            'title' => $row->translation_title,
                            'rake' => $row->translation_rake);
                            //'created_at' => $translation->created_at,
                            //'last_update' => $translation->updated_at,
                            //'deleted' => $translation->deleted_at);
                if ($row->language_slug == $_SESSION['default_lang'])
                {
                    $list_content[$row->content_id]['title'] = $row->translation_title;
                }
                elseif (strlen($list_content[$row->content_id]['title']) == 0)
                {
                    $list_content[$row->content_id]['title'] = $row->translation_title;
                }
            }
            return $list_content;
        }
        else
        {
            return FALSE;
        }
    }

    public function get_parents_list($content_type,$content_id,$language_slug)
    {
        $this->db->select('contents.id, content_translations.short_title');
        $this->db->order_by('short_title','asc');
        $this->db->join('content_translations','contents.id = content_translations.content_id','right');
        $this->db->where('contents.id != ',$content_id);
        if($content_type == 'post')
        {
            $this->db->where('contents.content_type','category');
        }
        else
        {
            $this->db->where('contents.content_type',$content_type);
        }
        $this->db->where('contents.id !=',$content_id);
        $this->db->where('content_translations.language_slug',$language_slug);
        $query = $this->db->get('contents');
        $parents = array('0'=>'No parent');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $row)
            {
                $parents[$row->id] = $row->short_title;
            }
        }
        return $parents;
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