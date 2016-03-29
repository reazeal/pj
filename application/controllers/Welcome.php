<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('slug_model');
        $this->load->model('content_model');
    }

    public function index()
    {
    		$data_content = array();
    		$data_content_slider = array();
    		$data_content_produk = array();
    		$language  = $this->data['current_lang'];
        	$bahasa_kode = $language['slug'];
        	
			$this->data_content['all_content'] 	= $this->content_model->get_latest($bahasa_kode);
			$this->data_content['content_prod'] 	= $this->content_model->get_data_produk($bahasa_kode);
			$this->data_content['content_slider'] 	= $this->content_model->get_slider();
			
				            
        $this->render('public/homepage_view');
       
    }

	 public function get_data_produk()
	 {
	 	
	 	$query = $this->db->get('view_galeri_produk');
		$total = $query->num_rows();
	 	
		?>
		
		$(function(){
			$("#elastic_grid_demo").elastic_grid({	
				'hoverDirection': true,
				'hoverDelay': 0,
				'hoverInverse': false,
				'expandingSpeed': 500,
				'expandingHeight': 500,
				'items' :
					[		
		
		<?php
	 			
	 			foreach($query->result() as $at) :
				  if($at!=''){
				  	
				  	$file = str_replace(",", "', '", $at->filenya);
				  	$tags = str_replace(",", "', '", $at->nama_tagsnya);
				  	
				  	
				  	?>
				  	
				  	{
						'title' : '<?php echo $at->title; ?>',
						'description'   : '<?php echo $at->description; ?>',
						'thumbnail' : ['<?php echo $file; ?>'],
						'large' : ['<?php echo $file; ?>'],
						'button_list'   :
						[],
						'tags'  : ['All','<?php echo $tags; ?>']
						},
				  	
				  	
				  	<?php
				  }
				endforeach;
				
				?>
						]
					});
				});
				
				<?php
	 	
	 }
	
}