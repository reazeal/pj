<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  ion_auth $ion_auth
 * @property  postal $postal
 * @property  alat_model $alat_model
 */
class Alat extends Admin_Controller
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

		$this->load->model('alat_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('url');
	}

	public function index()
	{
		$this->data['menu_data'] = array('master'=>true,'transaksi'=>false,'class_master'=>'in','class_transaksi'=>'collapse');
        $this->render('admin/alat/index_view');
	}

	public function get_data_alat(){

		 $search = $this->input->get('search');
		 $sort = $this->input->get('sort');
		 $order = $this->input->get('order');
		 $limit = $this->input->get('limit');
		 $offset = $this->input->get('offset');

		 $datanya = $this->alat_model->get_data_alat($search, $sort, $order, $limit, $offset);
		 echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

    public function create()
    {
		$message = array();

		$no_seri = $this->input->post('no_seri');
		$merk = $this->input->post('merk');
		$tipe = $this->input->post('tipe');
		$tgl_pembelian = $this->input->post('tgl_pembelian');
		$harga = $this->input->post('harga');
		$alat_id = md5('alat_'.date('Y-m-d H:i:s'));
			
		if(!empty($no_seri) && !empty($merk) && !empty($tipe) && !empty($tgl_pembelian) && !empty($harga) ){
			$insert_content = array(
				'alat_id' => $alat_id,
				'no_seri' => $no_seri,
				'merk' => $merk,
				'tipe' => $tipe,
				'tgl_pembelian' => $this->tanggaldb($tgl_pembelian),
				'harga' => $harga
			);

			$this->alat_model->insert($insert_content);
			
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
			$deleted_pages = $this->alat_model->where(array('alat_id'=>$ax))->delete();
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
		$deleted_pages = $this->alat_model->where(array('alat_id'=>$datanya))->delete();
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function update()
    {
		
		$no_seri = $this->input->post('no_seri');
		$merk = $this->input->post('merk');
		$tipe = $this->input->post('tipe');
		$tgl_pembelian = $this->input->post('tgl_pembelian');
		$harga = $this->input->post('harga');
		$alat_id = $this->input->post('alat_id');
		
		$message = array();

		
		
		if(!empty($no_seri) && !empty($merk) && !empty($tipe) && !empty($tgl_pembelian) && !empty($harga)){
			$update_content = array('no_seri' => $no_seri, 'merk' => $merk, 'tipe' => $tipe, 'tgl_pembelian' => $this->tanggaldb($tgl_pembelian), 'harga' => $harga);
			$this->alat_model->update($update_content, array('alat_id'=>$alat_id));
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