<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class People_model extends CI_Model {

		public function get_people($id)
  {
    $this->load->database();
     $result=$this->db->query("SELECT people.id,people.name,people.sername,people.otch,section.name AS section_name,club.name AS club_name,whowhere.rating FROM people,section,club,whowhere WHERE whowhere.id_people=people.id AND whowhere.id_section='$id' ORDER BY whowhere.rating DESC")->result();
     return $result;
  }
}
?>
