<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_produk_model extends CI_Model {

	public function all()
	{
		$this->db->select('
		a.*, 
		b.language_name, 
		b.language_code, 
		b.slug 
		');
		$this->db->join('languages b ','a.id_languages = b.id');
		$result = $this->db->get('daftar_produk a');
		return $result;
	}

	public function find($id)
	{
		//$row = $this->db->where('id_daftar_produk',$id)->limit(1)->get('daftar_produk');
		$this->db->select('
		a.*, 
		b.language_name, 
		b.language_code, 
		b.slug 
		');
		$this->db->where('a.id_daftar_produk',$id);
		$this->db->join('languages b ','a.id_languages = b.id');
		$row = $this->db->get('daftar_produk a');
		return $row;
	}

	public function create($data)
	{
		try{
			$this->db->insert('daftar_produk', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}

	public function update($id, $data)
	{
		try{
			$this->db->where('id_daftar_produk',$id)->limit(1)->update('daftar_produk', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}

	public function delete($id)
	{
		try {
			$this->db->where('id',$id)->delete('slider_banner');
			return true;
		}

		//catch exception
		catch(Exception $e) {
		  echo $e->getMessage();
		}
	}
	
	public function get_language_list()
	{
		$query = $this->db->get('languages');
        //$bahasanya = array('0'=>'No parent');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $row)
            {
                $bahasanya[$row->id] = $row->language_name." (".$row->slug.")"; 
                
            }
        }
        return $bahasanya;
	}

}