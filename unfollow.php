<?php
require_once "pdo.php";
if (isset($_POST['username'])){
   $sql = "delete from follower where username='".$_POST['username']."' and followername='".$_SESSION['name']."'";
   $stmt = $pdo->prepare($sql);
   if($stmt->execute()){
     echo($_POST['username'].$_SESSION['name']);
   $d="profiles.php?name=".$_POST['username'];
    header("Location:$d");}

 else{
   header("Location:home.php");
 }
}

?>
