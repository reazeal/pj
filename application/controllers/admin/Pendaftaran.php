<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends Admin_Controller
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

		$this->load->model('pendaftaran_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->data['menu_data'] = array('master'=>true,'transaksi'=>false,'class_master'=>'in','class_transaksi'=>'collapse');
        $this->render('admin/pendaftaran/index_view');
	}

	public function get_gen_no_pendaftaran(){

			$bulan=date('m');
			$tahun=substr(date('Y'), -2);

			if($bulan=='01'){$no_mut2="I";}
		    if($bulan=='02'){$no_mut2="II";}
		    if($bulan=='03'){$no_mut2="III";}
		    if($bulan=='04'){$no_mut2="IV";}
		    if($bulan=='05'){$no_mut2="V";}
		    if($bulan=='06'){$no_mut2="VI";}
		    if($bulan=='07'){$no_mut2="VII";}
		    if($bulan=='08'){$no_mut2="VIII";}
		    if($bulan=='09'){$no_mut2="IX";}
		    if($bulan=='10'){$no_mut2="X";}
		    if($bulan=='11'){$no_mut2="XI";}
		    if($bulan=='12'){$no_mut2="XII";}


			$nomor=$no_mut2."/".$tahun;
			$datanya = $this->pendaftaran_model->get_nomor($nomor);
			$no_urut = $datanya+1;
		    $no_bukti=substr("000000",0,6-strlen($no_urut)).$no_urut."/DAFTAR/".$no_mut2."/".$tahun;
			
			echo $no_bukti;
	}

	public function get_data_pendaftaran(){

		 $search = $this->input->get('search');
		 $sort = $this->input->get('sort');
		 $order = $this->input->get('order');
		 $limit = $this->input->get('limit');
		 $offset = $this->input->get('offset');

		 $datanya = $this->pendaftaran_model->get_data_pendaftaran($search, $sort, $order, $limit, $offset);
		 echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

    public function create()
    {
		$message = array();

		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$no_siup = $this->input->post('no_siup');
		$no_telp = $this->input->post('no_telp');
		$tanggal = $this->tanggaldb($this->input->post('tanggal'));
		$jenis = $this->input->post('jenis');
		$alamat = $this->input->post('alamat');
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		//$no_pendaftaran = md5('pendaftaran_'.date('Y-m-d H:i:s'));
		
		if(!empty($nama) && !empty($tanggal) && !empty($jenis) && !empty($no_siup)){
			$insert_content = array(
				'no_pendaftaran' => $no_pendaftaran,
				'email'=>$email,
				'alamat'=> $alamat,
				'nama'=>$nama, 
				'jenis' => $jenis,
				'no_hp' => $no_hp, 
				'no_siup'=> $no_siup, 
				'no_telp'=> $no_telp,
				'tanggal'=> $tanggal
			);

			$this->pendaftaran_model->insert($insert_content);
			
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
			$deleted_pages = $this->pendaftaran_model->where(array('no_pendaftaran'=>$ax))->delete();
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
		$deleted_pages = $this->pendaftaran_model->where(array('no_pendaftaran'=>$datanya))->delete();
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function update()
    {
		
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$no_siup = $this->input->post('no_siup');
		$no_telp = $this->input->post('no_telp');
		$tanggal = $this->tanggaldb($this->input->post('tanggal'));
		$jenis = $this->input->post('jenis');
		$alamat = $this->input->post('alamat');
		$no_pendaftaran = $this->input->post('no_pendaftaran');

		$message = array();

		
		
		if(!empty($no_pendaftaran)){
			$update_content = array('jenis' => $jenis,'email' => $email, 'nama' => $nama, 'no_hp' => $no_hp, 'no_telp' => $no_telp, 'tanggal' => $tanggal);
			$this->pendaftaran_model->update($update_content, array('no_pendaftaran'=>$no_pendaftaran));
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