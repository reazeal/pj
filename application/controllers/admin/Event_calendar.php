<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event_calendar extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
        if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit this page','error');
            redirect('admin','refresh');
        }
        $this->load->model('slug_model');
        $this->load->model('Event_model');
        $this->load->model('language_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
	}

	public function index($id=NULL)
	{
        $data = array();
        $this->db->select("id_event_cal");
        $jml = $this->db->get('event_calendar');
       
         $config['base_url'] = base_url().'admin/event_calendar/index';
		 $config['total_rows'] = $jml->num_rows();
		 $config['per_page'] = '10';
		 $config['first_page'] = 'Awal';
		 $config['last_page'] = 'Akhir';
		 $config['next_page'] = '<span aria-hidden="true">»</span><span class="sr-only">Next</span>';
		 $config['prev_page'] = '<span aria-hidden="true">«</span><span class="sr-only">Previous</span>';
		 
		 
		 $this->pagination->initialize($config);
		 $this->data['halaman'] = $this->pagination->create_links();
		 $this->data['query']   = $this->Event_model->get_data_semuanya($config['per_page'], $id);
       
        $this->render('admin/event_calendar/index_view');
	}

    public function create()
    {
    	$rules = array(
				'jenis_event' => array('field'=>'jenis_event','label'=>'Jenis Event','rules'=>'required'),
				'tgl_event' => array('field'=>'tgl_event','label'=>'Tgl. Event','rules'=>'required'),
				'nama_event' => array('field'=>'nama_event', 'label'=>'Nama Event', 'rules'=>'required')
			);
		
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			$this->render('admin/event_calendar/create_view');
		}
		else
		{

			
                    $data = array(
                    			'jenis_event'	=> set_value('jenis_event'),
                    			'tgl_event'		=> set_value('tgl_event'),
                    			'nama_event'	=> set_value('nama_event')
                    		);
                    $this->Event_model->create($data);
                    $this->postal->add('Event Berhasil ditambahkan...','success');
					redirect('admin/event_calendar');
            
		}
    }

    public function delete($id)
	{
		$this->Event_model->delete($id);
		$this->postal->add('Event Berhasil dihapus...','success');
		redirect('admin/event_calendar');
	}
	
	public function edit($id){
	
	$rules = array(
				'jenis_event' => array('field'=>'jenis_event','label'=>'Jenis Event','rules'=>'required'),
				'tgl_event' => array('field'=>'tgl_event','label'=>'Tgl. Event','rules'=>'required'),
				'nama_event' => array('field'=>'nama_event', 'label'=>'Nama Event', 'rules'=>'required')
			);
			
		$this->form_validation->set_rules($rules);
		$this->data['query'] = $this->Event_model->find($id)->row();

		if ($this->form_validation->run() == FALSE)
		{
			$this->render('admin/event_calendar/edit_view');
		}
		else
		{
			
			$data['jenis_event']		= set_value('jenis_event');
			$data['tgl_event']			= set_value('tgl_event');
			$data['nama_event']			= set_value('nama_event');
			
			$this->Event_model->update($id,$data);
			$this->postal->add('Event Berhasil diubah...','success');
			redirect('admin/event_calendar');
		}
	}
	
}