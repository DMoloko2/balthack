<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controllers extends CI_Controller {
	public function index()
	{
    if($this->isadmin()){
      //показать админ панель
    }
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
