<?php
// Include the database configuration file
include 'pdo.php';
?>
<?php include('includes/head_section.php'); ?>

<title>MyBlog | Posts </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar1.php'); ?>
	<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">
<?php
$errors=$_SESSION['errors'];
// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && isset($_POST['Theme'])&& !empty($_FILES["file"]["name"] )){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf','JPG','PNG','GIF','JPEG','PDF','mp4');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
			$message=htmlentities($_POST['message']);
			$theme=htmlentities($_POST['Theme']);
      $insert = $pdo->query("INSERT into images (file_name,uploaded_on,message,theme,name) VALUES ('".$fileName."', NOW(),'".$message."','".$theme."','".$_SESSION['name']."')");
      if($insert){
                $_SESSION['message'] = "The file ".$fileName. " has been uploaded successfully.";
				include "includes/messages.php";
            }else{
                array_push($errors,"File upload failed, please try again.");
            }

		}else{
            array_push($errors,"Sorry, there was an error uploading your file.");
        }
    }else{
        array_push($errors,"Sorry, only JPG, JPEG, PNG, GIF,PDF files are allowed to upload.");
    }
}else{
    array_push($errors,"Please select a file to upload.");
}
	$_SESSION['errors']=$errors;
// Display status message
include "includes/errors.php";
unset($_SESSION['errors']);

?>
</div>
</div>
</body>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
