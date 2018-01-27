<?php
date_default_timezone_set('Europe/Paris');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "25");

define("DS", DIRECTORY_SEPARATOR);
define("PATH_RELATIVE", "/MVC/");
define("PATH_RELATIVE_PATTERN", "\/MVC\/");
define("APP_ID",'2028505937382446');
define("APP_SECRET",'1fe5e912bfad91520524ff816677eeb2');

switch ($_SERVER['SERVER_NAME']) {
    default:
        define('HOSTNAME', 'localhost');
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'BluePic');
        define('DB_USER', 'root');
        define('DB_PWD', 'root');
        define('DB_PORT', '3306');
        define('DB_PREFIXE', '');
        define('DIR', $_SERVER['DOCUMENT_ROOT']);
}
