<?php
namespace Antefil\Parser\Http\Controllers;

use Illuminate\Http\Request;

class InstallPakController extends Controller
{
	
	public function index()
    {
		$filePath = strstr(__DIR__, $_SERVER['SERVER_NAME'], true) . $_SERVER['SERVER_NAME']. '/config/social.php';
		
		if (!file_exists($filePath)) {
			exit("</br><b>Отсутствует конфигурационный файл /config/social.php или к данному файлу нет доступа.</b>");
		} 
		//Файл есть подключаемся к нему
		$config = include $filePath;
		// Получаем доступ к данным config массива и проверяем. 
		if($config['VK_ID_GROUP']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>VK_ID_GROUP</b>: скрипт использует ID группы ВК для постинга в эту группу <a href='https://vk.com/groups'>Мои группы ВК</a></b>");
		}
		
		if($config['VK_APP_ID']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>VK_APP_ID</b>: скрипт использует ID приложения ВК что бы работать с соц.сетью получить здесь <a href='https://id.vk.com/about/business/go'>Мои группы ВК</a>");
		}
		
		if($config['VK_SERVICE_TOKEN_APP']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>VK_SERVICE_TOKEN_APP</b>: получить сервисный ключ доступа можено здесь <a href='https://id.vk.com/about/business/go'>Сервисный ключ</a>");
		}
	
		if($config['VK_API_TOKEN_USER']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>VK_API_TOKEN_USER</b>: ключ пользователя API необходим для работы с VK. Что бы получить ключ пользователя API пройдите по ссылке <a href=".route('vendor_add_connect_vk').">получить ключ API</a>");
		}
		
		if($config['VK_VERSION_API']!=='5.131'){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>VK_VERSION_API</b>: для корректной работы скрипта необходима версия VK API = 5.131.");
		}
		
		if($config['VK_POST_COUNT']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>VK_POST_COUNT</b>: этот параметр нужен скриату что бы запрашивать количество постов в каждой группе.");
		}
		
		if($config['ERROR_LOG']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>ERROR_LOG</b>: необходимо указать путь к файлу для сохранения отчёта о работе скрипта");
		}
		
		if($config['POINTS_MINIMAL']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>POINTS_MINIMAL</b>: необходимо указать порог проходного балла для поста, те посты которые не наберут данного балла будут проигнорированны");
		}
		
		if($config['POST_IN_DAYS']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>POST_IN_DAYS</b>: необходимо указать количество дней. Посты опубликованные ранее этого срока, будут считаться устаревшими и будут проигнорированы скриптом");
		}
		
		if($config['MAS_MAIN_TEXT']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>MAS_MAIN_TEXT</b>: необходимо указать путь для сохранения текста в файл перед отправкой на проверку.");
		}
		if($config['PROCESSING_TEXE']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>PROCESSING_TEXE</b>: необходимо указать путь к скрипту обработки <b>Python</b>");
		}
		if($config['VEKTOR_DB']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>VEKTOR_DB</b>: необходимо указать путь к векторной базе");
		}
		if($config['RESULT_TEXT_JSON']==''){
			exit("</br>В файле <b>/config/social.php</b> отсутствует параметр <b>RESULT_TEXT_JSON</b>: необходимо указать путь к файлу для обмена результатами по тексту");
		}
		/*
		 *
		 * Старт проверка Python для обработки изображения PROCESSING_IMG
		 *
		 */		
		if($config['PROCESSING_IMG']==''){
			exit("</br><b>Вы не указали путь к скрипту Python processing_img.py для обработки изображения</b>");
		}
		if (!touch($config['PROCESSING_IMG'])) {
			exit("Вы указали ".$config['PROCESSING_IMG'].", однако здесь нельзя создать файл");
		}
		$path_info = pathinfo($config['PROCESSING_IMG']);
		if (empty($path_info['extension']) or strtolower($path_info['extension']) !== 'py') {
			exit("Вы указали неверный файл, нужно указать файл с расширением .py.");
		}
		/* Конец
		 *
		 * Старт проверка файла RESULT_IMG_JSON для сохранения результатов работы Python скрипта при проверке изображения
		 *
		 */		

		if($config['RESULT_IMG_JSON']==''){
			exit("</br><b>Вы не указали путь к файлу json_img.json для обмена результатами работы по изображению</b>");
		}
		if (!touch($config['RESULT_IMG_JSON'])) {
			exit("Вы указали ".$config['RESULT_IMG_JSON'].", однако здесь нельзя создать файл");
		} 
		// Получаем информацию о пути к файлу
		$path_info = pathinfo($config['RESULT_IMG_JSON']);
		if (empty($path_info['extension']) or strtolower($path_info['extension']) !== 'json') {
			exit("Вы указали неверный файл, нужно указать файл с расширением .json.");
		} 
		/* Конец
		 *
		 * 
		 *
		 */		
		echo '</br><b><span style="color:green;">1. Проверка файла /config/social.php завершена замечаний не обнаружено</span></b>';
    }	
	
}
