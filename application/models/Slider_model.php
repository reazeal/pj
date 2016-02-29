<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

	public function all()
	{
		$result = $this->db->get('slider_banner');
		return $result;
	}

	public function find($id)
	{
		$row = $this->db->where('id',$id)->limit(1)->get('slider_banner');
		return $row;
	}

	public function create($data)
	{
		try{
			$this->db->insert('slider_banner', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}

	public function update($id, $data)
	{
		try{
			$this->db->where('id',$id)->limit(1)->update('slider_banner', $data);
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

}