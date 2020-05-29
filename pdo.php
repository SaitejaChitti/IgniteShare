<?php session_start();	
$pdo = new PDO('mysql:host=localhost;port=3308;dbname=misc', 
   'sai', 'OK');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
define ('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost/blog/');
if(!isset($_SESSION['errors'])){ 
$_SESSION['errors'] = array();
}?>



