<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Igor_model extends CI_Model {

		public function Get_club_info1($id_club)
    {
      $this->load->database();
      $result=$this->db->query("SELECT name,id FROM club")->result();
      return $result;
    }

    public function Get_club_info2($id_club)
    {
      $this->load->database();
      $result=$this->db->query("SELECT teacher.name,teacher.sername,club.name,section.name,club.address,teacher.rating FROM club,teacher,section WHERE teacher.id_section=section.id AND section.id_club=club.id AND club.id='$id_club'")->result();
      return $result;
    }
  }
  ?>