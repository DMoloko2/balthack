<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registration_controllers extends CI_Controller {
	public function index()
	{
    $client_id = '6996347'; // ID приложения
    $client_secret = '3NQq6AJdlvBRGuDmuCgp'; // Защищённый ключ
    $redirect_uri = 'http://localhost/balthack/Registration_controllers';


    $url = 'http://oauth.vk.com/authorize';

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code'
    );
    print_r($params);
    echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
    $code = $this->input->get('code');
    if (isset($code)) {
        $params = array(
            'client_id' => $params['client_id'],
            'client_secret' => $client_secret,
            'code' => $this->input->get('code'),
            'redirect_uri' => $redirect_uri
        );
        $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
        if (isset($token['access_token'])) {
    $params2 = array(
        'uids'         => $token['user_id'],
        'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
        'v' => '5.103',
        'access_token' => $token['access_token']
    );
}
$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params2))), true);
  $this->load->model('Main_model');
  $this->Main_model->set_name($userInfo['response'][0]['id'],$userInfo['response'][0]['first_name'],$userInfo['response'][0]['last_name'],$userInfo['response'][0]['bdate']);
    }
	}
}