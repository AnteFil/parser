# Супер новый проект

![Laravel](https://laravel.com/img/logotype.min.svg)

## Документация

:boom: Используя клавиши <kbd>CTRL</kbd> + <kbd>C</kbd> и <kbd>CTRL</kbd> + <kbd>V</kbd> необходимо выполнить установку

	1. composer require antefil/parser
 
	2. php artisan vendor:publish --provider='Antefil\Parser\Providers\PostServiceProvider'

	3. php artisan migrate
	Публикация по отдельности:
	- Опубликовать только конфиг: php artisan vendor:publish --tag=social-config-parser
	- Опубликовать только миграции: php artisan vendor:publish --tag=social-migrations-parser
	
<table>
    <tr>
        <th>Шаг 1</th>
        <th>Шаг 2</th>
    </tr>
    <tr>
        <td>Ячейка 1.1</td>
        <td>Ячейка 2.1</td>
    </tr>
    <tr>
        <td>Ячейка 1.2</td>
        <td>Ячейка 2.2</td>
    </tr>
</table>

:sob: Удаление: необходимо выполнить следущее шаги
	
	- Удалить запись "antefil/parser": "^1.0", в файле composer.json в корне вашего сайта
	- Выполнить команду composer dump-autoload
	- Выполнить команду composer update
	- php artisan migrate:rollback если выполняли ранее команду php artisan migrate.

