<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Trainer_model extends CI_Model {

		public function get_trainers()
		{
		  $this->load->database();
		//	print_r($this->db->query("SELECT id_vk FROM users WHERE id_vk='$id_vk'")->result()[0]->id_vk->count());
		  $result=$this->db->query("SELECT teacher.name,teacher.sername,teacher.otch,section.name,club.name AS club_name,teacher.rating FROM teacher,section,club WHERE teacher.id_section=section.id AND section.id_club=club.id ORDER BY teacher.rating DESC")->result();
      return $result;
	}
}
?>
