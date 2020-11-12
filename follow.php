
<?php
require_once "pdo.php";
if (isset($_POST['username'])&&isset($_SESSION['name'])){
  $sql="select user_id from users where name='".$_SESSION["name"]."'";
  $stmt=$pdo->query($sql);
  $l = $stmt->fetch(PDO::FETCH_ASSOC);
   $name=$_POST['username'];
   $followername=$_SESSION["name"];
   $query = "INSERT INTO follower (userid,username,followername) VALUES(:userid,:name,:followername)";
   $stmt = $pdo->prepare($query);
   $stmt->execute([':userid'=>number_format($l['user_id']),':name'=>$name,':followername'=>$followername]);
    header("Location:profiles.php?name=$name");
 }

?>
