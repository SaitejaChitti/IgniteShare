<?php
include "pdo.php";
?>
<?php include('includes/head_section.php');
?>
<title>MyBlog | Posts</title>
</head>
<body>
<style>
.container2 img {
  float:left;
  max-width: 50px;
  width: 100%;
  margin-right: 20px;
  border-radius: 0%;
}
.btn-link:hover, .btn-link, .btn-link:focus{
  text-decoration: none;
}
.card-header{
       padding: 5px 5px;
   }
.hide{
  display:none;
}
.show{
  display:block;
}
.jumbotron{
    border:2px solid grey;
    }
.card{
      overflow:auto;
    }

</style>

<div class="container">
	<!-- Navbar -->
		<?php if(isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar1.php');} ?>
		<?php if(!isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar.php');} ?>
		<br>
<center><h2>Followers</h2></center>
<?php
if(isset($_SESSION['name'])){
// Get images from the database
$z=0;
$stmt = $pdo->query("SELECT * FROM users natural join follower where name='".$_GET["name"]."'");
	if ( $rows = $stmt->fetchAll(PDO::FETCH_ASSOC) )
  {
    ?>
    <div class="bs-example">
        <div class="accordion" id="accordionExample">
          <?php foreach($rows as $row)
  	{	$z=$z+1;
      $sql="select * from users where name='".$row["followername"]."'";
      $stmt1=$pdo->query($sql);
      $l = $stmt1->fetch(PDO::FETCH_ASSOC);
      $profile_picURL='profile_pics/'.$l["profile_pic"];
    ?>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link w-100" data-toggle="collapse" data-target="#collapse<?php echo ($z) ?>" style="text-align:left;">
                    <div class="container2">  <img src="<?php echo $profile_picURL;?>" alt="Profile Pic" onerror="this.onerror=null;this.src='profile_pics/default.png';"/>
              <a href="profiles.php?name=<?php echo($row['followername'])?>">
              <span style="font-size:20pt;"><?php echo(ucfirst($row['followername']))?></span></div>
            </a>
              </button>
                </h2>
            </div>

        </div>
      <?php }}} ?>
      <?php include( ROOT_PATH . '/includes/footer.php'); ?>
