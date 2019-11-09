<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controllers extends CI_Controller {
	public function index()
	{
		$this->load->view('head_view');
		$this->load->view('main_view');
		$this->load->view('footer_view');

	}
	public function club()
	{
		$this->load->model('Club_model');
		$data['club'] = $this->Club_model->get_clubs();
		print_r($data);
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

		public function clubs_coordination()
		{
			$this->load->model('Club_model');
			$data['clubs'] = $this->Club_model->get_clubs_coordination();
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
