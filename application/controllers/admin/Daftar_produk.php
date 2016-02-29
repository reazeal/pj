<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_produk extends Admin_Controller {
	public function __construct()
	{
		parent::__construct();
		 if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit this page','error');
            redirect('admin','refresh');
        }
		$this->load->model('Daftar_produk_model');
		$this->load->helper('url','html','form');
		$this->load->database();
		$this->load->library('form_validation','session');
	}

	public function index()
	{
		$data_content = array();	
		$this->data_content['all_content'] =  array('daftar_produk'	=>$this->Daftar_produk_model->all() );
		
		$this->load->view('admin/daftar_produk/index', $this->data_content['all_content']);
		//$this->render('admin/slider/index', $this->data_content['all_content']);
       
	}

	public function add(){
		
		 $this->data_content['all_content']  =  array('bahasanya'=>$this->Daftar_produk_model->get_language_list());


		$rules = array(
				'id_languages' => array('field'=>'id_languages','label'=>'Bahasa Terjemahan','rules'=>'required'),
				'caption' => array('field'=>'caption','label'=>'Judul Produk','rules'=>'required'),
				'description' => array('field'=>'description', 'label'=>'Diskripsi Produk', 'rules'=>'required')
			);
		
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/daftar_produk/add_produk',$this->data_content['all_content']);
		}
		else
		{

			/* Start Uploading File */
			 
			$config =	array(
							'upload_path'	=> './uploads/',
	            			'allowed_types' => 'gif|jpg|png',
	            			'max_size'      => 500,
	            			'multi'      	=> 'All',
	            			'max_width'     => 1394,
	            			'max_height'    => 868
            			);

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('admin/daftar_produk/add_produk', $error);
            }
            else
            {
                    $file = $this->upload->data();
                    //print_r($file);
                    $data = array(
                    			'gambar' 			=> 'uploads/' . $file['file_name'],
                    			'id_languages'	=> set_value('id_languages'),
                    			'judul_produk'	=> set_value('caption'),
                    			'diskripsi_produk'	=> set_value('description')
                    		);
                    $this->Daftar_produk_model->create($data);
					$this->session->set_flashdata('message','New image has been added..');
					redirect('admin/daftar_produk');
            }
		}
	}

	public function edit($id){
	
	
	 $this->data_content['all_content']  =  array('bahasanya'=>$this->Daftar_produk_model->get_language_list());


		$rules = array(
				'id_languages' => array('field'=>'id_languages','label'=>'Bahasa Terjemahan','rules'=>'required'),
				'caption' => array('field'=>'caption','label'=>'Judul Produk','rules'=>'required'),
				'description' => array('field'=>'description', 'label'=>'Diskripsi Produk', 'rules'=>'required')
			);
			
		$this->form_validation->set_rules($rules);
		$image = $this->Daftar_produk_model->find($id)->row();

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/daftar_produk/edit_image',array('image'=>$image,'bahasanya'=>$this->data_content['all_content']));
		}
		else
		{
			
			if(isset($_FILES["userfile"]["name"]))
			{
				/* Start Uploading File */
				$config =	array(
								'upload_path'	=> './uploads/',
		            			'allowed_types' => 'gif|jpg|png',
		            			'max_size'      => 500,
		            			'max_width'     => 1024,
		            			'multi'     	=> 'All',
		            			'max_height'    => 768
	            			);

	            $this->load->library('upload', $config);

	            if ( ! $this->upload->do_upload())
	            {
	            	   
	                    $error = array('error' => $this->upload->display_errors());
						$this->load->view('admin/daftar_produk/edit_image',array('image'=>$image,'error'=>$error));
	            }
	            else
	            {
	                    $file = $this->upload->data();
	                    $data['gambar'] = 'uploads/' . $file['file_name'];
	                    $gambare 	= 'uploads/' . $file['file_name'];
						unlink($image->file);
	            }
			}

			
			$data['judul_produk']		= set_value('caption');
			$data['diskripsi_produk']	= set_value('description');
			$data['id_languages']		= set_value('id_languages');
			$data['gambar']				= $gambare;
			
			$this->Daftar_produk_model->update($id,$data);
			$this->session->set_flashdata('message','New image has been updated..');
			redirect('admin/daftar_produk');
		}
	}


	public function delete($id)
	{
		$this->Slider_model->delete($id);
		$this->session->set_flashdata('message','Image has been deleted..');
		redirect('admin/slider_banner');
	}
}
