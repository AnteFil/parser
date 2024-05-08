<?php
//https://oauth.vk.com/authorize?client_id=51896659&display=page&redirect_uri=https://api.vk.com/blank.html&scope=offline,wall,photos,video&response_type=code&v=5.131
//https://oauth.vk.com/access_token?client_id=51896659&client_secret=0S8PR61uMOCvDMUHK42j&redirect_uri=https://api.vk.com/blank.html&code=22a1fd5f1a414a6021

//Implicit Flow для получения ключа доступа пользователя
//https://oauth.vk.com/authorize?client_id=51896659&display=page&redirect_uri=https://api.vk.com/blank.html&scope=offline,wall,photos,video&response_type=token&v=5.131
//System Configurations
namespace Antefil\Parser\Http\Controllers;

use Illuminate\Http\Request;

class ConnectController extends Controller
{
	function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	}
	
	public function add_connect_vk()
    {

		echo '<a href="https://id.vk.com/auth?uuid='.$this->guidv4().'&app_id='.config('social.VK_APP_ID').'&response_type=silent_token&redirect_uri='.$_SERVER['HTTP_X_FORWARDED_PROTO'].'://'.$_SERVER['HTTP_HOST'].'/vendor/connect/respons/vk">Получить ключ</a>';
      
    }	
	public function respons_connect_vk()
    {
		$queryString = parse_url(url()->full(), PHP_URL_QUERY);
		parse_str($queryString, $params);
		$data = json_decode($params['payload'], true);
		$response_vk = json_decode(file_get_contents('https://api.vk.com/method/auth.exchangeSilentAuthToken?v=5.131&token='.$data["token"].'&access_token='.config('social.VK_SERVICE_TOKEN_APP').'&uuid='.$data["uuid"].''), true);
		//Проверим есть ли ответ и если он есть распечатаем ключ
		if (!empty($response_vk['response']['access_token'])) {
				echo 'Скопируйте ключ VK_API_TOKEN_USER и вставте значение в файл /config/social.php : <b>'. $response_vk['response']['access_token'].'</b>';
		} else {
			echo 'Произошли неизвестные науке шоколадки';
		}
		
		
      
    }	
}
