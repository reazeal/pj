<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasangan extends Admin_Controller
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

		$this->load->model('pemasangan_model');
		$this->load->model('gps_model');
		$this->load->model('petugas_model');
		$this->load->model('penanggungjawab_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('url','html','form');
	}


	

	public function index()
	{
		$this->data['menu_data'] = array('master'=>false,'transaksi'=>true,'class_master'=>'collapse','class_transaksi'=>'in');
		$this->data['pilihan_pendaftaran'] = $this->pemasangan_model->get_pendaftaran_list();
		$this->data['pilihan_gps'] = $this->pemasangan_model->get_gps_list();
		$this->data['pilihan_petugas'] = $this->petugas_model->get_petugas_list();
        $this->render('admin/pemasangan/index_view');
	}

	public function get_gen_kode(){

			$datanya = $this->pemasangan_model->get_nomor();
			$no_urut = $datanya+1;
			$no_bukti= "TRX".substr("0000",0,4-strlen($no_urut)).$no_urut;
			
			echo $no_bukti;
	}

	public function get_data_pemasangan(){

		 $search = $this->input->get('search');
		 $sort = $this->input->get('sort');
		 $order = $this->input->get('order');
		 $limit = $this->input->get('limit');
		 $offset = $this->input->get('offset');

		 $datanya = $this->pemasangan_model->get_data_pemasangan($search, $sort, $order, $limit, $offset);
		 echo json_encode($datanya,JSON_PRETTY_PRINT);
	}

    public function create()
    {
		$message = array();

		$gps_id = $this->input->post('id');
		$merk_kendaraan = $this->input->post('merk_kendaraan');
		$nama = $this->input->post('nama');
		$no_mesin_kendaraan = $this->input->post('no_mesin_kendaraan');
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$no_rangka_kendaraan = $this->input->post('no_rangka_kendaraan');
		$nopol = $this->input->post('nopol');
		$petugas_id = $this->input->post('petugas_id');
		$data_penanggung_jawab = $this->input->post('data_penanggung_jawab');
		$pemasangan_id = md5('pemasangan_'.date('Y-m-d H:i:s'));
			
		if(!empty($gps_id) && !empty($merk_kendaraan) && !empty($nama) && !empty($no_mesin_kendaraan) && !empty($no_pendaftaran) && !empty($no_rangka_kendaraan)  && !empty($nopol) && !empty($petugas_id)){


			$gps_content = $this->gps_model->where(array('id'=>$gps_id))->get();
			$nomer_seri = $gps_content->nomer_seri;
			$petugas_content = $this->petugas_model->where(array('petugas_id'=>$petugas_id))->get();
			$nama_petugas = $petugas_content->nama;




			$insert_content = array(
				'pemasangan_id' => $pemasangan_id,
				'no_pendaftaran' => $no_pendaftaran,
				'nama' => $nama,
				'gps_id' => $gps_id,
				'nomor_seri' => $nomer_seri,
				'petugas_id' => $petugas_id,
				'nama_petugas' => $nama_petugas,
				'nopol' => $nopol,
				'merk_kendaraan' => $merk_kendaraan,
				'no_rangka_kendaraan' => $no_rangka_kendaraan,
				'no_mesin_kendaraan' => $no_mesin_kendaraan

			);

			$this->pemasangan_model->insert($insert_content);

			$json_tanggung = json_decode($data_penanggung_jawab);

			foreach ($json_tanggung as $ax) :
				$id= $ax->id;
				$ktp= $ax->ktp;
				$nama= $ax->nama;
				$alamat= $ax->alamat;
				$telp= $ax->telp;
				
				if(!empty($ktp) && !empty($nama) && !empty($alamat) && !empty($telp)){
					
					$insert_data = array(
						'penanggung_jawab_id' => $id,
						'pemasangan_id' => $pemasangan_id,
						'ktp' => $ktp,
						'nama' => $nama,
						'telp' => $telp,
						'alamat' => $alamat
					);
					$this->penanggungjawab_model->insert($insert_data);

				}
				
			endforeach;
			
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
			$deleted_pages = $this->pemasangan_model->where(array('petugas_id'=>$ax))->delete();
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
		$deleted_pages = $this->pemasangan_model->where(array('petugas_id'=>$datanya))->delete();
		
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
			$this->pemasangan_model->update($update_content, array('petugas_id'=>$petugas_id));
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