<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controllers extends CI_Controller {
	public function index()
	{
    if($this->isadmin()){
      //показать админ панель
    }
	}
  public function countvisitclub($data_begin='2018-03-08',$data_end = '2019-08-20')
  {
    $this->load->model('Statistic_model');
    $result = $this->Statistic_model->get_sections($data_begin,$data_end);
    print_r($result);
    $i = 0;
    foreach ($result as  $value) {
      $data['name'][$i] = $value->name;
      $data['count'][$i] = $value->kol;
      $i++;
    }
    $data['name']= json_encode($data['name']);
    print_r($data);

  }
  private function isadmin()
  {
    if ($_SESSION['admin_flag'] == 0) {
    $this->load->view('errors/html/index.html');
    }
    else{
      return true;
    }
  }

}
?>
