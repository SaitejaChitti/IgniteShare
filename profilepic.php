<?php
// Include the database configuration file
include 'pdo.php';

include('includes/head_section.php'); ?>

<title>MyBlog | Posts </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php if(isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar1.php');} ?>
		<?php if(!isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar.php');} ?>
	<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">

<?php
if(isset($_SESSION['name']))
{
$statusMsg = '';

?>

<form action="uploadimg.php" method="post" enctype="multipart/form-data"><br/>
    <h2>Select Image File to Post:</h2>
    <input type="file" name="file">
	<input type="submit" class="btn" name="submit" value="Post"></input>
</form>
<?php }
else{
echo "<h2>Please Login Before Posting a Post ...<h2>";
}
?>

</div>
</div>
</body>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
