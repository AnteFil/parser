# composer require antefil/parser

Пилотный проект

## Документация

Установка
	1. composer require antefil/parser
 
	2. php artisan vendor:publish --provider='Antefil\Parser\Providers\PostServiceProvider' 

	3. php artisan migrate
	
	Удаление: необходимо выполнить следущее шаги
	- composer dump-autoload
	- php artisan migrate:rollback
	
	Публикация по отдельности:
	- Опубликовать только конфиг: php artisan vendor:publish --tag=social-config-parser
	- Опубликовать только миграции: php artisan vendor:publish --tag=social-migrations-parser
