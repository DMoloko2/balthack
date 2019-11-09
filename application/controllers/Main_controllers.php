<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controllers extends CI_Controller {
	public function index()
	{
		$this->load->model('Club_model');
		$data['clubs'] = $this->Club_model->get_clubs_coordination();
		$this->get_header();
		$this->load->view('main_view');
		$this->load->view('footer_view');
		$this->load->view('map_view', $data);
	}

	function get_header(){
	 if (isset($_SESSION['first_name'])) {
		 $data['userData'] = "<a class='nav-link p-0' >
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

	public function club()
	{
		$this->load->model('Club_model');
		$data['club'] = $this->Club_model->get_clubs();

	}

	public function sections()
	{
		$this->load->model('Section_model');
		$data['section'] = $this->Section_model->get_sections();
		print_r($data);
	}
	
	public function trainers()
	{
		$this->load->model('Trainer_model');
		$data['trainers'] = $this->Trainer_model->get_trainers();
		print_r($data);
	}

	public function trainersclub($id = 0)
	{
		if($id != 0){
		$this->load->model('Trainer_model');
		$data['trainers'] = $this->Trainer_model->get_trainer_from_club($id);
		print_r($data);
		}
		else {
			redirect(base_url());
		}
	}

	public function people($id = 0)
	{
		if ($id != 0) {
			$this->load->model('People_model');
			$data['people'] = $this->People_model->get_people($id);
			print_r($data);
		}
		else{
			echo "Ты лох!";
		}
	}
}
?>
