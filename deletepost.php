<?php  include('pdo.php'); ?>
<!-- Source code for handling registration  -->

<?php include('includes/head_section.php');
 ?>

<title>MyBlog | Sign up </title>
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
  		<?php

      if(isset($_SESSION['errors'])){
        include "includes/errors.php";
        unset($_SESSION['errors']);
      }
      if(isset($_SESSION['message'])){
        include "includes/messages.php" ;
        unset($_SESSION['message']);
      }
      if(isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar1.php');
      $sql="select * from users natural join images where name='".$_SESSION["name"]."'";
      $stmt=$pdo->query($sql);
      if($p = $stmt->fetchAll(PDO::FETCH_ASSOC)){
      ?>
      <br>
<center><h2>Delete Your Post</h2></center><br>
<form action="confirmdelete.php" method="GET"><br>
  &emsp;<label for="Theme">Choose a Post to Delete:</label>&emsp;
  <select name="Theme" class="theme-style" id="theme">
  	<?php 	 foreach($p as $l)
  	{ ?>
    <option value="<?php echo($l['post_id']) ?>"><?php echo($l['message']) ?></option>
  <?php } ?>

  </select>
  <br><br>
  	<input type="submit" class="btn btn-primary w-50" name="submit" value="Delete"></input>
</form>
<?php }}?>
</div>
</div>
</body>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
