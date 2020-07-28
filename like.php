
<?php
require_once "pdo.php";
if('POST' == $_SERVER['REQUEST_METHOD']){
if (isset($_POST['like'])&&isset($_POST['post_id'])){
   $sql = "UPDATE images set likes = likes+1 where post_id ='".$_POST['post_id']."'";
   $result=$pdo->query($sql);
   $id=$_SESSION['post_id'];
   $name=$_SESSION["name"];
   $query = "INSERT INTO likes (post_id, name) VALUES(:post_id,:name)";
   $stmt = $pdo->prepare($query);
   $stmt->execute([':post_id'=>$id,':name'=>$name]);
   unset($_SESSION['post_id']);
 }
}
?>
