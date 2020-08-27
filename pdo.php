<?php session_start();
$pdo = new PDO('mysql:host=remotemysql.com;port=3306;dbname=A05NVkjpmH',
   'A05NVkjpmH', 'SAb1CX5hmr');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
define ('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost/blog/');
if(!isset($_SESSION['errors'])){
$_SESSION['errors'] = array();
}?>
