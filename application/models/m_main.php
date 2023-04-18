<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_main extends CI_Model{

	function get_user($q) {
		return $this->db->get_where('tbl_user',$q);
	}
	function get_users() {
		return $this->db->get('tbl_user');
	}
	function get_user_details() {
		return $this->db->get('tbl_user_details');
	}
	function get_drivers() {
		return $this->db->get('tbl_driver_details');
	}
	function get_drivers_vehicle() {
		return $this->db->get('tbl_driver_vehicle');
	}
	function user_deatils_insert($data) {
		return $this->db->insert('tbl_user_details',$data);
	}
	function driver_deatils_insert($data) {
		return $this->db->insert('tbl_driver_details',$data);
	}
	function driver_vehicle_deatils_insert($data) {
		return $this->db->insert('tbl_driver_vehicle',$data);
	}
	function user_registeration_insert($data) {
		return $this->db->insert('tbl_user',$data);
	}
	//user status update by id
	function user_status_update($data,$id) {
			   $this->db->where("id", $id);
		return $this->db->update('tbl_user',$data);
	}
	//driver vehicle status update by id
	function driver_vehicle_status_update($data,$id) {
			   $this->db->where("id", $id);
		return $this->db->update('tbl_driver_vehicle',$data);
	}

	//user status update by id
	function user_status_update_by_userid($data,$id) {
			   $this->db->where("user_id", $id);
		return $this->db->update('tbl_user',$data);
	}
	//driver vehicle status update by id
	function driver_vehicle_status_update_by_driverid($data,$id) {
			   $this->db->where("driver_id", $id);
		return $this->db->update('tbl_driver_vehicle',$data);
	}

//user data update
	function user_data_update($data,$id) {
		 $this->db->where("id", $id);
		return $this->db->update('tbl_user',$data);
	}
//user details data update
	function user_deatils_update($data,$id) {
		$this->db->where("id", $id);
		return $this->db->update('tbl_user_details',$data);
	}
//driver details update
	function driver_deatils_update($data,$id) {
		$this->db->where("id", $id);
		return $this->db->update('tbl_driver_details',$data);
	}
//driver vehicle update 
	function driver_vehicle_deatils_update($data,$id) {
		$this->db->where("id", $id);
		return $this->db->update('tbl_driver_vehicle',$data);
	}

	
}