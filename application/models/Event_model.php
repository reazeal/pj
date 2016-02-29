<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    public function __construct()
	 {
	 parent::__construct();
	 }
	 
	
	 public function get_data_semuanya($num, $offset)
	 {
	 	
		$this->db->order_by('id_event_cal', 'DESC');
		$data = $this->db->get('event_calendar', $num, $offset);
					
		 return $data->result();
	 } 
	 
	  public function create($data)
	{
		try{
			$this->db->insert('event_calendar', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}
	
	
	public function delete($id)
	{
		try {
			$this->db->where('id_event_cal',$id)->delete('event_calendar');
			return true;
		}

		//catch exception
		catch(Exception $e) {
		  echo $e->getMessage();
		}
	}
	
	public function find($id)
	{
		$row = $this->db->where('id_event_cal',$id)->limit(1)->get('event_calendar');
		return $row;
	}
	
	public function update($id, $data)
	{
		try{
			$this->db->where('id_event_cal',$id)->limit(1)->update('event_calendar', $data);
			return true;
		}catch(Exception $e){
			return $e;
		}
	}
	 
	 
	 
		 
}