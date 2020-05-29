<?php
require_once "pdo.php";
?>
<?php include('includes/head_section.php'); ?>

<title>MyBlog | Sign In </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php if(isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar1.php');} ?>
		<?php if(!isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar.php');} ?>
	<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="includes/login_validate.php">
			<h2>Login to your Account<hr></h2>
			<input type="text" name="email" value="<?php $email ?>" placeholder="Email or Username">
			<input type="password" name="password" value="<?php $password ?>" placeholder="Password">			
			<button type="submit" class="btn" name="log_user">Login</button>
			<p><a href="register.php">New User? Sign Up </a></p>
		</form>
	</div>

</div>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
