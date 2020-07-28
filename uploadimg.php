<?php
// Include the database configuration file
include 'pdo.php';
?>
<?php include('includes/head_section.php'); ?>

<title>MyBlog | Profile Pic </title>
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
$targetDir = "profile_pics/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"] && isset($_SESSION['name']))){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','JPG','PNG','JPEG');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $name=$_SESSION['name'];
            $insert = $pdo->query("update users set profile_pic ='".$fileName."' where name='".$name."'");
            if($insert){
                $_SESSION['message'] = "Your profile pic has been updated successfully.";
				include "includes/messages.php";
            }else{
                array_push($errors,"File upload failed, please try again.");
            }

		}else{
            array_push($errors,"Sorry, there was an error uploading your file.");
        }
    }else{
        array_push($errors,"Sorry, only JPG, JPEG, PNG files are allowed to upload.");
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
