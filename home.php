<?php  include('pdo.php'); ?>
<!-- Source code for handling registration  -->

<?php include('includes/head_section.php'); ?>

<title>MyBlog | Sign up </title>
</head>
<body>
  <style>
  .centered {
  position: absolute;
  top: 18%;
  left: 65%;
  transform: translate(-50%, -50%);
}
  .centre {
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
}

  </style>
<div class="container">
	<!-- Navbar -->
		<?php if(isset($_SESSION['name'])){ include( ROOT_PATH . '/includes/navbar1.php');} else {include( ROOT_PATH . '/includes/navbar.php');}?>
<br>
    <img src="static/images/bg.jpg" style="height:500px;width:1105px;"/>

    <div class="centered"><br><h2>Post your passions, your way.<br>Create a unique and beautiful blog. It’s easy and free.</h2></div>
<hr>
    <img src="static/images/bg2.jpg" style="height:500px;width:1105px;"/>

    <div class="centre">
    <h2><br>Join millions of others by sharing your expertise, breaking news, trending topics or whatever’s on your mind.<br> </h2>
</div>
</div>
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer1.php'); ?>
<!-- // Footer -->
