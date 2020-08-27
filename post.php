<?php
// Include the database configuration file
include 'pdo.php';

include('includes/head_section.php'); ?>

<title>MyBlog | Posts </title>
</head>
<body>
	<style>
	#theme{
		-webkit-box-sizing: border-box;
	  padding: 20; }
.theme-style {
  --radius: 2em;
  --baseFg: dimgrey;
  --baseBg: white;
  --accentFg: #006fc2;
  --accentBg: #bae1ff;
}
select {
  font: 400 14px/1.3 sans-serif;
  -webkit-appearance: none;
  appearance: none;
  color: var(--baseFg);
  border: 1px solid var(--baseFg);
  line-height: 1;
  outline: 0;
  padding: 0.65em 2.5em 0.55em 0.75em;
  border-radius: var(--radius);
  background-color: var(--baseBg);
  background-image: linear-gradient(var(--baseFg), var(--baseFg)),
    linear-gradient(-135deg, transparent 50%, var(--accentBg) 50%),
    linear-gradient(-225deg, transparent 50%, var(--accentBg) 50%),
    linear-gradient(var(--accentBg) 42%, var(--accentFg) 42%);
  background-repeat: no-repeat, no-repeat, no-repeat, no-repeat;
  background-size: 1px 100%, 20px 22px, 20px 22px, 20px 100%;
  background-position: right 20px center, right bottom, right bottom, right bottom;
}

select:hover {
  background-image: linear-gradient(var(--accentFg), var(--accentFg)),
    linear-gradient(-135deg, transparent 50%, var(--accentFg) 50%),
    linear-gradient(-225deg, transparent 50%, var(--accentFg) 50%),
    linear-gradient(var(--accentFg) 42%, var(--accentBg) 42%);
}

select:active {
  background-image: linear-gradient(var(--accentFg), var(--accentFg)),
    linear-gradient(-135deg, transparent 50%, var(--accentFg) 50%),
    linear-gradient(-225deg, transparent 50%, var(--accentFg) 50%),
    linear-gradient(var(--accentFg) 42%, var(--accentBg) 42%);
  color: var(--accentBg);
  border-color: var(--accentFg);
  background-color: var(--accentFg);
}

</style>
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
$sql="select * from themes ";
$stmt=$pdo->query($sql);
if ( $t = $stmt->fetchAll(PDO::FETCH_ASSOC) )
{

?>

<form action="upload.php" method="post" enctype="multipart/form-data"><br/>
    <h2>Select Image File to Post:</h2>
    <input type="file" name="file">
	<input type="text" name="message" value="<?php $message?>" placeholder="Message">
	<label for="Theme">Choose a Theme:</label>

<select name="Theme" class="theme-style" id="theme">
	<?php 	 foreach($t as $l)
	{ ?>
  <option value="<?php echo($l['theme']) ?>"><?php echo($l['theme']) ?></option>
<?php } ?>

</select>
	<input type="submit" class="btn btn-primary w-100" name="submit" value="Post"></input>
</form>
<?php }}
else{
echo "<h2>Please Login Before Posting a Post ...<h2>";
}
?>

</div>
</div>
</body>
<?echo"HI";?>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
