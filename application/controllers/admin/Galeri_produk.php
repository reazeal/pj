<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_produk extends Admin_Controller {
	public function __construct()
	{
		parent::__construct();
		 if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit this page','error');
            redirect('admin','refresh');
        }
		$this->load->model('Galeri_produk_model');
		$this->load->helper('url','html','form');
		$this->load->database();
		$this->load->library('form_validation','session');
		$this->load->library('facebook');
		$this->load->helper('url');
	}

	public function index()
	{
		$data_content = array();	
		$this->data_content['all_content'] =  array('galeri_produk'	=>$this->Galeri_produk_model->all() );
		
		$this->load->view('admin/galeri_produk/index', $this->data_content['all_content']);
		//$this->render('admin/slider/index', $this->data_content['all_content']);
       
	}

	public function add(){
		$rules = array(
				'title' => array('field'=>'title','label'=>'Nama Produk','rules'=>'required'),
				'description' => array('field'=>'description', 'label'=>'Diskripsi Produk', 'rules'=>'required')
			);
		
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/galeri_produk/add_galeri');
		}
		else
		{

			
                   $data = array(
                    			'title'		=> set_value('title'),
                    			'description'	=> set_value('description')
                    		);
                    $this->Galeri_produk_model->create($data);
					$this->session->set_flashdata('message','Produk telah ditambahkan..');
					redirect('admin/galeri_produk');
           
		}
	}

	public function add_tags($id_galeri){
		
		$image = $this->Galeri_produk_model->find($id_galeri)->row();

		$rules = array(
				'nama_tags' => array('field'=>'nama_tags','label'=>'Tags/Kategori','rules'=>'required')
			);
		
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/galeri_produk/add_tags',array('image'=>$image));
		}
		else
		{

			
                   $data = array(
                    			'nama_tags'		=> set_value('nama_tags'),
                    			'id_galeri'		=> $id_galeri
                    		);
                    $this->Galeri_produk_model->create_tags($data);
					$this->session->set_flashdata('message','Tags Produk telah ditambahkan..');
					redirect('admin/galeri_produk');
           
		}
	}


	public function add_gambar($id_galeri){
		
		   $image = $this->Galeri_produk_model->find($id_galeri)->row();

			$config =	array(
							'upload_path'	=> './uploads/',
	            			'allowed_types' => 'gif|jpg|png',
	            			'max_size'      => 500,
	            			'max_width'     => 1394,
	            			'multi'     	=> 'all',
	            			'max_height'    => 868
            			);

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('admin/galeri_produk/add_image',array('image'=>$image,'error'=>$error));
            }
            else
            {
                    $file = $this->upload->data();
                    //print_r($file);
                    $data = array(
                    			'file' 					=> 'uploads/' . $file['file_name'],
                    			'id_galeri_produk'		=> $id_galeri
                    		);
                    $this->Galeri_produk_model->create_gambar($data);
					$this->session->set_flashdata('message','New image has been added..');
					redirect('admin/galeri_produk');
            }
		
	}



	public function edit($id_galeri){
	
		$rules = array(
				'title' => array('field'=>'title','label'=>'Nama Produk','rules'=>'required'),
				'description' => array('field'=>'description', 'label'=>'Diskripsi Produk', 'rules'=>'required')
			);
		$this->form_validation->set_rules($rules);
		$image = $this->Galeri_produk_model->find($id_galeri)->row();

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/galeri_produk/edit_image',array('image'=>$image));
		}
		else
		{

			$data['title']			= set_value('title');
			$data['description']	= set_value('description');
			
			$this->Galeri_produk_model->update($id_galeri,$data);
			$this->session->set_flashdata('message','New image has been updated..');
			redirect('admin/galeri_produk');
		}
	}


	public function delete($id_galeri)
	{
		$this->Galeri_produk_model->delete($id_galeri);
		$this->session->set_flashdata('message','Image has been deleted..');
		redirect('admin/slider_banner');
	}

	public function share_fb($id_galeri)
	{
		$image    = $this->Galeri_produk_model->find($id_galeri)->row();
		$dt_image = $image->filenya;
		$diskripsi_image = $image->description;

		$data_explode = explode(',',$dt_image);

		 

		 for($i=0;$i<count($data_explode);$i++){
		     //echo $data_explode[$i];
			 //echo "<img src='".site_url($data_explode[$i])."'/>";
			    $yyy = $this->facebook->publish_image(site_url($data_explode[$i]), $diskripsi_image);
			    if($yyy['code']=='463'){
					$fb_message = "Tidak bisa diposting ke Facebook!, Anda yakin sudah login Facebook?.";
				}elseif($yyy['code']=='1'){
					$fb_message = "Tidak bisa diposting ke Facebook!, An unknown error has occurred.";
				}else{
					$fb_message = "Postingan sudah diposting ke Facebook!.";
				}
		 }

		$this->session->set_flashdata('message','Share Fb complete..'.$fb_message);
		//$this->postal->add('The published status was set. '.$fb_message,'success');
		redirect('admin/galeri_produk');
	}

}
