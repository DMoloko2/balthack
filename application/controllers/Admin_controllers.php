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
  }
  function change_input($month_on) {
   switch ($month_on) {
    case '01':
     $month_on = "Январь";
     break;
    case '02':
     $month_on = "Февраль";
     break;
    case '03':
     $month_on = "Март";
     break;
    case '04':
     $month_on = "Апрель";
     break;
    case '05':
     $month_on = "Май";
     break;
    case '06':
     $month_on = "Июнь";
     break;
    case '07':
     $month_on = "Июль";
     break;
    case '08':
     $month_on = "Август";
     break;
    case '09':
     $month_on = "Сентябрь";
     break;
    case 10:
     $month_on = "Октябрь";
     break;
    case 11:
     $month_on = "Ноябрь";
     break;
    case 12:
     $month_on = "Декабрь";
     break;
   }
   return $month_on;
  }
  public function getcountvisitclub($id_club,$data_begin='2018-03-08',$data_end ='2019-08-20')
  {

    $this->load->model('Statistic_model');
    list($on_y,$on_m,$on_d) = explode("-",$data_begin);
    list($off_y,$off_m,$off_d) = explode("-",$data_end);
    $g = 0;
    for ($i=$on_y; $i <=$off_y ; $i++) {
      if($i==$on_y)
      {
        $l=$on_m;
      }
      else
      {
      $l=1;
      }
      if($i==$off_y)
      {
        $k=$off_m;
      }
      else {

          $k=12;
        }

      for ($j=$l; $j <=$k ; $j++) {

        $result = $this->Statistic_model->get_statistic($id_club,$j,$i);
         $data['count'][$g] = $result[0]->kol;

        $f = $this->change_input($j);
        $data['date'][$g] = $f. " ". $i;
        $g++;
      }
    }
    print_r($data);
  }
  public function getcentername($id)
  {
    $this->load->model('Igor_model');
    $data['name_center'] = $this->Igor_model->get_club_info1($id);
    $data['trainers'] = $this->Igor_model->get_club_info2($id);
    $data['section'] = $this->Igor_model->get_club_info3($id);
    print_r($data);
  }
  // private function isadmin()
  // {
  //   if ($_SESSION['admin_flag'] == 0) {
  //   $this->load->view('errors/html/index.html');
  //   }
  //   else{
  //     return true;
  //   }
  // }

}
?>
