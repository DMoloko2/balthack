<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Personal_model extends CI_Model
  {

		public function get_personal_data($id_user)
    {
      $this->load->database();
       $result=$this->db->query("SELECT people.id,people.name,people.sername,people.day,people.mouth,people.year,people.id_vk,people.information FROM people WHERE people.id='$id_user'")->result();
       return $result;
    }
    public function updateinfo($info,$id)
    {

        $this->load->database();
        $this->db->query("UPDATE people SET information='$info' WHERE people.id='$id'");
    }


    public function for_achivment($id)
    {
        $this->load->database();
        $result=$this->db->query("SELECT achivment.description FROM achivment WHERE id_people='$id'")->result();
       return $result;
    }

  }
?>
