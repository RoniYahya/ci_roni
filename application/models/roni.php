<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Roni extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function roni_one($table,$filter,$selector="*"){
		$this->db->select($selector);
		$this->db->from($table);
		$this->db->where($filter);
		$query = $this->db->get();
		if($query->num_rows == 0){
			return FALSE;
		} else {
			return $query->result();
		}
	}
}