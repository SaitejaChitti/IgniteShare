<?php require_once "../pdo.php";?>
<html>
<head>

<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
	<!-- Styling for public area -->
	<link rel="stylesheet" href="../static/css/public_styling.css">
	<meta charset="UTF-8">
	</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php');?>
		<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">

	<h1>Validating Credentials...</h1>
	<?php
	// variable declaration

	$username = "";
	$email    = "";
	$errors = $_SESSION['errors'];
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = htmlentities($_POST['username']);
		$email = htmlentities($_POST['email']);
		$password_1 = htmlentities($_POST['password_1']);
		$password_2 = htmlentities($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) {  array_push($errors, "Uhmm... We need your username"); }
		if (empty($email)) { array_push($errors, "Oops.. Your Email is missing"); }
		if (empty($password_1)) { array_push($errors, "uh-oh you forgot the password"); }
		if ($password_1 != $password_2) { array_push($errors, "The  password and confirm password did not match");}

		// Ensure that no user is registered twice.
		// the email and usernames should be unique

		$sql = "SELECT * FROM users
        WHERE email = :em OR name = :un LIMIT 1";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
        ':em' => $email,
		':un' => $username));
		$user= $stmt->fetch(PDO::FETCH_ASSOC);
		if ($user) { // if user exists
			if ($user['name'] === $username) {
			  array_push($errors, "Username already exists");
			}
			if ($user['email'] === $email) {
			  array_push($errors, "Email already exists");
			}
		}

		$_SESSION['errors'] = $errors;
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypting the password before saving in to database
			$query = "INSERT INTO users (name, email, password)
					  VALUES(:name, :email, :password)";
			$stmt = $pdo->prepare($query);
			$stmt->execute(array(
        ':name' => $username,
        ':email' => $email,
        ':password' => $password));
				$query1 = "INSERT INTO profile (name)
						  VALUES(:name)";
				$stmt1 = $pdo->prepare($query1);
				$stmt1->execute(array(
	        ':name' => $username,
	      ));
		header("Refresh: 3; URL='../logout.php'");
		}
		else
		{
		header("Refresh: 3; URL='../register.php'");
		}
	}
?>
</div>
</div>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
