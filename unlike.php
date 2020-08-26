<?php
require_once "pdo.php";
if (isset($_POST['post_id'])){
   $sql = "UPDATE images set likes = likes-1 where post_id ='".$_POST['post_id']."'";
   $result=$pdo->query($sql);
   $id=$_POST['post_id'];
   $name=$_SESSION["name"];
   $query = "delete from likes where post_id='".$id."' and name='".$name."'";
   $stmt = $pdo->prepare($query);
   $stmt->execute();
    header("Location:posts.php");
 }

?>
