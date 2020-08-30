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
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
	left:25px;
	top:15px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}


</style>
  <div class="container">
  	<!-- Navbar -->
  		<?php
      if(isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar1.php');
      if(isset($_SESSION['errors'])){
        echo "<br>";
        include "includes/errors.php";
        unset($_SESSION['errors']);
        echo "<br>";
      }
      if(isset($_SESSION['message'])){
        echo "<br>";
        include "includes/messages.php" ;
        unset($_SESSION['message']);
        echo "<br>";
      }
      $sql="select * from users natural join images where name='".$_SESSION["name"]."' and post_id='".htmlentities($_GET['Theme'])."'";
      $stmt=$pdo->query($sql);
      $sql1="select * from themes";
      $stmt1=$pdo->query($sql1);
      $t = $stmt->fetch(PDO::FETCH_ASSOC);
      $imageURL = 'uploads/'.$t["file_name"];
      if($p = $stmt1->fetchAll(PDO::FETCH_ASSOC)){
      ?>
      <br>
<center><h2>Delete Your Post</h2></center><br>
<form action="postdelete.php" method="POST"><br>
  <center><h2>Preview Post</h2>
    <img src="<?php echo $imageURL;?>" alt="<?php echo $t["file_name"];?>" style="width:750px;height:400px"/>
  </center><br>
  <label for="email">Title of Post:</label>
  <input type="text" name="message" value="<?php echo($t['message'])?>" placeholder="Message" readonly/>
  <br>
  <label for="Theme">Theme of Post:</label>&emsp;
  <select name="Theme" class="theme-style" id="theme">

        <option value="<?php echo($t['theme']) ?>"><?php echo($t['theme']) ?></option>

  </select>
  <?php if($t['toggle']==0){?>
  <br>
  Public
  <label class="switch">
    <input type="checkbox" name="toggle" checked></input>
    <span class="slider round"></span>
  </label>
  <span style="position:relative;left:45px;">Private</span>
<?php }?>
<?php if($t['toggle']==1){?>
<br>
Private
<label class="switch">
  <input type="checkbox" name="toggle" checked></input>
  <span class="slider round"></span>
</label>
<?php }?>
  <br><br>
    <?php echo('<input type="hidden" name="post_id" value="'.$t['post_id'].'"/>');?>
  	<input type="submit" class="btn btn-primary w-50" name="submit" value="Delete"></input>

<?php }}?>
</div>
</div>
</body>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
