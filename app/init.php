<?php
session_start();


// define time zone
date_default_timezone_set('Africa/Cairo');


// get database info from ini and start connection
$ini = parse_ini_file('config.ini');
global $conn;
$conn = new PDO("mysql:host=" . $ini['db_host'] . ";dbname=" . $ini['db_name'] . ";charset=UTF8", $ini['db_user'], $ini['db_password']);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// define root_path as app folder
define('ROOT_PATH', dirname(__FILE__) . '/');



if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
{
    $protocol='https://';
    $port = $_SERVER['SERVER_PORT'] == 443 ? '' : ':' . $_SERVER['SERVER_PORT'];
}
else
{
    $protocol='http://';
    $port = $_SERVER['SERVER_PORT'] == 80 ? '' : ':' . $_SERVER['SERVER_PORT'];
}
define('ROOT', $protocol . rtrim($_SERVER['SERVER_NAME'] . $port . $_SERVER['SCRIPT_NAME'], 'index.php'));



spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    $filePath = ROOT_PATH . $className . '.php';
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});