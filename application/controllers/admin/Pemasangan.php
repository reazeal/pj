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
		$this->load->model('tracking_model');
		$this->load->model('gps_model');
		$this->load->model('alat_model');
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
		$this->data['pilihan_alat'] = $this->alat_model->get_alat_list();
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

	public function get_jawaban(){
			$pemasangan_id = $this->input->post('id');
			$datanya = $this->penanggungjawab_model->get_jawaban($pemasangan_id);
			echo json_encode($datanya,JSON_PRETTY_PRINT);
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
		$alat_id = $this->input->post('alat_id');
		$pemasangan_id = md5('pemasangan_'.date('Y-m-d H:i:s'));
			
		if(!empty($gps_id) && !empty($merk_kendaraan) && !empty($nama) && !empty($no_mesin_kendaraan) && !empty($no_pendaftaran) && !empty($no_rangka_kendaraan)  && !empty($nopol) && !empty($petugas_id) && !empty($alat_id)){


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

			$tracking_id = md5('tracking_'.date('Y-m-d H:i:s'));
			$alat_content = $this->alat_model->where(array('alat_id'=>$alat_id))->get();
			$noseri_alat = $alat_content->no_seri;
		
			$insert_content = array(
				'pemasangan_id' => $pemasangan_id,
				'alat_id' => $alat_id,
				'tracking_id' => $tracking_id,
				'noseri_alat' => $noseri_alat,
				'nomor_seri_gps' => $nomer_seri,
				'no_pendaftaran' => $no_pendaftaran,
				'nama_konsumen' => $nama,
				'nopol' => $nopol

			);

			$this->tracking_model->insert($insert_content);


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
			$deleted_pages = $this->pemasangan_model->where(array('pemasangan_id'=>$ax))->delete();
			$deleted_pages2 = $this->penanggungjawab_model->where(array('pemasangan_id'=>$ax))->delete();
			$deleted_pages3 = $this->tracking_model->where(array('pemasangan_id'=>$ax))->delete();
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
		$deleted_pages = $this->pemasangan_model->where(array('pemasangan_id'=>$datanya))->delete();
		$deleted_pages2 = $this->penanggungjawab_model->where(array('pemasangan_id'=>$datanya))->delete();
		$deleted_pages3 = $this->tracking_model->where(array('pemasangan_id'=>$datanya))->delete();
		
		$message = array(
			   'success' => true,
			   'info' => 'Berhasil dihapus'
			);

		echo json_encode($message,JSON_PRETTY_PRINT); 
    }

	public function update()
    {
		
		$gps_id = $this->input->post('id');
		$merk_kendaraan = $this->input->post('merk_kendaraan');
		$nama = $this->input->post('nama');
		$no_mesin_kendaraan = $this->input->post('no_mesin_kendaraan');
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$no_rangka_kendaraan = $this->input->post('no_rangka_kendaraan');
		$nopol = $this->input->post('nopol');
		$petugas_id = $this->input->post('petugas_id');
		$data_penanggung_jawab = $this->input->post('data_penanggung_jawab');
		$pemasangan_id = $this->input->post('pemasangan_id');
		
		$message = array();

		
		
		if(!empty($gps_id) && !empty($merk_kendaraan) && !empty($nama) && !empty($no_mesin_kendaraan) && !empty($no_pendaftaran) && !empty($no_rangka_kendaraan)  && !empty($nopol) && !empty($petugas_id) && !empty($pemasangan_id))
			{
			
			$gps_content = $this->gps_model->where(array('id'=>$gps_id))->get();
			$nomer_seri = $gps_content->nomer_seri;
			$petugas_content = $this->petugas_model->where(array('petugas_id'=>$petugas_id))->get();
			$nama_petugas = $petugas_content->nama;


			$update_content = array(
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
			$this->pemasangan_model->update($update_content, array('pemasangan_id'=>$pemasangan_id));

			$json_tanggung = json_decode($data_penanggung_jawab);

			foreach ($json_tanggung as $ax) :
				$id= $ax->id;
				$ktp= $ax->ktp;
				$nama= $ax->nama;
				$alamat= $ax->alamat;
				$telp= $ax->telp;
				
				if(!empty($ktp) && !empty($nama) && !empty($alamat) && !empty($telp)){
					
					$update_content = array(
						'ktp' => $ktp,
						'nama' => $nama,
						'telp' => $telp,
						'alamat' => $alamat
					);

					$this->penanggungjawab_model->update($update_content, array('penanggung_jawab_id'=>$id,'pemasangan_id'=> $pemasangan_id));
					
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



}