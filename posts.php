<?php
include "pdo.php";
if(isset($_POST['like']))
{
	include "like.php";
}

?>
<?php include('includes/head_section.php');
?>
<title>MyBlog | Posts</title>
</head>
<body>
<style>
.container2 img {
  float:left;
  max-width: 50px;
  width: 100%;
  margin-right: 20px;
  border-radius: 0%;
}
.btn-link:hover, .btn-link, .btn-link:focus{
  text-decoration: none;
}
.card-header{
       padding: 5px 5px;
   }
.hide{
  display:none;
}
.show{
  display:block;
}
.jumbotron{
    border:2px solid grey;
    }
.card{
      overflow:auto;
    }

</style>

<script>
function display(x)
    {
      document.getElementById(x).style.display = "block";
      }
</script>
<div class="container">
	<!-- Navbar -->
		<?php if(isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar1.php');} ?>
		<?php if(!isset($_SESSION['name'])){include( ROOT_PATH . '/includes/navbar.php');} ?>
		<br>

		<center>
		<h1> Posts </h1>
		</center>
		<form action="" method="get">
			<p align="right">
		<select name="Filter" class="btn btn-primary " id="filter"  style="width:200px;">
			<option value="RP">Recent Posts</option>
			<option value="YP">Your Posts</option>
			<option value="TP">All Trending Posts</option>
			<option value="YTP">Your Trending Posts</option>
		</select>
		<input type="submit" class="btn btn-primary " name="filter" style="width:200px;"></input>
	</p>		<br><br>
		</form>

  <?php
  if(isset($_SESSION['name'])){
  // Get images from the database
  $z=0;
	$stmt = $pdo->query("SELECT * FROM images natural join users ORDER BY uploaded_on DESC");
	if(isset($_GET['Filter'])){

		if($_GET['Filter']=='RP'){
					$_SESSION['message']='Filter <b>Recent Posts</b> applied';
  $stmt = $pdo->query("SELECT * FROM images natural join users ORDER BY uploaded_on DESC");
	}
	if($_GET['Filter']=='YP'){
				$_SESSION['message']='Filter <b>Your Posts</b> applied';
$stmt = $pdo->query("SELECT * FROM images natural join users  where name='{$_SESSION['name']}' ORDER BY uploaded_on DESC");
}

if($_GET['Filter']=='TP'){
			$_SESSION['message']='Filter <b>Trending Posts</b> applied';
$stmt = $pdo->query("SELECT * FROM images natural join users ORDER BY likes DESC");
}
if($_GET['Filter']=='YTP'){
			$_SESSION['message']='Filter <b>Your Trending Posts</b> applied';
$stmt = $pdo->query("SELECT * FROM images natural join users where name='{$_SESSION['name']}' ORDER BY likes,name DESC");
}

		 include 'includes/messages.php';unset($_SESSION['message']);
	 	}

	if ( $rows = $stmt->fetchAll(PDO::FETCH_ASSOC) )
  {
    ?>
    <div class="bs-example">
        <div class="accordion" id="accordionExample">
          <?php foreach($rows as $row)
  	{	$z=$z+1;
    	$imageURL = 'uploads/'.$row["file_name"];
      $profile_picURL='profile_pics/'.$row["profile_pic"];
    	if(substr($imageURL,-3)=="JPG"||substr($imageURL,-3)=="PNG"||substr($imageURL,-3)=="png"||substr($imageURL,-3)=="jpg"||substr($imageURL,-4)=="jpeg"||substr($imageURL,-4)=="JPEG")
    		{
    ?>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link w-100" data-toggle="collapse" data-target="#collapse<?php echo ($z) ?>" style="text-align:left;">
                    <div class="container2">  <img src="<?php echo $profile_picURL;?>" alt="Profile Pic"/>
              <span style="font-size:20pt;"><?php echo(ucfirst($row['name']))?></span></div><span style="font-size:10pt;color:#808080;"><?php echo($row['uploaded_on'])?></span>
              <center><span style="font-size:16pt;"><?php echo($row['message'])?></span></center><span style="font-size:10pt;color:#808080;float:right;">#<?php echo($row['theme'])?></span></button>

                </h2>
            </div>
            <div id="collapse<?php echo($z) ?>" class="collapse" aria-labelledby="collapse<?php echo($z) ?>" data-parent="#accordionExample">
                <div class="card-body h-100">
                  <figure>
                    <center>
                      <img src="<?php echo $imageURL;?>" alt="<?php echo $row["file_name"];?>" style="width:750px;height:400px"/>
                    </center>
                  <figcaption>
                  <?php
                        $sql="select likes from images where post_id='".$row["post_id"]."'";
                        $stmt=$pdo->query($sql);
                        $l = $stmt->fetch(PDO::FETCH_ASSOC);
                        $s="select * from likes where post_id='".$row["post_id"]."' and name='".$_SESSION["name"]."'";
                        $stmt1=$pdo->query($s);
                        $p = $stmt1->fetch(PDO::FETCH_ASSOC);
                        if($p===FALSE){
                        echo('<form action="like.php" method="post">');
                        echo('<input type="hidden" name="post_id" value="'.$row['post_id'].'"/>');
                        echo('&emsp;<button type="submit" class="btn btn-primary" name="like" value="like" style="font-color:blue;"><i class="fa fa-thumbs-o-up fa-lg">Like</i>&nbsp;'.$l["likes"].'</button>');
                        echo('</form>');
                        }
                        else {
												echo('<form action="unlike.php" method="post">');
	                      echo('<input type="hidden" name="post_id" value="'.$row['post_id'].'"/>');
                        echo('&emsp;<button type="submit" class="btn btn-primary" name="unlike" value="unlike" style="font-color:blue;"><i class="fa fa-thumbs-o-down fa-lg" >UnLike</i>&nbsp;'.$l["likes"].'</button>');
                        echo('</form>');
												}

                        ?>
                        &emsp;

                        <button type="submit" class="btn btn-primary "  id="comment<?php echo $row['post_id']?>"style="font-color:blue;" onclick="return display(<?php echo $row['post_id']?>);" ><i class="fa fa-comment-o fa-lg">Comments</i></button>

                        <div class="card-body" id="<?php echo $row['post_id']?>" style="display: none;">
                          <?php

                          $sq="select * from comments  where post_id='".$row["post_id"]."'";
                          $stmt2=$pdo->query($sq);
                          if ( $comments = $stmt2->fetchAll(PDO::FETCH_ASSOC) )
                          {
                             foreach($comments as $c){
                               $sql1="select * from users  where name='".$c["commented_by"]."'";
                               $stmt3=$pdo->query($sql1);
                               if($u = $stmt3->fetch(PDO::FETCH_ASSOC)){
                               $pic='profile_pics/'.$u['profile_pic'];
                             }
                          ?>
                          <div class="jumbotron" style=" margin-right: 30px; margin-left: 30px; margin-top: 0px; height:10px;">
                            <div class="container1">
                                <div class="container2">  <img src="<?php echo $pic;?>" alt="Profile Pic"/>
                          <?php
                          echo('<b>'.ucfirst($c['commented_by']).'</b><br>&emsp;');
                          echo('<b>'.$c['comment'].'</b>');
                          echo('<span style="float:right">'.$c['commented_on'].'</span>');
                          ?>
                        </div>
                        </div>
                      </div>
                      <?php
                        }
                      }?>
                      <?php
                      echo('<form action="comment.php"method="POST"><input type="hidden" ');
                      echo('name="post_id" value="'.$row['post_id'].'">'."\n");
                        ?>
                          <input type="text-area" name="text" placeholder="Type your comment here...."/>
                           <input type="submit" name="comment"  class="btn btn-primary btn-lg" style="border: 3px solid white;"/>
                           <input type="hidden" name="comment_id" value="<?php echo $row['post_id'];?>"/>
                        </div>
                        <?php echo('</form');?>
                  </figcaption>
                  </figure>
                  </div>
            </div>
        </div>
      <?php }}} ?>
</div>
</div>
</div>
<?php }
else{
echo ('<br><center><h2>Please Login Before Viewing  Posts ...</h2></center>');
} ?>
<?php include( ROOT_PATH . '/includes/footer.php'); ?>
