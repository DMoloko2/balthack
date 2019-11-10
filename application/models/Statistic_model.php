<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Statistic_model extends CI_Model
  {

		public function get_sections($id_club,$date_begin,$date_end)
      {
        $this->load->database();
         $result=$this->db->query("SELECT club.id,club.name,COUNT(visit.id) FROM visit,club,section WHERE visit.id_section=section.id AND section.id_club=club.id AND visit.data BETWEEN '".$data_begin." 00:00:00' AND '".$data_end." 00:00:00' GROUP BY club.id  ")->result();
         return $result;
      }

    }
  }

?>
