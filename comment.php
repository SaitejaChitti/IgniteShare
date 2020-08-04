<?php
require_once "pdo.php";
if('POST' == $_SERVER['REQUEST_METHOD']){
if (isset($_POST['text'])&&isset($_SESSION['name'])){
  echo $_POST['comment_id'];
   $id=$_POST['comment_id'];
   $name=$_SESSION["name"];
   $comment=$_POST['text'];
   $query = "INSERT INTO comments (post_id,commented_by,comment) VALUES(:post_id,:commented_by,:comment)";
   $stmt = $pdo->prepare($query);
   $stmt->execute([':commented_by'=>$name,':comment'=>$comment,':post_id'=>$id]);
   header("Location:posts.php");
 }
}
?>
