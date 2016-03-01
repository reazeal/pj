<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gps extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
        if(!$this->ion_auth->in_group('admin'))
        {
			if($this->ion_auth->in_group('members')!=1){
				$this->postal->add('You are not allowed to visit the Contents page','error');
				redirect('admin','refresh');
			}
            
        }

		$this->load->model('gps_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('url');
	}

	public function index()
	{
		$this->data['menu_data'] = array('master'=>true,'transaksi'=>false,'class_master'=>'in','class_transaksi'=>'collapse');
        $this->render('admin/gps/index_view');
	}

	public function get_data_gps(){

		 $search = $this->input->get('search');
		 $sort = $this->input->get('sort');
		 $order = $this->input->get('order');
		 $limit = $this->input->get('limit');
		 $offset = $this->input->get('offset');

		 $datanya = $this->gps_model->get_data_gps($search, $sort, $order, $limit, $offset);
		 echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

    public function create()
    {
		$message = array();

		$nomer_seri = $this->input->post('nomer_seri');
		$id = md5('gps_'.date('Y-m-d H:i:s'));
		$tanggal_pembelian = $this->tanggaldb($this->input->post('tanggal_pembelian'));
		
		if(!empty($nomer_seri) && !empty($tanggal_pembelian)){
			$insert_content = array(
				'id' => $id,
				'nomer_seri' => $nomer_seri,
				'tanggal_pembelian'=> $tanggal_pembelian
			);

			$this->gps_model->insert($insert_content);
			
			$message = array(
			   'success' => true,
			   'info' => 'Berhasil disimpan'
			);
       
		}else{
			$message = array(
			   'success' => false,
			   'info' => 'Gagal disimpan'
			);
		}
		

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

   
    public function delete()
    {

		$datanya = $this->input->post('datanya');
		$data  = array();
		$json = json_decode($datanya);
		
		foreach ($json as $ax) :
			$deleted_pages = $this->gps_model->where(array('id'=>$ax))->delete();
		endforeach;
		
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);
		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function delete_id()
    {

		$datanya = $this->input->post('datanya');
		$deleted_pages = $this->gps_model->where(array('id'=>$datanya))->delete();
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function update()
    {
		
		$nomer_seri = $this->input->post('nomer_seri');
		$id = $this->input->post('id');
		$tanggal_pembelian = $this->tanggaldb($this->input->post('tanggal_pembelian'));
		

		$message = array();

		
		
		if(!empty($id)){
			$update_content = array('nomer_seri' => $nomer_seri, 'tanggal_pembelian' => $tanggal_pembelian);
			$this->gps_model->update($update_content, array('id'=>$id));
			//$this->pendaftaran_model->update($update_content, $no_pendaftaran);
			//$this->pendaftaran_model->where(array('no_pendaftaran'=>$no_pendaftaran))->update($update_content,'no_pendaftaran');
			$message = array(
			   'success' => true,
			   'info' => 'Berhasil disimpan'
			);
       
		}else{
			$message = array(
			   'success' => false,
			   'info' => 'Gagal disimpan'
			);
		}
		

		echo json_encode($message,JSON_PRETTY_PRINT); 


    }



}