<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  ion_auth  $ion_auth
 * @property  postal $postal
 * @property  layanan_model $layanan_model
 */
class Layanan extends Admin_Controller
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

		$this->load->model('layanan_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('url');
	}

	public function index()
	{
		$this->data['menu_data'] = array('master'=>true,'transaksi'=>false,'class_master'=>'in','class_transaksi'=>'collapse');
        $this->render('admin/layanan/index_view');
	}

	public function get_data_layanan(){

		 $search = $this->input->get('search');
		 $sort = $this->input->get('sort');
		 $order = $this->input->get('order');
		 $limit = $this->input->get('limit');
		 $offset = $this->input->get('offset');

		 $datanya = $this->layanan_model->get_data_layanan($search, $sort, $order, $limit, $offset);
		 echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

    public function create()
    {
		$message = array();

		$nama_layanan = $this->input->post('nama_layanan');
		$harga = $this->input->post('harga');
		$layanan_id = md5('layanan_'.date('Y-m-d H:i:s'));
			
		if(!empty($nama_layanan)){
			$insert_content = array(
				'layanan_id' => $layanan_id,
				'harga' => $harga,
				'nama_layanan' => $nama_layanan
			);

			$this->layanan_model->insert($insert_content);
			
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
			$deleted_pages = $this->layanan_model->where(array('layanan_id'=>$ax))->delete();
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
		$deleted_pages = $this->layanan_model->where(array('layanan_id'=>$datanya))->delete();
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function update()
    {
		
		$nama_layanan = $this->input->post('nama_layanan');
		$harga = $this->input->post('harga');
		$layanan_id = $this->input->post('layanan_id');
		
		$message = array();

		
		
		if(!empty($layanan_id)){
			$update_content = array('nama_layanan' => $nama_layanan, 'harga' => $harga);
			$this->layanan_model->update($update_content, array('layanan_id'=>$layanan_id));
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