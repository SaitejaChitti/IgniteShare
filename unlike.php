
<?php
require_once "pdo.php";

if('POST' == $_SERVER['REQUEST_METHOD']){
if (isset($_POST['unlike'])){
   $sql = "UPDATE images set likes = likes-1 where post_id ='".$_POST['post_id']."'";
   $result=$pdo->query($sql);
}
}
?>
