<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_common extends CI_Model{

	function get_user_type() {
		return $this->db->get('tbl_user_type');
	}

	function get_user_status() {
		return $this->db->get('tbl_user_status');
	}
	function get_vehicle_brand() {
		return $this->db->get('tbl_vehicle_brand');
	}
	function get_vehicle_model() {
		return $this->db->get('tbl_vehicle_model');
	}
	function get_vehicle_status() {
		return $this->db->get('tbl_vehicle_status');
	}
	function get_vehicle_type() {
		return $this->db->get('tbl_vehicle_type');
	}

	
}