<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  ion_auth $ion_auth
 * @property  postal $postal
 * @property  layanan_model $layanan_model
 * @property  paket_model $paket_model
 */
class Paket extends Admin_Controller
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

		$this->load->model('paket_model');
		$this->load->model('layanan_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('url');
	}

	public function index()
	{
		  $this->data['pilihan_layanan'] = $this->layanan_model->get_layanan_list();
		  $this->data['menu_data'] = array('master'=>true,'transaksi'=>false,'class_master'=>'in','class_transaksi'=>'collapse');
		  $this->render('admin/paket/index_view');
	}

	public function get_data_paket(){
		 $search = $this->input->get('search');
		 $sort = $this->input->get('sort');
		 $order = $this->input->get('order');
		 $limit = $this->input->get('limit');
		 $offset = $this->input->get('offset');

		 $datanya = $this->paket_model->get_data_paket($search, $sort, $order, $limit, $offset);
		 echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

    public function create()
    {
		$message = array();

		$nama_paket = $this->input->post('nama_paket');
		$harga = $this->input->post('harga');
		$paket_id = md5('paket_'.date('Y-m-d H:i:s'));
			
		if(!empty($nama_paket) && !empty($harga)){

			$insert_content = array(
				'paket_id' => $paket_id,
				'nama_paket' => $nama_paket,
				'harga' => $harga
			);

			$this->paket_model->insert($insert_content);
			
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
			$deleted_pages = $this->paket_model->where(array('paket_id'=>$ax))->delete();
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
		$deleted_pages = $this->paket_model->where(array('paket_id'=>$datanya))->delete();
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function update()
    {
		
		$nama_paket = $this->input->post('nama_paket');
		$harga = $this->input->post('harga');
		$paket_id = $this->input->post('paket_id');
		
		/*$dt_layanan = $this->layanan_model->where(array('layanan_id'=>$layanan_id))->get();
		$nama_layanan = $dt_layanan->nama_layanan;
		$harga = $dt_layanan->harga;*/

		$message = array();

		if(!empty($paket_id)){
			$update_content = array('nama_paket' => $nama_paket, 'harga' => $harga);
			$this->paket_model->update($update_content, array('paket_id'=>$paket_id));
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