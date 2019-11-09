<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main_model extends CI_Model {

		public function set_name($id_vk,$name,$sername,$date)
		{
		  $this->load->database();

		$year=$date[6]*1000+$date[7]*100+$date[8]*10+$date[9];
		$mouth=$date[3]*10+$date[4];
		$day=$date[0]*10+$date[1];
		//	print_r($this->db->query("SELECT id_vk FROM users WHERE id_vk='$id_vk'")->result()[0]->id_vk->count());
		   if(empty(!@$this->db->query("SELECT *FROM people WHERE id_vk='$id_vk'")->result()[0]->id_vk))
		      {
		        $this->db->query("UPDATE people SET name='$name',sername='$sername',year='$year',mouth='$mouth',day='$day' WHERE id_vk='$id_vk'");
						$result=$this->db->query("SELECT people.id from people WHERE id_vk='$id_vk'")->result();
						return $result;
		      }
		      else
		      {
		        $this->db->query("INSERT INTO people(name,sername,id_vk,year,mouth,day) VALUES ('$name','$sername','$id_vk','$year','$mouth','$day')");
						$result=$this->db->query("SELECT people.id from people WHERE id_vk='$id_vk'")->result();
						return $result;
		      }

		  }
	}
?>
