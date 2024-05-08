<?
return [
	//Группа для постинга
	'VK_ID_GROUP' => '222213680',
	//ID приложения зарегистрированного в ВК
    'VK_APP_ID' => '51918224',
	//Сервисный ключ доступа смотреть в профиле приложения ВК
	'VK_SERVICE_TOKEN_APP' => 'fc3d28c1fc3d28c1fc3d28c1deff251d51ffc3dfc3d28c19a0ab7c3f018d2322bce66cf',
	//API ключ пользователя
	'VK_API_TOKEN_USER' => 'vk1.a.dpklDzhxmhQq6-1a_jyNhY9_8oEkbLqQe4uETRlJchgPqRVIVHhYSCR6FFIdoqIjh_tBw6jM7qgxurQ1il_dg5ItVkdqxnFjvldX5uMLpPWrLkJWLa2YOucThoaKncQerIZhYQZhYkW4QIf-9HZtEGUgARY7ZtcAOCqLHrVdc07s-cWyidVJTbcLEoc8XIj0MOuHFKfYxxlhmKEe0EABzw',
	//Иcпользовать при работе бота версию API
	'VK_VERSION_API' => '5.131',
	//Запросить количество постов из группы
	'VK_POST_COUNT' => 20,
	//Путь для сохранения логов работы бота
	'ERROR_LOG' => storage_path('app/public/log/'.date('d-m-Y').'_error_log.txt'),
	//Минимальная, возможная оценка для поста (проходной порог), посты с оценкой ниже будут проигнорированы ботом.
	'POINTS_MINIMAL' => 1.3, 
	//Использовать только посты из группы, опубликованные в течение последних POST_IN_DAYS дней. Посты, опубликованные ранее этого срока, будут считаться устаревшими и не будут использоваться ботом. 
	'POST_IN_DAYS' => 7,
	'MAS_MAIN_TEXT' => '/var/www/stattop_ru_usr/data/www/stattop.ru/mas_main_text.txt',
	//Питанирующий файл
	'PROCESSING_TEXE' => '/var/www/stattop_ru_usr/data/www/stattop.ru/processing_text.py',
	//Путь к векторной базе
	'VEKTOR_DB' => '/var/www/stattop_ru_usr/data/www/stattop.ru/vektor_db',
	//Путь к файлу обмена JSON TEXT
	'RESULT_TEXT_JSON' => '/var/www/stattop_ru_usr/data/www/stattop.ru/json_text.json',
	//Путь к скрипту для обработки изображения
	'PROCESSING_IMG' => '/var/www/stattop_ru_usr/data/www/stattop.ru/processing_img.py',
	//Путь к файлу обмена JSON IMG
	'RESULT_IMG_JSON' => '/var/www/stattop_ru_usr/data/www/stattop.ru/json_img.json',
];

?>