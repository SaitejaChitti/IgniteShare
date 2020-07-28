<?php  include('pdo.php'); ?>
<!-- Source code for handling registration  -->

<?php include('includes/head_section.php'); ?>

<title>MyBlog | Sign up </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="includes/regvalidate.php" >
			<h2>Register on MyBlog<hr></h2>
			<?php
			if(isset($_SESSION['errors'])){
				include 'includes/errors.php';
				unset($_SESSION['errors']);
			}
			?>
			<input  type="text" name="username" value="<?php $username; ?>"  placeholder="Username">
			<input type="email" name="email" value="<?php $email ?>" placeholder="Email">
			<input type="password" name="password_1" placeholder="Password">
			<input type="password" name="password_2" placeholder="Password confirmation">
			<button type="submit" class="btn" name="reg_user">Register</button>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
			</div>
</div>

<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
