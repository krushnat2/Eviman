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

	
}