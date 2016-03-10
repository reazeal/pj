<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends Admin_Controller
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

		$this->load->model('outbox_model');
		$this->load->model('truckgps_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('url');
	}

	public function index()
	{
		$this->data['menu_data'] = array('master'=>true,'transaksi'=>false,'class_master'=>'in','class_transaksi'=>'collapse');
		$this->data['truck_data'] = $this->truckgps_model->get_truck_list();
        $this->render('admin/maps/index_view');
	}


	public function getLat()
	{
		$id = $this->input->post('id');
		$data_truck = $this->truckgps_model->where(array('id'=>$id))->get();
		echo $data_truck->lat;

	}

	public function getLon()
	{
		$id = $this->input->post('id');
		$data_truck = $this->truckgps_model->where(array('id'=>$id))->get();
		echo $data_truck->lon;
	}

	public function getStatus()
	{
		$id = $this->input->post('id');
		$data_truck = $this->truckgps_model->where(array('id'=>$id))->get();
		echo $data_truck->status;
	}

	public function getFoto()
	{
		$id = $this->input->post('id');
		$data_truck = $this->truckgps_model->where(array('id'=>$id))->get();
		echo $data_truck->foto;
	}


	
	public function rangetime()
	{

			$message = array();
			$insert_content = array(
				'DestinationNumber' => '+6285607733981',
				'TextDecoded' => '0000,A00',
				'CreatorID'=> 'Gammu'
			);
			$this->outbox_model->insert($insert_content);
			$message = array(
			   'success' => true,
			   'info' => 'Berhasil disimpan'
			);

			echo json_encode($message,JSON_PRETTY_PRINT); 


		/*$begin = new DateTime('2012-09-20 01:59:00');
		$end = new DateTime('2012-09-21 02:00:00');

		$interval =  new DateInterval('PT600S');
		$period = new DatePeriod($begin, $interval, $end, DatePeriod::EXCLUDE_START_DATE);

		foreach ( $period as $dt ){
			//echo $dt->format( "Y-m-d H:i:s \n" );
			// echo $dt;
			// INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('+6285607733981', '0000,A00', 'Gammu');
			$insert_content = array(
				'DestinationNumber' => '+6285607733981',
				'TextDecoded' => '0000,A00',
				'CreatorID'=> 'Gammu'
			);
			$this->outbox_model->insert($insert_content);
		}*/
		  

	}



}