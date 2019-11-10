<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Section_model extends CI_Model
  {

		public function get_sections($id_club,$date_begin,$date_end)
      {
        $this->load->database();
         $result=$this->db->query("SELECT people.id,people.name,people.sername,people.day,people.mouth,people.year,people.id_vk,people.information FROM people WHERE people.id='$id_user'")->result();
         return $result;
      }

    }
  }

?>
