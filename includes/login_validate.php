<?php require "../pdo.php";?>
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

<?php
$errors = $_SESSION['errors'];

if ( isset($_POST['email']) && isset($_POST['password'])  ) {

    $sql = "SELECT name FROM users
        WHERE (email =:em AND password =:pw )OR(name=:un AND password=:pw) ";
	$password=md5($_POST['password']);                            //Password stored in database is encrypted
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':em' => $_POST['email'],
        ':pw' => $password,
		':un' => $_POST['email']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
   if ( $row === FALSE ) {

	echo("<h1>Validating Credentials...</h1>");
	array_push($errors,"Username or Password is incorrect.\n");
	$_SESSION['errors'] = $errors;
	header("Refresh: 0; URL='../login.php'");
   }
   else {
    foreach ( $row as $r ) {
	echo("<h1>");
    echo("WELCOME BACK $r<hr>");
    echo("</h1>");


        echo "<h2>Login success.</h2>\n";
				$n=ucfirst($r);
	    $_SESSION['message'] = "Welcome Back $n";

			// put logged in user into session array
		$_SESSION['name'] = $r;
	header("Refresh: 0, URL= '../profile.php'");
   }
}}?>


</div>
</div>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
