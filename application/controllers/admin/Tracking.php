<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends Admin_Controller
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

		$this->load->model('tracking_model');
		$this->load->model('outbox_model');
		$this->load->model('pemasangan_model');
		$this->load->model('alat_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('url','html','form');
	}


	

	public function index()
	{
		$this->data['menu_data'] = array('master'=>false,'transaksi'=>true,'class_master'=>'collapse','class_transaksi'=>'in');
		$this->data['pilihan_alat'] = $this->alat_model->get_alat_list();
		$this->data['pilihan_pemasangan'] = $this->pemasangan_model->get_pemasangan_list();
		$this->render('admin/tracking/index_view');
	}

	public function get_gen_kode(){

			$datanya = $this->pemasangan_model->get_nomor();
			$no_urut = $datanya+1;
			$no_bukti= "TRX".substr("0000",0,4-strlen($no_urut)).$no_urut;
			
			echo $no_bukti;
	}

	public function rangetime()
	{
		//$query = "INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohp', '$modem', '$pesan', 'Gammu 1.28.90')";
			
			$message = array();

			$xxx_content = $this->outbox_model->get_all();
			//echo count($xxx_content);

			if(count($xxx_content)<6){

				$insert_content = array(
					'DestinationNumber' => '+6285607733981',
					'TextDecoded' => '0000,A00',
					'SenderID' => 'ModemWirelessE',
					'CreatorID'=> 'Gammu 1.28.90'
				);
				$this->outbox_model->insert($insert_content);
			
			}


			
			$message = array(
			   'success' => true,
			   'info' => 'Berhasil disimpan'
			);

			echo json_encode($message,JSON_PRETTY_PRINT); 
	}

	public function getLatLongAwal(){
			$message = array();
			$tracking_id = $this->input->post('tracking_id');
			$track_content = $this->tracking_model->where(array('tracking_id'=>$tracking_id))->get();
			$posisi_lat = $track_content->posisi_lat;
			$posisi_long = $track_content->posisi_long;

			if($track_content){
				$message = array(
				   'success' => true,
				   'latitude' => $posisi_lat,
				   'longitude' => $posisi_long
				);
			}else{

				$message = array(
				   'success' => false,
				   'latitude' => 0,
				   'longitude' => 0
				);
			}
			echo json_encode($message,JSON_PRETTY_PRINT);
	}


	public function getLatLong(){
			$message = array();
			$tracking_id = $this->input->post('tracking_id');
			$track_content = $this->tracking_model->where(array('tracking_id'=>$tracking_id))->get();
			$posisi_lat = $track_content->posisi_lat;
			$posisi_long = $track_content->posisi_long;

			if($track_content){
				$message = array(
				   'success' => true,
				   'latitude' => $posisi_lat,
				   'longitude' => $posisi_long
				);
			}else{

				$message = array(
				   'success' => false,
				   'latitude' => 0,
				   'longitude' => 0
				);
			}
			echo json_encode($message,JSON_PRETTY_PRINT);
	}

	public function get_jawaban(){
			$pemasangan_id = $this->input->post('id');
			$datanya = $this->penanggungjawab_model->get_jawaban($pemasangan_id);
			echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

	public function get_data_tracking(){

		 $search = $this->input->get('search');
		 $sort = $this->input->get('sort');
		 $order = $this->input->get('order');
		 $limit = $this->input->get('limit');
		 $offset = $this->input->get('offset');

		 $datanya = $this->tracking_model->get_data_tracking($search, $sort, $order, $limit, $offset);
		 echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

    public function create()
    {
		$message = array();

		$pemasangan_id = $this->input->post('pemasangan_id');
		$alat_id = $this->input->post('alat_id');
		$tracking_id = md5('tracking_'.date('Y-m-d H:i:s'));
			
		if(!empty($pemasangan_id) && !empty($alat_id)){


			$alat_content = $this->alat_model->where(array('alat_id'=>$alat_id))->get();
			$noseri_alat = $alat_content->no_seri;
			$pemasangan_content = $this->pemasangan_model->where(array('pemasangan_id'=>$pemasangan_id))->get();
			$nomor_seri_gps = $pemasangan_content->nomor_seri;
			$nopol = $pemasangan_content->nopol;
			$no_pendaftaran = $pemasangan_content->no_pendaftaran;
			$nama_konsumen = $pemasangan_content->nama;




			$insert_content = array(
				'pemasangan_id' => $pemasangan_id,
				'alat_id' => $alat_id,
				'tracking_id' => $tracking_id,
				'noseri_alat' => $noseri_alat,
				'nomor_seri_gps' => $nomor_seri_gps,
				'no_pendaftaran' => $no_pendaftaran,
				'nama_konsumen' => $nama_konsumen,
				'nopol' => $nopol

			);

			$this->tracking_model->insert($insert_content);

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
			$deleted_pages = $this->tracking_model->where(array('tracking_id'=>$ax))->delete();
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
		$deleted_pages = $this->tracking_model->where(array('tracking_id'=>$datanya))->delete();
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function update()
    {
		
		$pemasangan_id = $this->input->post('pemasangan_id');
		$alat_id = $this->input->post('alat_id');
		$tracking_id = $this->input->post('tracking_id');
		
		$message = array();

		
		
		if(!empty($pemasangan_id) && !empty($alat_id))
			{
			
			$alat_content = $this->alat_model->where(array('alat_id'=>$alat_id))->get();
			$noseri_alat = $alat_content->no_seri;
			$pemasangan_content = $this->pemasangan_model->where(array('pemasangan_id'=>$pemasangan_id))->get();
			$nomor_seri_gps = $pemasangan_content->nomor_seri;
			$nopol = $pemasangan_content->nopol;
			$no_pendaftaran = $pemasangan_content->no_pendaftaran;
			$nama_konsumen = $pemasangan_content->nama;


			$update_content = array(
				'pemasangan_id' => $pemasangan_id,
				'alat_id' => $alat_id,
				'noseri_alat' => $noseri_alat,
				'nomor_seri_gps' => $nomor_seri_gps,
				'no_pendaftaran' => $no_pendaftaran,
				'nama_konsumen' => $nama_konsumen,
				'nopol' => $nopol

			);
			$this->tracking_model->update($update_content, array('tracking_id'=>$tracking_id));

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