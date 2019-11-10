<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Statistic_model extends CI_Model
  {

		public function get_sections($id_club,$date_begin,$date_end)
      {
        $this->load->database();
         $result=$this->db->query("SELECT COUNT(*) FROM visit,club WHERE club.id='$id_club' AND visit.data BETWEEN '".$date_begin." 00:00:00' AND '".$date_end" 23:59:00'  ")->result();
         return $result;
      }

    }
  }

?>
