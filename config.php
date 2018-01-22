<?
define('SITE_ADDR','http://'.$_SERVER['SERVER_NAME']); // Адрес системы без слеш на конце!
define('ABS_PATH',$_SERVER['DOCUMENT_ROOT']); //  Абсолютный путь на сервере
define('TIME_ZONE','Europe/Kiev'); // Временная зона, http://php.net/manual/ru/timezones.europe.php
define('LANG','ru'); // Язык страницы
define('TITLE','Smart watch'); // Метатег title
define('DESCRIPTION','Smart watch'); // Метатег description
define('KEYWORDS',''); // Метатег keywords
define('ROBOTS','all'); // Метатег robots

/* Метатег robots управляет индексированием страниц. 
Можно запретить роботам не только индексацию самого документа, 
но и прохождение по имеющимся в нем ссылкам. Возможные значения:

    index / noindex — индексировать / не индексировать эту страницу;
    follow / nofollow — идти / не идти по ссылкам с этой страницы;
    all = "index, follow"
    none = "noindex, nofollow" */
	
define('DIR','');

define('FAVICON_PATH',ABS_PATH.DIR.'/favicon'); // Путь для favicon на сервере
define('FAVICON_G_PATH',SITE_ADDR.DIR.'/favicon'); // Абсолютный путь для favicon
define('FAVICON','/favicon.png'); // Файл PNG размером не менее 152x152 для создания favicon. 
define('JS_PATH','js/'); // Абсолютный путь для JS
define('CSS_PATH','css'); // Абсолютный путь для css
define('CLASS_PATH',ABS_PATH.DIR.'/class'); // Серверный путь классов

$view_pages=array(10, 25, 50, 100); // Колличество отображаемых строк при пагинации

$email = "zuksel1@gmail.com";
$seller = "Интернет-магазин стильных вещей";
$seller_adress = "г. Киев, Ул. Василия Стуса, 35-37, Офис 500 «Хайтек парк»";
$contact_phone1 = "Тел: 063 266 2529";
$contact_phone2 = "";
$contact_phone3 = "";
$contact_email = "";

// Подключение к LP-CRM
define('CRM','1sklad');
define('CRM_KEY','f3e9e68aadab88a4441bc24ca706dd17');

define('DB_HOST', 'localhost'); 	// Адрес базы данных, может называться localhost
define('DB_NAME', 'testshop'); 	// Название базы данных
define('DB_LOGIN', 'testshop'); 	// Логин базы данных
define('DB_PASS', '1234567890'); 	// Пароль базы данных  */
?>
<?
/*
define('DB_HOST', 'greygler.mysql.ukraine.com.ua'); 	// Адрес базы данных, может называться localhost
define('DB_NAME', 'greygler_clo'); 	// Название базы данных
define('DB_LOGIN', 'greygler_clo'); 	// Логин базы данных
define('DB_PASS', 'ln9fgehl'); 	// Пароль базы данных */
?>