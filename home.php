<?php  include('pdo.php'); ?>
<!-- Source code for handling registration  -->

<?php include('includes/head_section.php'); ?>

<title>MyBlog | Sign up </title>
</head>
<body>
  <style>
  </style>
<div class="container">
	<!-- Navbar -->
		<?php if(isset($_SESSION['name'])){ include( ROOT_PATH . '/includes/navbar1.php');} else {include( ROOT_PATH . '/includes/navbar.php');}?>
<br>
    <img src="static/images/bg.jpg" style="height:50%;width:100%;"/>

<hr>
    <img src="static/images/bg2.jpg" style="height:50%;width:100%;"/>

    <div class="centre">
</div>
</div>
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer1.php'); ?>
<!-- // Footer -->
