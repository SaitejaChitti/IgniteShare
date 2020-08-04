<?php
// Include the database configuration file
include 'pdo.php';
if(isset($_POST['hobbies'])&&isset($_POST['email'])&&isset($_POST['bio'])&&isset($_POST['country_name'])&&isset($_SESSION['name'])){
  $errors=[];
  $name=$_SESSION['name'];
  $hobbies=htmlentities($_POST['hobbies']);
  $bio=htmlentities($_POST['bio']);
  $country=htmlentities($_POST['country_name']);
  $email=htmlentities($_POST['email']);
  $insert = $pdo->query("update profile set hobbies='".$hobbies."',bio='".$bio."',location='".$country."' where name='".$name."'");
  if($insert){
    $insert1 = $pdo->query("update users set email='".$email."' where name='".$name."'");
      if($insert1){
    $_SESSION['message'] = "Your profile has been updated successfully.";
    }
    else{
      array_push($errors,"Edit Profile has failed, please try again.");
    }
  }
  else{
    array_push($errors,"Edit Profile has failed, please try again.");
  }
}
else{
  array_push($errors,"Edit Profile has failed, please try again.");
}
  $_SESSION['errors']=$errors;
  header('Location:editprofile.php');

?>
