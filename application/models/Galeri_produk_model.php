<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_produk_model extends CI_Model {

	public function all()
	{
		$result = $this->db->get('view_galeri_produk');
		return $result;
	}

	public function find($id)
	{
		$row = $this->db->where('id_galeri',$id)->limit(1)->get('view_galeri_produk');
		return $row;
	}

	public function create($data)
	{
		try{
			$this->db->insert('galeri_produk', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}
	
	public function create_tags($data)
	{
		try{
			$this->db->insert('tags_produk', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}
	public function create_gambar($data)
	{
		try{
			$this->db->insert('gambar_produk', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}

	public function update($id, $data)
	{
		try{
			$this->db->where('id_galeri',$id)->limit(1)->update('galeri_produk', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}

	public function delete($id)
	{
		try {
			$this->db->where('id_galeri',$id)->delete('galeri_produk');
			return true;
		}

		//catch exception
		catch(Exception $e) {
		  echo $e->getMessage();
		}
	}

}