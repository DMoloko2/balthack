<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Club_model extends CI_Model {

		public function get_clubs()
		{
		  $this->load->database();
		//	print_r($this->db->query("SELECT id_vk FROM users WHERE id_vk='$id_vk'")->result()[0]->id_vk->count());
		  $result=$this->db->query("SELECT name,address,rating FROM club ORDER BY rating DESC ")->result();
      return $result;

		  }




	}
?>
