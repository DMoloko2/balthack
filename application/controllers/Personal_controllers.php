<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Personal_controllers extends CI_Controller
{
	public function personal($id)
	{
    $id_user = $id;
    $this->load->model('Personal_model');
		$data['personal'] = $this->Personal_model->get_personal_data($id_user);
		$this->load->view('head_view');
    $this->load->view('personal_view',$data);
		$this->load->view('footer_view');
   }

   	public function updateinfo()
    {
				$info=$this->input->get('info');
      $this->load->model('Personal_model');
      $this->Personal_model->updateinfo($info);
      echo "Успешно";
    }
 }
?>
