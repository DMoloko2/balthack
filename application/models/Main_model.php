<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main_model extends CI_Model {

		public function set_name($id_vk,$name,$sername,$date)
		{
		  $this->load->database();
		//	print_r($this->db->query("SELECT id_vk FROM users WHERE id_vk='$id_vk'")->result()[0]->id_vk->count());
		   if(empty(!@$this->db->query("SELECT *FROM people WHERE id_vk='$id_vk'")->result()[0]->id_vk))
		      {
		        $this->db->query("UPDATE people SET name='$name',sername='$sername',date='$date' WHERE id_vk='$id_vk'");
		      }
		      else
		      {
		        $this->db->query("INSERT INTO people(name,sername,id_vk,date) VALUES ('$name','$sername','$id_vk','$date')");
		      }
		  }
	}
?>
