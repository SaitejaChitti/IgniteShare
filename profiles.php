<?php  include('pdo.php'); ?>
<!-- Source code for handling registration  -->

<?php include('includes/head_section.php'); ?>


<title>Sidebar 01</title>
    <meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
  <style>
  * {
  box-sizing: border-box;
}
  .navbar {
  	margin: 0 auto;
      overflow: hidden;
  	background-color: #3E606F;
      border-radius: 0px 0px 6px 6px;
  }
  .navbar ul {
      list-style-type: none;
      float: right;
  }
  .navbar ul li {
      float: left;
      font-family: 'Noto Serif', serif;
  }
  .navbar ul li a {
      display: block;
      color: white;
      text-align: center;
      padding: 20px 28px;
      text-decoration: none;
  }
  .navbar ul li a:hover {
  	color: #B9E6F2;
      background-color: #334F5C;
  }

  /* LOGO */
  .navbar .logo_div {
  	float: left;
  	padding-top: 5px;
  	padding-left: 40px;
  }
  .navbar .logo_div h1 {
  	color: #B9E6F2;
  	font-size: 3em;
  	letter-spacing: 5px;
  	font-weight: 100;
  	font-family: 'Tangerine', cursive;
  }
  </style>
  <?php //if(isset($_POST['username'])){include "unfollow.php";}?>
<div class="container">
  <?php if(isset($_GET['name'])&&isset($_SESSION['name'])) {include 'includes/navbar1.php';
    if(isset($_SESSION['message'])){echo"<br>";include 'includes/messages.php';echo"<br>"; unset($_SESSION['message']);}
  $sql1="select * from users natural join profile  where name='".$_GET["name"]."'";
  $stmt3=$pdo->query($sql1);
  if($t = $stmt3->fetch(PDO::FETCH_ASSOC)){
  $pic='profile_pics/'.$t['profile_pic'];
}
  ?>

  		<div class="wrapper d-flex align-items-stretch">
  			<nav id="sidebar">
  				<div class="p-4 pt-5">
            <div class="img">
              <a href="javascript:void(0)">
                <div class="img__overlay"><i class="fa fa-edit"  style="font-size:24px"></i></div></a>
              <div class="img">
                <?php echo '<img src="'.$pic.'"/>' ;?>
              </div>
            </div>
              <br>
  	        <ul class="list-unstyled components mb-5">
              <li>
  	              <a  href="#" style="font-size:24px;" ><?php echo ucfirst($t['name']) ?></a>
  	          </li>
              <span style="font-size:10pt;color:#808080;"><?php  if(isset($t['location'])){echo $t['location'];}?></span>
              <br>
              <?php if(isset($_GET['name'])&&isset($_SESSION['name'])){
                    $sql12="select * from follower where username='".$_GET["name"]."' and followername='".$_SESSION["name"]."'";
                    $stmt12=$pdo->query($sql12);
                    if($a = $stmt12->fetch(PDO::FETCH_ASSOC)){
              ?>
              <form method="POST" action="unfollow.php">
                <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-minus-circle"></i>UnFollow</button>
                <input type="hidden" name="username" value="<?php echo($_GET['name'])?>"/>
              </form>

<div class="btn-group" role="group" aria-label="Basic example" style="padding-left:-200px;">
<button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-user-friends"></i>Followers</button>
<button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-user-plus"></i>Following</button>
</div>
<?php }
  else{
    $sql11="select * from follower where username='".$_SESSION["name"]."' and followername='".$_GET["name"]."'";
    $stmt11=$pdo->query($sql11);
    if($d = $stmt11->fetch(PDO::FETCH_ASSOC)){
?>
<form method="POST" action="follow.php">
<button type="submit" class="btn btn-outline-secondary "><i class="fas fa-plus-circle"></i>&nbsp;FollowBack</button>
<input type="hidden" name="username" value="<?php echo($_GET['name'])?>"/>
</form>

<div class="btn-group" role="group" aria-label="Basic example" style="padding-left:-200px;">
<button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-user-friends"></i>Followers</button>
<button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-user-plus"></i>Following</button>
</div>
<?php }
 else{?>
   <form method="POST" action="follow.php">
   <button type="submit" class="btn btn-outline-secondary "><i class="fas fa-plus-circle"></i>&nbsp;Follow</button>
   <input type="hidden" name="username" value="<?php echo($_GET['name'])?>"/>
   </form>

<div class="btn-group" role="group" aria-label="Basic example" style="padding-left:-200px;">
<button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-user-friends"></i>Followers</button>
<button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-user-plus"></i>Following</button>
</div>
<?php } }}?>
          <hr>
              <li>
  	              <a  href="javascript:void(0)"><span style="float:left;font-size:18px;color:#333;font-family: sans-serif;" ><b>About</b></span> <i class="fa fa-edit"  style="font-size:18px;float:right;"></i></a>
  	          </li>
              <br><br>
  	          <li>
                <span style="color:#808080;">Email</span><br><a><?php echo $t['email'] ?></a>
  	          </li>

              <li>
                <span style="color:#808080;">Hobbies</span><br><a><?php if(isset($t['hobbies'])){echo $t['hobbies'];} else{echo("--");} ?></a>
              </li>
              <li>
                <span style="color:#808080;">Bio</span><br><a><?php if(isset($t['bio'])){echo $t['bio'];} else{echo("--");} ?></a>
              </li>
          </ul>

  	      </div>
      	</nav>

          <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

          <h2 class="mb-4">Posts Calendar</h2>
          <p>You can view all your posts in Calender View.</p>
          <form action="calendar/" method="post">
          <input type="submit" class="btn btn-primary w-50" value="View Posts in Calendar" disabled></input>
        </form>
          <br><br>
          <h2 class="mb-4">View your Posts</h2>
          <p>You can View all your Posts.</p>
          <form action="posts.php?Filter=YP" method="post">
          <input type="submit" class="btn btn-primary w-50" value="View My Posts" disabled></input>
        </form>

          <br><br>
          <h2 class="mb-4">Trending Posts</h2>
          <p>You can View all your Trending Posts.</p>
          <form action="posts.php?Filter=YTP" method="post">
          <input type="submit" class="btn btn-primary w-50 " value="View my Trending Posts" disabled></input>
        </form>

        <br><br>
        <h2 class="mb-4">Edit Your Posts</h2>
        <p>You can Edit any Posts of yours.</p>
        <form action="editpost.php" method="post">
        <input type="submit" class="btn btn-primary w-50" value="Edit my Post" disabled></input>
        </form>
        <br><br>
        <h2 class="mb-4">Delete Your Posts</h2>
        <p>You can Delete any Posts of yours.</p>
        <form action="deletepost.php" method="post">
        <input type="submit" class="btn btn-primary w-50" value="Delete Post" disabled></input>
        </form>
        </div>
  		</div>
</div>
<?php }
else{
  echo ('<div class="container">');
  include 'includes/navbar.php';
  echo ('<h2>Please Login Before Posting a Post ...<h2></div>');
}
?>
      <script src="static/js/jquery.min.js"></script>
      <script src="static/js/popper.js"></script>
      <script src="static/js/bootstrap.min.js"></script>
      <script src="static/js/main.js"></script>
      <!-- Footer -->
      	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
      <!-- // Footer -->
