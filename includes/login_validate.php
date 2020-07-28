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
	header("Refresh: 5; URL='../login.php'");
   }
   else {
    foreach ( $row as $r ) {
	echo("<h1>");
    echo("WELCOME BACK $r<hr>");
    echo("</h1>");
    }

        echo "<h2>Login success.</h2>\n";
	    $_SESSION['message'] = "You are now logged in";

			// put logged in user into session array
		$_SESSION['name'] = $r;
	header("Refresh: 3, URL= '../post.php'");
   }
}?>
<?php
function getUserByname($name)
	{
		$pdo = new PDO('mysql:host=localhost;port=3308;dbname=misc','sai', 'OK');
		// See the "errors" folder for details...
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM users WHERE name=$name LIMIT 1";
		$stmt = $pdo->prepare($sql);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// returns user in an array format:
		// ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
		return $row;
	}

?>

</div>
</div>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
