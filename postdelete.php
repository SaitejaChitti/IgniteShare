<?php
// Include the database configuration file
include 'pdo.php';
$errors=[];
if(isset($_POST['post_id'])&&isset($_SESSION['name'])){
  $name=$_SESSION['name'];
  $post_id=$_POST['post_id'];

  $delete = $pdo->query("delete from images where name='".$name."' and post_id='".$post_id."'");
  if($delete){
    $_SESSION['message'] = "Your Post has been deleted successfully.";
    }
    else{
      array_push($errors,"Delete Post has failed, please try again.");
    }
}
else{
  array_push($errors,"Delete Post has failed, please try again.");
}
$_SESSION['errors']=$errors;
header("Location:profile.php");

?>
