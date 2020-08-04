<?php
// Include the database configuration file
include 'pdo.php';

if(isset($_POST['like']))
{
	include "like.php";
}
if(isset($_POST['unlike']))
{
	include "unlike.php";
}

?>
<?php include('includes/head_section.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>MyBlog | Posts </title>
</head>
<style>
figure {
  float: center;
  font-style: italic;
  font-size: 1em;
  text-indent: 0;
  border:  silver solid;
  margin: 0.5em;
  padding: 0</style>
<body>
<div class="container">
	<!-- Navbar -->
		<?php if(isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar1.php');} ?>
		<?php if(!isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar.php');} ?>
	<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">
<?php
	}
	if(substr($imageURL,-3)=="mp4")
		{
?>
<figure>
<video width="320" height="240" controls autoplay>
  <source src="<?php echo $imageURL;?>" type="video/mp4">
</video>
<figcaption>
<?php
			echo('<form action="' . htmlentities($_SERVER["PHP_SELF"]) . '"'. 'method="POST"><input type="hidden" ');
			echo('name="post_id" value="'.$row['post_id'].'">'."");
			echo('<button class="fa fa-thumbs-up" name="like" value="like" ></button>');
			echo('</form>');
			echo('<form action="' . htmlentities($_SERVER["PHP_SELF"]) . '"'. 'method="POST"><input type="hidden" ');
			echo('name="post_id" value="'.$row['post_id'].'">'."\n");
			echo('<button class="fa fa-thumbs-down" name="unlike" value="unlike" ></button>');
			$sql="select likes from images where post_id='".$row["post_id"]."'";
			$stmt=$pdo->query($sql);
			$l = $stmt->fetch(PDO::FETCH_ASSOC);
			echo("  " .$l["likes"]);
?>
<center>
	<?php if(!empty($row['message'])) echo ($row['message']);?>
</center>
</figcaption>
</figure>

<?php
	}
	if(substr($imageURL,-3)=="pdf")
		{
?>

<figure>
    <iframe src=\"<?php echo $imageURL;?>\" style=\"width:320px;height:240px\"></iframe>
<figcaption>
<?php
			echo('<form action="' . htmlentities($_SERVER["PHP_SELF"]) . '"'. 'method="POST"><input type="hidden" ');
			echo('name="post_id" value="'.$row['post_id'].'">'."\n");
			echo('<button class="fa fa-thumbs-up" name="like" value="like" ></button>');
			echo('</form>');
			echo('<form action="' . htmlentities($_SERVER["PHP_SELF"]) . '"'. 'method="POST"><input type="hidden" ');
			echo('name="post_id" value="'.$row['post_id'].'">'."");
			echo('<button class="fa fa-thumbs-down" name="unlike" value="unlike" ></button>');
			$sql="select likes from images where post_id='".$row["post_id"]."'";
			$stmt=$pdo->query($sql);
			$l = $stmt->fetch(PDO::FETCH_ASSOC);
			echo("  " .$l["likes"]);
?>
<center>
	<?php if(!empty($row['message'])) {echo ($row['message']);}?>
</center>
</figcaption>
</figure>

<?php
		}
	}
}
if($z===0){ ?>
    <p>No Post(s) found...</p>
<?php } ?>
</div>
</div>
</body>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
