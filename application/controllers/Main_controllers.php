<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controllers extends CI_Controller {
	public function index()
	{
		$this->load->view('main_view');

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
}
?>
