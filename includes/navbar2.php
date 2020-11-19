<?php require_once "pdo.php" ?>
  <div class="navbar">
	<div class="logo_div">
		<a href="home.php"><h1>IgniteShare</h1></a>
	</div>
	<ul>

    <li><a class="active" href="profile.php">Profile</a></li>
	  <li><a href="posts.php">Posts</a></li>
	  <li><a href="post.php">Upload a Post</a></li>
	  <li><a href="home.php">About</a></li>
	<li><a href="logout.php">Logout</a></li>

  <form class="form-inline my-2 my-lg-0" action="profiles.php" method="get">


  <?php
    $statement = $pdo->query("SELECT * FROM users");
  	if ( $rows = $statement->fetchAll(PDO::FETCH_ASSOC) )
      {	?>
            <input class="form-control mr-sm-2" type="search" name="name" placeholder="Username" aria-label="Search" id="name" list="names" />

            <datalist id="names">
              <?php	foreach($rows as $row)
                  {
                ?>
                          <option value="<?php echo($row['name']) ?>"><?php echo($row['name']) ?></option>
      <?php }?>
            </datalist>
          <?php } ?>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form></ul>
    </div>
