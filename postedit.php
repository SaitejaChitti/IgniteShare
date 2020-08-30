<?php
// Include the database configuration file
include 'pdo.php';
$errors=[];
if(isset($_POST['post_id'])&&isset($_POST['message'])&&isset($_POST['Theme'])&&isset($_SESSION['name'])){
  $name=$_SESSION['name'];
  $message=htmlentities($_POST['message']);
  $theme=htmlentities($_POST['Theme']);
  $toggle=0;
  if(isset($_POST['toggle'])){
    $toggle=1;
  }

  $post_id=$_POST['post_id'];

  $insert = $pdo->query("update images set message='".$message."',theme='".$theme."',toggle='".$toggle."' where name='".$name."' and post_id='".$post_id."'");
  if($insert){
    $_SESSION['message'] = "Your Edit has been updated successfully.";
    }
    else{
      array_push($errors,"Edit Post has failed, please try again.");
    }
}
else{
  array_push($errors,"Edit Post has failed, please try again.");
}
$_SESSION['errors']=$errors;
header("Location:confirmedit.php?Theme=".$_POST['post_id']."");

?>
