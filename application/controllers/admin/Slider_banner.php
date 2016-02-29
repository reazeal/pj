<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_banner extends Admin_Controller {
	public function __construct()
	{
		parent::__construct();
		 if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit this page','error');
            redirect('admin','refresh');
        }
		$this->load->model('Slider_model');
		$this->load->helper('url','html','form');
		$this->load->database();
		$this->load->library('form_validation','session');
	}

	public function index()
	{
		$data_content = array();	
		$this->data_content['all_content'] =  array('slider_banner'	=>$this->Slider_model->all() );
		
		$this->load->view('admin/slider/index', $this->data_content['all_content']);
		//$this->render('admin/slider/index', $this->data_content['all_content']);
       
	}

	public function add(){
		$rules = array(
				'caption' => array('field'=>'caption','label'=>'Caption','rules'=>'required'),
				'description' => array('field'=>'description', 'label'=>'Description', 'rules'=>'required')
			);
		
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/slider/add_image');
		}
		else
		{

			/* Start Uploading File */
			 
			$config =	array(
							'upload_path'	=> './uploads/',
	            			'allowed_types' => 'gif|jpg|png',
	            			'max_size'      => 500,
	            			'max_width'     => 1394,
	            			'max_height'    => 868
            			);

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('admin/slider/add_image', $error);
            }
            else
            {
                    $file = $this->upload->data();
                    //print_r($file);
                    $data = array(
                    			'file' 			=> 'uploads/' . $file['file_name'],
                    			'caption'		=> set_value('caption'),
                    			'description'	=> set_value('description')
                    		);
                    $this->Slider_model->create($data);
					$this->session->set_flashdata('message','New image has been added..');
					redirect('admin/slider_banner');
            }
		}
	}

	public function edit($id){
	
		$rules = array(
				'caption' => array('field'=>'caption','label'=>'Caption','rules'=>'required'),
				'description' => array('field'=>'description', 'label'=>'Description', 'rules'=>'required')
			);
		$this->form_validation->set_rules($rules);
		$image = $this->Slider_model->find($id)->row();

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/slider/edit_image',array('image'=>$image));
		}
		else
		{
			if(isset($_FILES["userfile"]["name"]))
			{
				/* Start Uploading File */
				$config =	array(
								'upload_path'	=> './uploads/',
		            			'allowed_types' => 'gif|jpg|png',
		            			'max_size'      => 100,
		            			'max_width'     => 1024,
		            			'max_height'    => 768
	            			);

	            $this->load->library('upload', $config);

	            if ( ! $this->upload->do_upload())
	            {
	                    $error = array('error' => $this->upload->display_errors());
						$this->load->view('admin/slider/edit_image',array('image'=>$image,'error'=>$error));
	            }
	            else
	            {
	                    $file = $this->upload->data();
	                    $data['file'] = 'uploads/' . $file['file_name'];
						unlink($image->file);
	            }
			}

			$data['caption']		= set_value('caption');
			$data['description']	= set_value('description');
			
			$this->Slider_model->update($id,$data);
			$this->session->set_flashdata('message','New image has been updated..');
			redirect('admin/slider_banner');
		}
	}


	public function delete($id)
	{
		$this->Slider_model->delete($id);
		$this->session->set_flashdata('message','Image has been deleted..');
		redirect('admin/slider_banner');
	}
}
