<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */