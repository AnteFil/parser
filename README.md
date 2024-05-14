# Супер новый проект

![Laravel](https://laravel.com/img/logotype.min.svg)

## Документация

:boom: Используя клавиши <kbd>CTRL</kbd> + <kbd>C</kbd> и <kbd>CTRL</kbd> + <kbd>V</kbd> необходимо выполнить установку

	1. __composer require antefil/parser__
 
	2. __php artisan vendor:publish --provider='Antefil\Parser\Providers\PostServiceProvider'__

	3. __php artisan migrate__
	Публикация по отдельности:
	- Опубликовать только конфиг: __php artisan vendor:publish --tag=social-config-parser__
	- Опубликовать только миграции: __php artisan vendor:publish --tag=social-migrations-parser__
	
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
	
	- Удалить запись "antefil/parser": "^1.0", в файле composer.json 
	- Выполнить команду composer dump-autoload
	- php artisan migrate:rollback

