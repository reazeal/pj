<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  ion_auth $ion_auth
 * @property  postal $postal
 * @property  petugas_model $petugas_model
 */
class Petugas extends Admin_Controller
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

		$this->load->model('petugas_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('url','html','form');
	}


	
	public function add_foto()
    {
			$message = array();
			$config =	array(
							'upload_path'	=> './uploads/',
	            			'allowed_types' => 'gif|jpg|png|jpeg',
	            			'max_size'      => 0,
	            			'max_width'     => 0,
	            			'multi'     	=> 'all',
	            			'max_height'    => 0
            			);

            $this->load->library('upload', $config);

			if (!$this->upload->do_upload())
            {
                   
					$message = array(
					   'success' => false,
					   'info' => $this->upload->display_errors()
					);
                    
            }
            else
            {		
					$petugas_id = $this->input->post('petugas_id');
                    $file = $this->upload->data();
					$update_content = array('foto' => $file['file_name']);
					$this->petugas_model->update($update_content, array('petugas_id'=>$petugas_id));
					
					$message = array(
					   'success' => true,
					   'info' => 'Berhasil Disimpan'
					);
            }

			 echo json_encode($message,JSON_PRETTY_PRINT);

	}

	public function index()
	{
		$this->data['menu_data'] = array('master'=>true,'transaksi'=>false,'class_master'=>'in','class_transaksi'=>'collapse');
        $this->render('admin/petugas/index_view');
	}

	public function get_gen_kode(){

			$datanya = $this->petugas_model->get_nomor();
			$no_urut = $datanya+1;
			$no_bukti= "TRX".substr("0000",0,4-strlen($no_urut)).$no_urut;
			
			echo $no_bukti;
	}

	public function get_data_petugas(){

		 $search = $this->input->get('search');
		 $sort = $this->input->get('sort');
		 $order = $this->input->get('order');
		 $limit = $this->input->get('limit');
		 $offset = $this->input->get('offset');

		 $datanya = $this->petugas_model->get_data_petugas($search, $sort, $order, $limit, $offset);
		 echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

    public function create()
    {
		$message = array();

		$alamat = $this->input->post('alamat');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$no_ktp = $this->input->post('no_ktp');
		$petugas_id = md5('petugas_'.date('Y-m-d H:i:s'));
			
		if(!empty($alamat) && !empty($kode) && !empty($nama) && !empty($tgl_lahir) && !empty($no_ktp) ){
			$insert_content = array(
				'petugas_id' => $petugas_id,
				'kode' => $kode,
				'nama' => $nama,
				'no_ktp' => $no_ktp,
				'tgl_lahir' => $this->tanggaldb($tgl_lahir),
				'alamat' => $alamat
			);

			$this->petugas_model->insert($insert_content);
			
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
			$deleted_pages = $this->petugas_model->where(array('petugas_id'=>$ax))->delete();
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
		$deleted_pages = $this->petugas_model->where(array('petugas_id'=>$datanya))->delete();
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function update()
    {
		
		$alamat = $this->input->post('alamat');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$no_ktp = $this->input->post('no_ktp');
		$petugas_id = $this->input->post('petugas_id');
		
		$message = array();

		
		
		if(!empty($alamat) && !empty($kode) && !empty($nama) && !empty($tgl_lahir) && !empty($no_ktp)){
			$update_content = array('alamat' => $alamat, 'kode' => $kode, 'nama' => $nama, 'tgl_lahir' => $this->tanggaldb($tgl_lahir), 'no_ktp' => $no_ktp);
			$this->petugas_model->update($update_content, array('petugas_id'=>$petugas_id));
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