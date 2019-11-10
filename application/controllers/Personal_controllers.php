<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Personal_controllers extends CI_Controller
{
	function get_header(){
	 if (isset($_SESSION['first_name'])) {
		 $data['userData'] = "<a class='nav-link p-0' href='".base_url()."Personal_controllers/personal/".$_SESSION['id']."' >
										 <span class='mx-2'>" .$_SESSION['first_name']. " ".  $_SESSION['last_name'] . "</span>
										 <img src='".$_SESSION['photo_big']."' class='rounded-circle z-depth-0'
											 alt='avatar image' height='50'>
									 </a>";
		 $this->load->view('head_view',$data);
	 }
	 else {
		 $data['userData'] =  '							<a class="nav-link p-0" href="http://oauth.vk.com/authorize?client_id=6996347&amp;redirect_uri=http://localhost/balthack/Registration_controllers/&amp;response_type=code">
										 <span class="mx-2">Войти в личный кабинет</span>
										 <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
											 alt="avatar image" height="50">
									 </a>';
									 $this->load->view('head_view',$data);
	 }
	}
	public function personal($id)
	{
    $id_user = $id;
    $this->load->model('Personal_model');
		$data['personal'] = $this->Personal_model->get_personal_data($id_user);
		$data['achiv'] = $this->Personal_model->for_achivment($id_user);
		$this->get_header();
    $this->load->view('personal_view',$data);
		$this->load->view('footer_view');



   }

   	public function updateinfo()
    {
				$info=$this->input->get('info');
				$id=$this->input->get('id');
      $this->load->model('Personal_model');
      $this->Personal_model->updateinfo($info,$id);
      echo "Успешно";
    }
		public function addvisit()
		{
			$id_section=$this->input->get('id_section');
			$id=$this->input->get('id');
			$this->load->model('Personal_model');
      $this->Personal_model->updatevisit($id_section,$id);
		}



 }
?>
