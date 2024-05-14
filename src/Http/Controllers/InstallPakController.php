<?php
namespace Antefil\Parser\Http\Controllers;

use Illuminate\Http\Request;

class InstallPakController extends Controller
{
	
	public function index()
    {
		$filePath = strstr(__DIR__, $_SERVER['SERVER_NAME'], true) . $_SERVER['SERVER_NAME']. '/config/social.php';
		
		if (!file_exists($filePath)) {
			exit("</br><b>Отсутствует конфигурационный файл по пути /config/social.php или к файлу нет доступа.</b>");
		} 
		//Файл есть подключаемся к нему
		$config = include $filePath;
		// Получаем доступ к данным config массива и проверяем. 
		if($config['VK_ID_GROUP']=='0'){
			exit("</br><b>Не указан ID группы ВК для постинга <a href='https://vk.com/groups'>Мои группы ВК</a></b>");
		}
		
		if($config['VK_APP_ID']=='0'){
			exit("</br><b>Не указан ID приложения ВК через которое можно работать с соц.сетью <a href='https://id.vk.com/about/business/go'>Мои группы ВК</a></b>");
		}
		
		if($config['VK_SERVICE_TOKEN_APP']=='0'){
			exit("</br><b>Не указан Сервисный ключ доступа <a href='https://id.vk.com/about/business/go'>Сервисный ключ</a></b>");
		}
	
		if($config['VK_API_TOKEN_USER']=='0'){
			exit("</br><b>Не указан ключ пользователя API. Что бы получить его пройдите по ссылке <a href=".route('vendor_add_connect_vk').">получить ключ API</a></b>");
		}
		
		if($config['VK_VERSION_API']!=='5.131'){
			exit("</br><b>Вы изменили версию VK API, но скрипту необходима версия 5.131 для корректной работы. В противном случае скрипт может функционировать некорректно.</b>");
		}
		
		if($config['VK_POST_COUNT']==''){
			exit("</br><b>Вы забыли указать какое количество постов запрашивать в каждой группе </b>");
		}
		
		if($config['ERROR_LOG']==''){
			exit("</br><b>Вы забыли указать путь для сохранения отчёта о работе скрипта</b>");
		}
		
		if($config['POINTS_MINIMAL']==''){
			exit("</br><b>Вы забыли указать проходной балл для поста</b>");
		}
		
		if($config['POST_IN_DAYS']==''){
			exit("</br><b>Вы забыли указать количество дней, посты опубликованные ранее этого срока, будут считаться устаревшими и будут проигнорированы ботом</b>");
		}
		
		if($config['MAS_MAIN_TEXT']==''){
			exit("</br><b>Вы не указали путь для сохранения текста в файл перед отправкой на проверку</b>");
		}
		if($config['PROCESSING_TEXE']==''){
			exit("</br><b>Вы не указали путь к скрипту обработки Python</b>");
		}
		if($config['VEKTOR_DB']==''){
			exit("</br><b>Вы не указали путь к векторной базе</b>");
		}
		if($config['RESULT_TEXT_JSON']==''){
			exit("</br><b>Вы не указали путь к файлу json_text.json для обмена результатами по тексту</b>");
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
